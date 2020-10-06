$.get("/api/level", function (data) {
    // console.log(data);
    let htmlSelect = '<option value="">Choose..</option>';
    for (let i = 0; i < data.length; ++i) {
        htmlSelect +=
            "<option value='" +
            data[i].idLevel +
            "'>" +
            data[i].descriptionLevel.toUpperCase() +
            "</option>";
    }
    $("#idLevel").html(htmlSelect);
});
$("#idLevel").on("change", function () {
    let id = $(this).val();
    selectLevel_Catedra(id);
});
$("#idGrade").on("change", function () {
    let id = $(this).val();
    showGrade_Catedra(id)
});
function showGrade_Catedra(id) {
    //Haremos que se habilite la sección
    $("#tGradesSections").dataTable().fnDestroy();
    $("#tGradesSections").DataTable({
        responsive: true,
        searching: true,
        info: false,
        processing: true,
        type: "GET",
        ajax: {
            url: "/api/degrees/" + id + "/sections",
            dataSrc: "",
        },
        columns: [
            {
                data: "descriptionSection",
            },
        ],
    });

}