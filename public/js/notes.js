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
$('#btnCourseTeachers').attr("disabled", true);
$('#yearPeriod').attr("disabled", true);
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

$("#searchCourses").click(function () {
    listarCoursesPeriod_Notes();
    $(this).attr("disabled", true);
});

let tableCourseTeachers = [];
$("#table-teacher").on("click", "tbody tr", function () {
    var row = tablePersonal.row($(this)).data();
    selectTeacherCompare_Catedra(row);
});

let valPeriod = [];
$("#idPeriodo").change(function () {
    let p = document.getElementById('idPeriodo');
    let valuePeriod = p.options[p.selectedIndex].value;
    let textPeriod = p.options[p.selectedIndex].text;

    valPeriod = [valuePeriod, textPeriod];
    return valPeriod

});

let valSection = [];
$("#idSection").change(function () {
    let s = document.getElementById('idSection');
    let valueSection = s.options[s.selectedIndex].value;
    let textSection = s.options[s.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valSection = [valueSection, textSection];
});
let valCourse = [];
$("#idCourse").change(function () {
    let c = document.getElementById('idCourse');
    let valueCourse = c.options[c.selectedIndex].value;
    let textCourse = c.options[c.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valCourse = [valueCourse, textCourse];
});


function listarCoursesPeriod_Notes() {
    $.ajax({
        type: "GET",
        url: "api/subjects/" + valCourse[0] + "/" + valPeriod[0],
        dataType: "json",
        success: function (data) {
            cargarCoursePerio(data);
        },
    });
}

function cargarCoursePerio(data) {
    $.each(data, function (key, registro) {
        console.log(registro.pivot.idDetailCapacity);
        $("#idCapcityCP").append(
            "<option value=" +
            registro.pivot.idDetailCapacity +
            ">" +
            registro.descriptionCapacity +
            "</option>"
        );
    });
}

function obtenerDetailTeacher() {
    // let cW = document.getElementById('codeWorkerAl');
    var valueCourse = codeWorkerAl.value.toString();
    console.log(valueCourse)
    $.ajax({
        type: "GET",
        url: "api/notes/" + valueCourse + "/" + valCourse[0] + "/" + valSection[0] + "/" + valPeriod[0],
        success: function (data) {
            $.each(data, function (registro) {
                console.log(registro);
            });

        },
    });
}

$("#procesar").click(function () {
    console.log('hello');
});