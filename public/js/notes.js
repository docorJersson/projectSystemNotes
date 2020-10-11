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

var idDT;
var dataCapacitiesCourses;
var dataStudent;

function obtenerDetailTeacher() {
    var valueCourse = codeWorkerAl.value.toString();
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
            tamaData = data.length;
            if (tamaData == 0) {
                alert("Este profesor no tiene esa materia");
                return;
            }
            idDT = data[0].idDetailTeacher;
            $.ajax({
                type: "GET",
                url: "api/subjects/" + valCourse[0] + "/" + valPeriod[0],
                dataType: "json",
                async: false,
                success: function (data) {
                    if (data == null || data == undefined) {
                        alert("El curso seleccionado no tiene aún Capacidades");
                        return;
                    }
                    dataCapacitiesCourses = data;
                    let arra = []
                    data.forEach(element => {
                        arra.push(element.pivot.idDetailCapacity);
                    });
                    capacidades.value = arra;
                    $.ajax({
                        type: "GET",
                        url: "api/students/" + idDT,
                        success: function (studentCount) {
                            var t = studentCount.length;
                            var fila = null;
                            var tamañoCapacities = dataCapacitiesCourses.length;
                            for (let index = 0; index < t; index++) {
                                fila =
                                    '<tr id="fila' +
                                    idDT +
                                    '"><td><input type="hidden" name="idDetailStudent[]" value="' + studentCount[index].idDetailStudent + '">' + studentCount[index].idDetailStudent + '</td><td>' +
                                    studentCount[index].nameStudent +
                                    " " +
                                    studentCount[index].lastNameStudent +
                                    '"</td><td>' +
                                    cargarCoursePerio(dataCapacitiesCourses) +
                                    '</td><td class="bg-danger" >' +
                                    cargarInputNotes(tamañoCapacities) +
                                    "</td>";

                                $("#tableNotes tbody").append(fila);
                            }
                            totalStudent.value = t;
                            $("#totalStudent").attr("disabled", true);
                        },
                    });
                },
            });
        },
    });
}

function cargarCoursePerio(data) {
    var fila_Capacities = "";
    data.forEach((registro) => {
        fila_Capacities +=
            '<div><p>' +
            registro.descriptionCapacity +
            "<p/></div>";
    });
    return fila_Capacities;
}

function cargarInputNotes(indice) {
    var fila_Capacities = "";
    for (let index = 0; index < indice; index++) {
        fila_Capacities +=
            '<div class="d-flex align-content-around h-100 bg-success"><input type="text" name="notes[]" value="0"></div>';
    }
    return fila_Capacities;
}

$("#procesar").click(function () {
    obtenerDetailTeacher();
});

function enviar()
{                    
    var teachercode=$("#codeWorkerAl").val();
    $("#codigo").val(teachercode);
    var gradecode=$('#idGrade').val();
    $("#grade").val(gradecode);
    var coursecode=$("#idCourse").val();
    $("#course").val(coursecode);

    var sectioncode=$('#idSection').val();
    $("#section").val(sectioncode);

    var periodcode=$('#idPeriodo').val();
    $("#period").val(periodcode);
    document.getElementById("form1").submit();
}