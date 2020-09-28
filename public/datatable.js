var year = new Date().getFullYear();

$(document).ready(function () {

    $.ajax({
        type: "GET",
        url: 'api/period',
        dataType: "json",
        success: function (data) {
            cargarYearPeriod(data)
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
});

$(function () {
    $(".select1").select2();
});
$(function () {
    $(".select2").select2();
});

function cargarYearPeriod(data) {
    $.each(data, function (key, registro) {
        $("#idPeriod").append('<option value=' + registro.yearPeriod + '>' + registro.yearPeriod + '</option>');
    });
}

$('#idPeriod').change(function yearSelected() {
    var year = $('#idPeriod').val();
    $("#table-curso").dataTable().fnDestroy();
    loadTableCourses(year);
});

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
                data: "idCourse",
                visible: false,
                searchable: false,
            },
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
                data: "descriptionLevel",
            },
            {
                data: "bimester",
            },
            {
                data: "nombres",
            },
            {
                data: "yearPeriod"
            },
            {
                data: "acciones",
            },
        ],
    });
}
