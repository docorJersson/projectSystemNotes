$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "api/level",
        dataType: "json",
        success: function (data) {
            cargarLevel(data);
        },
    });
});

$("#idGrade").attr("disabled", true);
$("#idCourse").attr("disabled", true);

$("#idLevel").on("change", function () {
    let id = $(this).val();
    selectLevel_Catedra(id);
});

$("#idGrade").on("change", function () {
    let id = $(this).val();
    showCourses(id);
});

$("#btnCourseTeachers").on("click", function () {
    showCourseTeacher_Catedra()
});

let order = 0;

let valLevel = [];

$("#idLevel").change(function () {
    let l = document.getElementById('idLevel');
    let valueLevel = l.options[l.selectedIndex].value;
    let textLevel = l.options[l.selectedIndex].text;
    return valLevel = [valueLevel, textLevel];
});

//Y verificar si podemos ingresar un nuevo curso o no
let valGrade = [];

$("#idGrade").change(function () {
    let g = document.getElementById('idGrade');
    let valueGrade = g.options[g.selectedIndex].value;
    let textGrade = g.options[g.selectedIndex].text;
    return valGrade = [valueGrade, textGrade];
});


$("#idCourse").change(function () {
    let c = document.getElementById('idCourse');
    let valueCourse = c.options[c.selectedIndex].value;
    let textCourse = c.options[c.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valCourse = [valueCourse, textCourse];
});
//Hare que me carge periodo en Capacity

$.get("/api/bimester/" + year + "/period", function (data) {
    let htmlSelect = '<option value="0">Choose..</option>';
    for (let i = 0; i < data.length; ++i) {
        htmlSelect +=
            "<option value='" +
            data[i].idPeriod +
            "'>" +
            data[i].bimester +
            "</option>";
    }
    $("#idPeriodo").html(htmlSelect);
})

let valPeriod = [];

$("#idPeriodo").change(function () {
    let p = document.getElementById('idPeriodo');
    let valuePeriod = p.options[p.selectedIndex].value;
    let textPeriod = p.options[p.selectedIndex].text;
    return valPeriod = [valuePeriod, textPeriod];
});

let valCourse = [];

$("#idCourse").change(function () {
    let c = document.getElementById('idCourse');
    let valueCourse = c.options[c.selectedIndex].value;
    let textCourse = c.options[c.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valCourse = [valueCourse, textCourse];
});
$('#download').click(function () {
    if (valPeriod == "" || valLevel == "" || valGrade == "" || valCourse == "" || descriptionCapacity.value == "" || abreviation.value == "") {
        alert('Por favor llene los campos que le faltan');
    } else {
        $("#idLevel").attr("disabled", true);
        $("#idGrade").attr("disabled", true);
        $("#idCourse").attr("disabled", true);
        addCapacity();
    }
})
let index = 0;
let ctrlCapacity = [];
let ctrlPeriodo = [];

function addCapacity() {
    //Calidando
    // Variable que usaremos para el control
    let cont = 0;
    let flagTwo = false;
    let idCapacities = idCapacity.value;
    let description = descriptionCapacity.value;
    let abrev = abreviation.value;
    let orderCapacities = orderCapacity.value;

    while (cont < index) {
        if (ctrlCapacity[cont] === idCapacities && ctrlPeriodo[cont] === valPeriod[0]) {
            flagTwo = true;
        }
        cont++;
    }

    if (flagTwo === true) {
        alert('La Capacidad ya está asignada en la tabla');
        return false;
    }
    ctrlCapacity[index] = idCapacities;
    ctrlPeriodo[index] = valPeriod[0];
    var newRow =
        '<tr id="newRow' + index + '"><td><input type="hidden" name="idCourse[]" value="' + valCourse[0] + '">' + valCourse[1] + '</td><td><input type="hidden" name="idCapacity[]" value="' + idCapacities + '">' + description + '</td><td>' + abrev + '</td><td><input type="hidden" name="idPeriod[]" value="' + valPeriod[0] + '">' + valPeriod[1] + '</td><td><input type="hidden" name="order[]" value="' + orderCapacities + '">' + orderCapacities + '</td><td><a href="#" class="btn btn-sm btn-danger" onclick="quitarCapacity(' + index + ')"><i class="fas fa-minus-circle"></i></a></td></tr>'
    $("#tableCoursesCapacity tbody").append(newRow);
    index++;
}
//Estará desacitvado el boton guardar si no hay rows
$('#saveC').click(function () {
    if (index == 0) {
        alert('Ingrese alguna Capacidad')
        return false;
    }
});

function quitarCapacity(item) {
    // $('#newRow' + item).closest("tr");
    $('#newRow' + item).remove();
    //----- *** *** ------
    ctrlCapacity[item] = "";
    ctrlAbreviation[item] = "";
    index--;
}

$('#close').click(function () {
    if (index !== 0) {
        $('#tableCoursesCapacity tbody').empty();
        $("#idLevel").attr("disabled", false);
        $("#idLevel option[value=" + 0 + "]").attr("selected", true);
        $("#idPeriodo option[value=" + 0 + "]").attr("selected", true);
        order = 0;
        orderCapacity.value = "";
        idCapacity.value = "";
        descriptionCapacity.value = "";
        abreviation.value = "";
        ctrlCapacity = [];
        ctrlAbreviation = [];
        index = 0;
    } else {
        alert('ingrese alguna capacidad')
        return false;
    }
});
