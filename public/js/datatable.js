var year = new Date().getFullYear();


$("#orderCapacity").attr("disabled", true);

var capacityCourses;
$(document).ready(function () {


    $("#table-workers").DataTable({
        responsive: true,
        fixedHeader: true,
        language: {
            sUrl: "Spanish.json",
        },
        serverSide: true,

        ajax: {
            url: "api/personnel",
        },
        columns: [{
            data: "codeWorker",
            visible: false,
            searchable: false,
        },
        {
            data: "nameWorker",
        },
        {
            data: "lastNameWorker",
        },
        {
            data: "dniWorker",
        },
        {
            data: "addressWorker",
        },
        {
            data: "civilStatus",
        },
        {
            data: "telephone",
        },
        {
            data: "socialSecurity",
        },
        {
            data: "dateWorker",
        },
        {
            data: "btn",
        },
        ],
    });

    $("#table-capacity").DataTable({
        responsive: true,
        fixedHeader: true,
        searching: false,
        language: {
            sUrl: "Spanish.json",
        },
    });

    $("#table-course-grade").DataTable({
        responsive: true,
        fixedHeader: true,
        paging: false,
        searching: false,
        info: false,
        language: {
            sUrl: "Spanish.json",
        },
    });

    $("#table-grade-seccion").DataTable({
        responsive: true,
        fixedHeader: true,
        paging: false,
        searching: false,
        info: false,
        language: {
            sUrl: "Spanish.json",
        },
    });

});

// selects
$(function () {
    $(".select1").select2();
    $(".select2").select2();
});
//end selects



$("#insertCourses").click(function () {
    let course = tableCourseTeachers.responseJSON;
    let cSize = course.length;
    let i = 0;
    let flag = false;
    while (i < cSize) {
        if (course[i].idPeriod === valPeriod[0] &&
            course[i].idCourse === valCourse[0] && course[i].idSection === valSection[0]) {
            flag = true;
        }
        i++;
    }
    if (flag === true) {
        alert('El curso ya está asignado')
        return false;
    }
    addCatedra();

});
//end de code para la tabla de cursos
// *** *** *** *** *** *** ***
// ------- haremos funciones para catedra --------
// Para validar
let indice = 0;

let ctrlPeriod = [];
let ctrlCourse = [];
let ctrlSection = [];

function addCatedra() {
    let codeTeacherAL = $("#codeTeacher").val();
    //Calidando
    // Variable que usaremos para el control
    let cont = 0;
    let flagTwo = false;
    while (cont < indice) {
        if (ctrlPeriod[cont] === valPeriod[0] &&
            ctrlCourse[cont] === valCourse[0] && ctrlSection[cont] === valSection[0]) {
            flagTwo = true;
        }
        cont++;
    }

    if (flagTwo === true) {
        alert('El curso ya está asignado en la tabla');
        return false;
    }
    ctrlPeriod[indice] = valPeriod[0];
    ctrlCourse[indice] = valCourse[0];
    ctrlSection[indice] = valSection[0];

    var newRow =
        '<tr id="newRow' + indice + '"><td>' + codeTeacherAL + '</td><td><input type="hidden" name="idCourse[]" value="' + valCourse[0] + '">' + valCourse[1] + '</td><td><input type="hidden" name="idGrade[]" value="">' + valGrade[1] + '</td><td><input type="hidden" name="idSection[]" value="' + valSection[0] + '">' + valSection[1] + '</td><td><input type="hidden" name="idPeriod[]" value="' + valPeriod[0] + '">' + valPeriod[1] + '</td></td><td><a href="#" class="btn btn-sm btn-danger" onclick="quitarRow(' + indice + ')"><i class="fas fa-minus-circle"></i ></a></td></tr>'
    $("#table-catedra tbody").append(newRow);
    indice++;
    evaluar();
}
// ------- end funciones para catedra -------
// ------- start funciones eliminar en la tabla catedra ------
function quitarRow(item) {
    // $('#newRow' + item).closest("tr");
    $('#newRow' + item).remove();
    //----- *** *** ------
    ctrlPeriod[item] = "";
    ctrlCourse[item] = "";
    ctrlSection[item] = "";
    indice--;
    evaluar();
}
// función evaluar
function evaluar() {
    if (indice > 0)
        $('#saveCourse').attr("disabled", false);
    else
        $('#saveCourse').attr("disabled", true);
}
// ------- end funciones eliminar en la tabla catedra -----



$("#btnCapacity").click(function () {
    $("#tableAllCapacity").dataTable().fnDestroy();
    dataCapacity = $("#tableAllCapacity").DataTable({
        processing: true,
        type: "GET",
        ajax: {
            url: "/capacity",
            dataSrc: "",
        },
        columns: [{
            data: "descriptionCapacity",
        },
        {
            data: "abbreviation",
        },
        ],
    });
});

var valorAllCapacity;

$("#tableAllCapacity").on("click", "tbody tr", function () {
    var row = dataCapacity.row($(this)).data();
    if (valorAllCapacity == row.idCapacity) {
        alert("Capacidad ya perteneciente a este curso");
        $("#btnCloseCapacity").click();
        return false;
    }
    idCapacity.value = row.idCapacity;
    descriptionCapacity.value = row.descriptionCapacity;
    abreviation.value = row.abbreviation;
    valorAllCapacity = row.idCapacity;

    $("#btnCloseCapacity").click();
    order += 1;
    orderCapacity.value = order;
});
