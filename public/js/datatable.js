var year = new Date().getFullYear();

// console.log(year);

$("#orderCapacity").attr("disabled", true);

// Desactivando el boton mostrar de Catedra
$('#btnCourseTeachers').attr("disabled", true);
$('#saveCourse').attr("disabled", true);
$('#idLevel').attr("disabled", true);
$("#insertCourses").attr("disabled", true);

var capacityCourses;
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "api/level",
        dataType: "json",
        success: function (data) {
            cargarLevel(data);
        },
    });

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

    $("#table-nots").DataTable({
        responsive: true,
        fixedHeader: true,
        searching: false,
        info: false,
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
//var tablePersonal = new Array();
// start ahora se encuentra en js/catedra.js

/*function listaTeachers() {
    $("#table-teacher").dataTable().fnDestroy();
    tablePersonal = $("#table-teacher").DataTable({
        responsive: true,
        //fixedHeader: true,
        paging: false,
        type: "GET",
        searching: true,
        processing: true,
        //info: false,
        // serverSide: true,

        ajax: {
            url: "/api/catedra",
            // dataSrc: "",
        },
        columns: [{
                data: "nameWorker",
            },
            {
                data: "lastNameWorker",
            },
        ],
    });
}*/
//Esta está para ver porque también se utiliza en cátedra
//$("#btnTeachers").click(listaTeachers());


//Creo esta este array para que me almacene todos los datos cuando seleccione un teacher
//despúes se llena con todos los datos correspondientes
let tableCourseTeachers = [];


$("#table-teacher").on("click", "tbody tr", function () {
    var row = tablePersonal.row($(this)).data();
    codeWorkerAl.value = row.codeWorker;
    codeTeacher.value = row.codeTeacher;
    nameWorker.value = row.nameWorker + " " + row.lastNameWorker;
    $(".close").click();

    yearPeriod.value = year;
    //Probando algo
    let code = $("#codeTeacher").val();
    // console.log(code);
    //lleno mi array creado
    tableCourseTeachers = $.get("/api/catedra/" + code + "/" + year, function (data) {
        // console.log(data);
        return data;
    });
    //Cargaremos la tabla mostrar
    $("#btnCourseTeachers").attr("disabled", false);
    $("#yearPeriod").attr("disabled", false);
    $("#idLevel").attr("disabled", false);
    $("#idPeriodo").attr("disabled", false);
    // console.log(row.codeWorker);
});

// selects
$(function () {
    $(".select1").select2();
    $(".select2").select2();
});
//end selects

//Haremos los selects dinámicos
$(document).ready(function () {
    // *** *** *** *** *** *** *** *** *** *** *** ***
    //Select YearPeriod
    $("#idPeriodo").attr("disabled", true);
    $("#idPeriodo").html("");

    //AJAX con esto cargamos el bimestre
    $.get("/api/bimester/" + year + "/period", function (data) {
        let htmlSelect = '<option value="">Choose..</option>';
        for (let i = 0; i < data.length; ++i) {
            htmlSelect +=
                "<option value='" +
                data[i].idPeriod +
                "'>" +
                data[i].bimester +
                "</option>";
        }
        // console.log(htmlSelect);
        $("#idPeriodo").html(htmlSelect);
    });

    // *** *** *** *** *** *** *** *** *** *** ***

    $("#idGrade").attr("disabled", true);
    $("#idSection").attr("disabled", true);
    $("#idCourse").attr("disabled", true);

    $("#idLevel").on("change", function () {
        let id = $(this).val();
        // console.log(id);
        //Haremos que solo el grado se habilite
        $("#idGrade").attr("disabled", false);
        $("#idSection").attr("disabled", true);
        $("#idCourse").attr("disabled", true);
        $("#idSection").html("");
        $("#idCourse").html("");

        if (!id) {
            $("#idGrade").html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
        $.get("/api/levels/" + id + "/degrees", function (data) {
            let htmlSelect = '<option value="">Choose..</option>';
            for (let i = 0; i < data.length; ++i) {
                htmlSelect +=
                    "<option value='" +
                    data[i].idGrade +
                    "'>" +
                    data[i].descriptionGrade.toUpperCase() +
                    "</option>";
            }
            // console.log(htmlSelect);
            $("#idGrade").html(htmlSelect);
        });
    });

    $("#idGrade").on("change", function () {
        let id = $(this).val();
        // console.log(id);
        //Haremos que se habilite la sección
        $("#idSection").attr("disabled", false);

        if (!id) {
            $("#idSection").html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
        $.get("/api/degrees/" + id + "/sections", function (data) {
            let htmlSelect = '<option value="">Choose..</option>';
            for (let i = 0; i < data.length; ++i) {
                htmlSelect +=
                    "<option value='" +
                    data[i].idSection +
                    "'>" +
                    data[i].descriptionSection +
                    "</option>";
            }
            // console.log(htmlSelect);
            $("#idSection").html(htmlSelect);
        });
    });

    $("#idGrade").on("change", function () {
        let id = $(this).val();
        // console.log(id);
        //Haremos que se habilite el curso
        $("#idCourse").attr("disabled", false);

        if (!id) {
            $("#idCourse").html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
        $.get("/api/degrees/" + id + "/courses", function (data) {
            let htmlSelect = '<option value="">Choose..</option>';
            for (let i = 0; i < data.length; ++i) {
                htmlSelect +=
                    "<option value='" +
                    data[i].idCourse +
                    "'>" +
                    data[i].descriptionCourse +
                    "</option>";
            }
            // console.log(htmlSelect);
            $("#idCourse").html(htmlSelect);
        });
    });
});
//end

// Tabla Cursos
// *** *** *** *** *** *** *** *** *** *** *** *** *** ***
$("#btnCourseTeachers").click(function () {
    let code = $("#codeTeacher").val();
    console.log(code);
    $("#tCourses").dataTable().fnDestroy();
    $("#tCourses").DataTable({
        responsive: true,
        //fixedHeader: true,
        //paging: false,
        searching: true,
        info: false,
        processing: true,
        type: "GET",
        ajax: {
            url: "/api/catedra/" + code + "/" + year,
            dataSrc: "",
        },
        columns: [{
                data: "nameWorker",
            },
            {
                data: "lastNameWorker",
            },
            {
                data: "descriptionCourse",
            },
            {
                data: "descriptionGrade",
            },
            {
                data: "descriptionSection",
            },
            {
                data: "bimester",
            },
            {
                data: "yearPeriod",
            },
        ],
    });
});
//End tabla cursos
//Creamos un Array para validar que los cursos nuevos no sean repetidos


//Code para insertar a la tabla

//Obtenemos el identificador del  select idPeriodo para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valPeriod = [];
$("#idPeriodo").change(function () {
    let p = document.getElementById('idPeriodo');
    let valuePeriod = p.options[p.selectedIndex].value;
    let textPeriod = p.options[p.selectedIndex].text;
    return valPeriod = [valuePeriod, textPeriod];
});
//Obtenemos el identificador del  select idPeriodo para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valGrade = [];
$("#idGrade").change(function () {
    let g = document.getElementById('idGrade');
    let valueGrade = g.options[g.selectedIndex].value;
    let textGrade = g.options[g.selectedIndex].text;
    return valGrade = [valueGrade, textGrade];
});

//Obtenemos el identificador del  select idPeriodo para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valCourse = [];
$("#idCourse").change(function () {
    let c = document.getElementById('idCourse');
    let valueCourse = c.options[c.selectedIndex].value;
    let textCourse = c.options[c.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valCourse = [valueCourse, textCourse];
});

//Obtenemos el identificador del  select idSection para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valSection = [];
$("#idSection").change(function () {
    let s = document.getElementById('idSection');
    let valueSection = s.options[s.selectedIndex].value;
    let textSection = s.options[s.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valSection = [valueSection, textSection];
});

$("#insertCourses").click(function () {
    let course = tableCourseTeachers.responseJSON;
    // console.log(course);
    let cSize = course.length;
    // console.log(cSize);
    let i = 0;
    let flag = false;
    while (i < cSize) {
        // && course[i].idGrade === valGrade[0]
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


function cargarLevel(data) {
    $.each(data, function (key, registro) {
        $("#idLevel").append(
            "<option value=" +
            registro.idLevel +
            ">" +
            registro.descriptionLevel +
            "</option>"
        );
    });
}

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
});
