$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "api/period",
        dataType: "json",
        success: function (data) {
            cargarYearPeriod(data);
        },
    });
    loadTableCourses(year);
});
$("#idPeriod").change(
    function yearSelected() {
        var year = $("#idPeriod").val();
        $("#table-curso").dataTable().fnDestroy();
        loadTableCourses(year);
    }
);
