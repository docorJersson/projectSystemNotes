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
        type: "GET",
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

function obtenerValoresTablaCapacities() {
    $("#tableCapacities tbody tr")
        .find("td:first")
        .each(function () {
            valorCapacity.push(parseInt($(this).text()));
        });
}

function capacityLevel_EditCourses() {
    var level = $("#idLevel").val();
    $("#tableNewCapacity").dataTable().fnDestroy();
    dataCapacityEdit = $("#tableNewCapacity").DataTable({
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
}

function addCapacityTable_EditCourses(rowCap) {
    for (var i = 0; i < valorCapacity.length; i++) {
        if (valorCapacity[i] == rowCap.idCapacity) {
            alert("Capacidad ya perteneciente a este curso");
            return false;
        }
    }
    var fila_nueva =
        '<tr id="fila' +
        rowCap.idCapacity +
        '"><td class="d-none d-print-block"><input type="hidden" name="idCapacity[]" value="' +
        rowCap.idCapacity +
        '" >' +
        rowCap.idCapacity +
        "</td><td>" +
        rowCap.descriptionCapacity +
        "</td><td>" +
        rowCap.abbreviation +
        '</td><td><input type="hidden" name="orderCapacity[]" value ="' +
        rowCap.orderCapacity +
        '">' +
        rowCap.orderCapacity +
        '</td><td><a href="#" class="btn btn-sm btn-danger" onclick="quitar(' +
        rowCap.idCapacity +
        ')"><i class="fas fa-minus-circle"></i ></a></td></tr>';
    $("#tableCapacities tbody").append(fila_nueva);
    $("#btnCloseCapacity").click();
    valorCapacity.push(parseInt(rowCap.idCapacity));
    console.log(valorCapacity);
    $("#ordenCapacity").click();
}

function quitar(fila) {
    $("#fila" + fila).remove();
    var i = valorCapacity.indexOf(fila);
    i !== -1 && valorCapacity.splice(i, 1);
}

function listaTeachers() {
    $("#table-teacher").dataTable().fnDestroy();
    tablePersonal = $("#table-teacher").DataTable({
        responsive: true,
        paging: false,
        type: "GET",
        searching: true,
        processing: true,
        ajax: {
            url: "/api/catedra",
        },
        columns: [{
                data: "nameWorker",
            },
            {
                data: "lastNameWorker",
            },
        ],
    });
}
