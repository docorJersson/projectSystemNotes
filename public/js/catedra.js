//AJAX con esto cargamos el bimestre
$(document).ready(function () {
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

//Select YearPeriod
$("#idPeriodo").attr("disabled", true);
$("#idPeriodo").html("");

$('#btnCourseTeachers').attr("disabled", true);
$('#saveCourse').attr("disabled", true);
$('#idLevel').attr("disabled", true);
$("#insertCourses").attr("disabled", true);
$("#idGrade").attr("disabled", true);
$("#idSection").attr("disabled", true);
$("#idCourse").attr("disabled", true);

//mostrar los teachers cada vez que se seleccione la lupa
$("#btnTeachers").click(function () {
    listaTeachers()
});

//Creo esta este array para que me almacene todos los datos cuando seleccione un teacher
//despúes se llena con todos los datos correspondientes
let tableCourseTeachers = [];
$("#table-teacher").on("click", "tbody tr", function () {
    var row = tablePersonal.row($(this)).data();
    selectTeacherCompare_Catedra(row);
});

$("#idLevel").on("change", function () {
    let id = $(this).val();
    selectLevel_Catedra(id);
});

$("#idGrade").on("change", function () {
    let id = $(this).val();
    showGradeCourses(id);
});

$("#btnCourseTeachers").on("click", function () {
    showCourseTeacher_Catedra()
});
