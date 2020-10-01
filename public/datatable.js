var year = new Date().getFullYear();
var capacityCourses;
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "api/period",
        dataType: "json",
        success: function (data) {
            cargarYearPeriod(data);
        },
    });
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
        columns: [
            {
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

    loadTableCourses(year);

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

    $("#table-catedra").DataTable({
        responsive: true,
        fixedHeader: true,
        //paging: false,
        searching: false,
        info: false,
        language: {
            sUrl: "Spanish.json",
        },
    });

    obtenerValoresTablaCapacities();
});
var tablePersonal = new Array();
// start

$("#btnTeachers").click(function () {
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
        columns: [
            {
                data: "nameWorker",
            },
            {
                data: "lastNameWorker",
            },
            {
                data: "year",
            },
        ],
    });
});

$("#table-teacher").on("click", "tbody tr", function () {
    //  let a = [];
    var row = tablePersonal.row($(this)).data();
    codeWorker.value = row.codeTeacher;
    nameWorker.value = row.nameWorker + " " + row.lastNameWorker;
    $(".close").click();

    //Cargaremos la tabla mostrar
    $("#btnCourseTeachers").attr("disabled", false);
    $("#yearPeriod").attr("disabled", false);
    $("#idLevel").attr("disabled", false);
    // console.log(row.codeWorker);
});

// selects
$(function () {
    $(".select1").select2();
    $(".select2").select2();
    // $(".select3").select2();
    // $(".select4").select2();
    // $(".select5").select2();
    // $(".select6").select2();
});
//end selects

//Haremos los selects dinámicos
$(document).ready(function () {
    // *** *** *** *** *** *** *** *** *** *** *** ***
    //Select YearPeriod
    $("#idPeriodo").attr("disabled", true);
    $("#idPeriodo").html("");

    $("#yearPeriod").on("change", function () {
        let year = $(this).val();
        // console.log(id);
        //Haremos que se habilite el bimestre
        $("#idPeriodo").attr("disabled", false);
        if (!year) {
            $("#idPeriodo").html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
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
    });

    // ********************************

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
// var dataCapacity;
$("#btnCourseTeachers").click(function () {
    let code = $("#codeWorker").val();
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
            url: "/api/catedra/" + code,
            dataSrc: "",
        },
        columns: [
            {
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

function cargarYearPeriod(data) {
    $.each(data, function (key, registro) {
        $("#idPeriod").append(
            "<option value=" +
                registro.yearPeriod +
                ">" +
                registro.yearPeriod +
                "</option>"
        );
    });
}

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

$("#idPeriod").change(function yearSelected() {
    var year = $("#idPeriod").val();
    $("#table-curso").dataTable().fnDestroy();
    loadTableCourses(year);
});
var dataCapacity;

$("#btnCapacity").click(function () {
    var level = $("#idLevel").val();
    $("#tableNewCapacity").dataTable().fnDestroy();
    dataCapacity = $("#tableNewCapacity").DataTable({
        processing: true,
        type: "GET",
        ajax: {
            url: "/capacity/" + level,
            dataSrc: "",
        },
        columns: [
            {
                data: "descriptionCapacity",
            },
            {
                data: "abbreviation",
            },
            {
                data: "orderCapacity",
            },
        ],
    });
});
var valorCapacity = new Array();
$("#tableNewCapacity").on("click", "tbody tr", function () {
    var row = dataCapacity.row($(this)).data();
    for (var i = 0; i < valorCapacity.length; i++) {
        if (valorCapacity[i] == row.idCapacity) {
            alert("Capacidad ya perteneciente a este curso");
            return false;
        }
    }
    var fila_nueva =
        '<tr id="fila' +
        row.idCapacity +
        '><td class="d-none d-print-block"><input type="hidden" name="idCapacity[]" value="' +
        row.idCapacity +
        '" >' +
        row.idCapacity +
        "</td><td>" +
        row.descriptionCapacity +
        "</td><td>" +
        row.abbreviation +
        '</td><td><input type="hidden" name="orderCapacity[]" value ="' +
        row.orderCapacity +
        '">' +
        row.orderCapacity +
        '</td><td><a href="#" class="btn btn-sm btn-danger" onclick="quitar(' +
        row.idCapacity +
        ')"><i class="fas fa-minus-circle"></i ></a></td></tr>';
    $("#tableCapacities tbody").append(fila_nueva);
    $("#btnCloseCapacity").click();
    valorCapacity.push(row.idCapacity);
    $("#ordenCapacity").click();
});

function quitar(fila) {
    $("#fila" + fila).remove();
}

function obtenerValoresTablaCapacities() {
    $("#tableCapacities tbody tr")
        .find("td:first")
        .each(function () {
            valorCapacity.push(parseInt($(this).text()));
        });
}

function loadTableCourses(yearSelect) {
    $("#table-curso").DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return "Detalles del Curso ";
                    },
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: "table",
                }),
            },
        },
        fixedHeader: true,
        searching: false,
        info: false,
        language: {
            sUrl: "Spanish.json",
        },
        processing: true,
        serverSide: true,

        ajax: {
            url: "api/courses/" + yearSelect,
        },
        columns: [
            {
                data: "codeCourse",
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
                data: "descriptionLevel",
            },
            {
                data: "bimester",
            },
            {
                data: "nombres",
            },
            {
                data: "yearPeriod",
            },
            {
                data: "acciones",
            },
        ],
    });
}
