$(document).ready(function () {
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
            { data: "codeWorker" },
            { data: "nameWorker" },
            { data: "lastNameWorker" },
            { data: "dniWorker" },
            { data: "addressWorker" },
            { data: "civilStatus" },
            { data: "telephone" },
            { data: "socialSecurity" },
            { data: "dateWorker" },
            { data: "btn" },
        ],
    });

    $("#table-curso").DataTable({
        responsive: true,
        fixedHeader: true,
        //paging: false,
        searching: false,
        info: false,
        language: {
            sUrl: "Spanish.json",
        },
        serverSide: true,

        ajax: {
            url: "api/courses",
        },
        columns: [
            { data: "idCourse" },
            { data: "codeCourse" },
            { data: "descriptionCourse" },
            { data: "descriptionGrade" },
            { data: "descriptionLevel" },
            { data: "bimester" },
            { data: "nombres" },
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
