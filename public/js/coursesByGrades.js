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
//Cargamos el nivel
$("#idLevel").on("change", function () {
    let id = $(this).val();
    selectLevel_Catedra(id);
});
$("#idGrade").on("change", function () {
    let id = $(this).val();
    showCourseTeacher_Catedra(id)
});
function showCourseTeacher_Catedra(id) {
    $("#table-course-grade").dataTable().fnDestroy();
    $("#table-course-grade").DataTable({
        responsive: true,
        searching: true,
        info: false,
        processing: true,
        type: "GET",
        ajax: {
            url: "/api/degrees/" + id + "/courses",
            dataSrc: "",
        },
        columns: [
            {
                data: "descriptionCourse",
            },
        ],
    });
}