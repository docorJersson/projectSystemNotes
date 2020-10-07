$(document).ready(function () {
    yearPeriod.value = year;

    $.get("/api/bimester/" + year + "/period", function (data) {
        listBimester_Catedra(data);
    });

    $.ajax({
        type: "GET",
        url: "api/level",
        dataType: "json",
        success: function (data) {
            cargarLevel(data);
        },
    });
});
$("#btnCourseTeachers").attr("disabled", true);
$("#yearPeriod").attr("disabled", true);
$("#insertCourses").attr("disabled", true);
$("#idGrade").attr("disabled", true);
$("#idSection").attr("disabled", true);
$("#idCourse").attr("disabled", true);
$("#searchCourses").attr("disabled", true);

//$("#idPeriodo").attr("disabled", true);
$("#idPeriodo").html("");

$("#idLevel").on("change", function () {
    let id = $(this).val();
    selectLevel_Catedra(id);
});

$("#idGrade").on("change", function () {
    let id = $(this).val();
    showGrade_Catedra(id);
    showCourses(id);
});

$("#btnTeachers").click(function () {
    listaTeachers();
    $("#searchCourses").attr("disabled", false);
});

$("#searchCourses").click(function () {
    listarCoursesPeriod_Notes();
});

let tableCourseTeachers = [];
$("#table-teacher").on("click", "tbody tr", function () {
    var row = tablePersonal.row($(this)).data();
    selectTeacherCompare_Catedra(row);
});

let valPeriod = [];
$("#idPeriodo").change(function () {
    let p = document.getElementById("idPeriodo");
    let valuePeriod = p.options[p.selectedIndex].value;
    let textPeriod = p.options[p.selectedIndex].text;

    valPeriod = [valuePeriod, textPeriod];
    return valPeriod;
});

let valSection = [];
$("#idSection").change(function () {
    let s = document.getElementById("idSection");
    let valueSection = s.options[s.selectedIndex].value;
    let textSection = s.options[s.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return (valSection = [valueSection, textSection]);
});
let valCourse = [];
$("#idCourse").change(function () {
    let c = document.getElementById("idCourse");
    let valueCourse = c.options[c.selectedIndex].value;
    let textCourse = c.options[c.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return (valCourse = [valueCourse, textCourse]);
});

var dataCapacitiesCourses;
var dataStudent;

function listarCoursesPeriod_Notes() {
    $.ajax({
        type: "GET",
        url: "api/subjects/" + valCourse[0] + "/" + valPeriod[0],
        dataType: "json",
        success: function (data) {
            if (data == null) {
                alert("El curso seleccionado no tiene aún Capacidades");
                return;
            }
            dataCapacitiesCourses = data;
            $("#searchCourses").attr("disabled", true);
            cargarCoursePerio(data);
        },
    });
}

function cargarCoursePerio(data) {
    var fila_Capacities;
    $.each(data, function (registro) {
        fila_Capacities +=
            '<div><input type="hidden" value="' +
            registro.pivot.idDetailCapacity +
            '"><p>' +
            registro.descriptionCapacity +
            "<p/></div>";
    });
    return fila_Capacities;
}

function obtenerDetailTeacher() {
    var valueCourse = codeWorkerAl.value.toString();
    var idDT;
    $.ajax({
        type: "GET",
        url: "api/notes/" +
            valueCourse +
            "/" +
            valCourse[0] +
            "/" +
            valSection[0] +
            "/" +
            valPeriod[0],
        success: function (data) {
            $.each(data, function (registro) {
                idDT = registro.idDetailTeacher;
            });
        },
    });
    $.ajax({
        type: "GET",
        url: "api/subjects/" + valCourse[0] + "/" + valPeriod[0],
        dataType: "json",
        success: function (data) {
            if (data == null) {
                alert("El curso seleccionado no tiene aún Capacidades");
                return;
            }
            dataCapacitiesCourses = data;
            //    $("#searchCourses").attr("disabled", true);
        },
    });
    $.ajax({
        type: "GET",
        url: "api/students/" + idDT,
        success: function (studentCount) {
            dataStudent = studentCount;
            cargarStudentTable(dataStudent);
        },
    });
}

function cargarStudentTable(dataPositionStudent) {
    var t = dataPositionStudent.length;
    var fila = null;
    for (let index = 0; index < t; index++) {
        fila =
            '<tr id="fila' +
            idDT +
            '"><td><input type="text" name="idDetailCapacity[]" value="' +
            idDT +
            '" >' +
            dataPositionStudent[index].idDetailStudent +
            "</td><td>" +
            dataPositionStudent[index].nameStudent +
            " " +
            dataPositionStudent[index].lastNameStudent +
            "</td><td>" +
            cargarCoursePerio(dataCapacitiesCourses) +
            "</td>";
        $("#table-nots tbody").append(fila_nueva);
    }
}

$("#processStudents").click(function () {
    obtenerDetailTeacher();
});
