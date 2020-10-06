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

$('#download').click(function () {
    if (valLevel == "" || valGrade == "" || valCourse == "" || descriptionCapacity.value == "" || abreviation.value == "") {
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
let ctrlAbreviation = [];

function addCapacity() {
    //Calidando
    // Variable que usaremos para el control
    let cont = 0;
    let flagTwo = false;
    let description = descriptionCapacity.value;
    let abrev = abreviation.value;
    let orderCapacities = orderCapacity.value;
    while (cont < index) {
        if (ctrlCapacity[cont] === description &&
            ctrlAbreviation[cont] === abrev) {
            flagTwo = true;
        }
        cont++;
    }

    if (flagTwo === true) {
        alert('La Capacidad ya está asignada en la tabla');
        return false;
    }
    ctrlCapacity[index] = description;
    ctrlAbreviation[index] = abrev;
    var newRow =
        '<tr id="newRow' + index + '"><td><input type="hidden" name="idCourse[]" value="' + valCourse[0] + '">' + valCourse[1] + '</td><td><input type="hidden" name="description[]" value="' + description + '">' + description + '</td><td><input type="hidden" name="abrev[]" value="' + abrev + '">' + abrev + '</td><td><input type="hidden" name="order[]" value="' + orderCapacities + '">' + orderCapacities + '</td><td><a href="#" class="btn btn-sm btn-danger" onclick="quitarCapacity(' + index + ')" id="delete"><i class="fas fa-minus-circle"></i></a></td></tr>'
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
    ctrlAbreviation[index] = "";
    index--;
}

$('#close').click(function () {
    let elmtTable = document.getElementById('tableCoursesCapacity');
    let tableRows = elmtTable.getElementsByTagName('tr');
    let rowCount = tableRows.length;

    for (let x = rowCount - 1; x > 0; x--) {
        elmtTable.removeChild(tableRows[x]);
    }
    $("#idLevel").attr("disabled", false);
});
