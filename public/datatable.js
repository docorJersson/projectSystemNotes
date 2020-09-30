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

    $("#btnTeachers").click(function () {
        $("#table-teacher").dataTable().fnDestroy();
        tablePersonal = $("#table-teacher").DataTable({
            responsive: true,
            //fixedHeader: true,
            //paging: false,
            type: "GET",
            searching: true,
            processing: true,
            info: false,
            language: {
                sUrl: "Spanish.json",
            },

            serverSide: true,

            ajax: {
                url: "api/catedra",
                //  dataSrc: "",
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

});
var tablePersonal = new Array();
// start

$('#table-teacher').on('click', 'tbody tr', function () {
    //  let a = [];
    var row = tablePersonal.row($(this)).data();
    codeWorker.value = row.codeTeacher;
    nameWorker.value = row.nameWorker + ' ' + row.lastNameWorker;
    yearPeriod.value = row.year;
    $('.close').click();
});

$(function () {
    $(".select1").select2();
    $(".select2").select2();
    $(".select3").select2();
    $(".select4").select2();
    $(".select5").select2();
    $(".select6").select2();
});

//Haremos los selects dinámicos
$(document).ready(function () {
    $('#idGrade').attr("disabled", true);
    $('#idSection').attr("disabled", true);
    $('#idCourse').attr("disabled", true);


    $('#idLevel').on('change', function () {

        let id = $(this).val();
        // console.log(id);
        //Haremos que solo el grado se habilite
        $('#idGrade').attr("disabled", false);
        $('#idSection').attr("disabled", true);
        $('#idCourse').attr("disabled", true);

        if (!id) {
            $('#idGrade').html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
        $.get('/api/levels/' + id + '/degrees', function (data) {
            let htmlSelect = '<option value="">Choose..</option>';
            for (let i = 0; i < data.length; ++i) {
                htmlSelect += "<option value='" + data[i].idGrade + "'>" + data[i].descriptionGrade.toUpperCase() + "</option>"
            }
            // console.log(htmlSelect);
            $('#idGrade').html(htmlSelect);
        })
    });

    $('#idGrade').on('change', function () {
        let id = $(this).val();
        // console.log(id);
        //Haremos que se habilite la sección
        $('#idSection').attr("disabled", false);

        if (!id) {
            $('#idSection').html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
        $.get('/api/degrees/' + id + '/sections', function (data) {
            let htmlSelect = '<option value="">Choose..</option>';
            for (let i = 0; i < data.length; ++i) {
                htmlSelect += "<option value='" + data[i].idSection + "'>" + data[i].descriptionSection + "</option>"
            }
            // console.log(htmlSelect);
            $('#idSection').html(htmlSelect);
        })
    });

    $('#idGrade').on('change', function () {
        let id = $(this).val();
        // console.log(id);
        //Haremos que se habilite el curso
        $('#idCourse').attr("disabled", false);

        if (!id) {
            $('#idCourse').html('<option value="">Choose..</option>');
            return;
        }
        //AJAX
        $.get('/api/degrees/' + id + '/courses', function (data) {
            let htmlSelect = '<option value="">Choose..</option>';
            for (let i = 0; i < data.length; ++i) {
                htmlSelect += "<option value='" + data[i].idCourse + "'>" + data[i].descriptionCourse + "</option>"
            }
            // console.log(htmlSelect);
            $('#idCourse').html(htmlSelect);
        })
    });
});
//end

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
