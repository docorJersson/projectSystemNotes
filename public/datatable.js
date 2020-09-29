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
    obtenerValoresTablaCapacities();
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
        columns: [{
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
            alert("Capacidad ya seleccionada");
            return false;
        }
    }
    var fila_nueva =
        "<tr id=fila" +
        row.idCapacity +
        '><td class="d-none d-print-block" name="idCapacity[]">' +
        row.idCapacity +
        "</td><td>" +
        row.descriptionCapacity +
        "</td><td>" +
        row.abbreviation +
        "</td><td>" +
        row.orderCapacity +
        '</td><td><a href="#" class="btn btn-sm btn-danger" onclick="quitar(' +
        row.idCapacity +
        ')"><i class="fas fa-minus-circle"></i></a></td></tr>';
    $("#tableCapacities tbody").append(fila_nueva);
    $("#btnCloseCapacity").click();
    obtenerValoresTablaCapacities();
});

function quitar(fila) {
    //codigos[item]="";
    $("#fila" + fila).remove();
}

function obtenerValoresTablaCapacities() {
    $("#tableCapacities tbody tr td:nth-child(1)").each(function () {
        valorCapacity.push($(this).text());
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
        columns: [{
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
