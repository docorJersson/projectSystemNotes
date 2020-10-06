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
    listaTeachers()
});
let tableCourseTeachers = [];
$("#table-teacher").on("click", "tbody tr", function () {
    var row = tablePersonal.row($(this)).data();
    selectTeacherCompare_Catedra(row);
});
