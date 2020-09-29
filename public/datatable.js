var year = new Date().getFullYear();

$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "api/period",
        dataType: "json",
        success: function (data) {
            cargarYearPeriod(data);
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

    $("#table-teacher").DataTable({
        responsive: true,
        fixedHeader: true,
        //paging: false,
        searching: true,
        info: false,
        language: {
            sUrl: "Spanish.json",
        },
    });
});

$(function () {
    $(".select1").select2();
});
$(function () {
    $(".select2").select2();
});

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

$("#tableNewCapacity").on("click", "tbody tr", function () {
    var row = dataCapacity.row($(this)).data();
    var fila_nueva =
        '<tr><td class="d-none d-print-block">' +
        row.idCapacity +
        "</td><td>" +
        row.descriptionCapacity +
        "</td><td>" +
        row.abbreviation +
        "</td><td>Hola</td><td><a>Borrar</a></td></tr>";
    $("#tableCapacities tbody").append(fila_nueva);
    $("#btnCloseCapacity").click();
    obtenerValoresTablaCapacities();
});

function obtenerValoresTablaCapacities() {
    $("#tableCapacities")
        .find("td")
        .each(function () {
            console.log($(this).html());
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
