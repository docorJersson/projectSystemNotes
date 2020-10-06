$(document).ready(function () {
    obtenerValoresTablaCapacities();
});

var valorCapacity = new Array();

//trae las capacidades cuando se quieran agregar nuevas
$("#btnCapacity").click(capacityLevel_EditCourses());

//agrega a la tabla la fila seleccionada
$("#tableNewCapacity").on("click", "tbody tr", function () {
    var row = dataCapacityEdit.row($(this)).data();
    addCapacityTable_EditCourses(row)
});

//esto es posible que también vaya en cátedra 
$("#btnTeachers").click(listaTeachers());

let tableCourseTeachers = [];

$("#table-teacher").on("click", "tbody tr", function () {
    var row = tablePersonal.row($(this)).data();
    selectTeacherCompare_Catedra(row);
});
