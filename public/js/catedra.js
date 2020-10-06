// Desactivando el boton mostrar de Catedra
$('#btnCourseTeachers').attr("disabled", true);
$('#saveCourse').attr("disabled", true);
$('#idLevel').attr("disabled", true);
$("#insertCourses").attr("disabled", true);
//Obtenemos el identificador del  select idPeriodo para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valPeriod = [];
$("#idPeriodo").change(function () {
    let p = document.getElementById('idPeriodo');
    let valuePeriod = p.options[p.selectedIndex].value;
    let textPeriod = p.options[p.selectedIndex].text;
    return valPeriod = [valuePeriod, textPeriod];
});
//Obtenemos el identificador del  select idPeriodo para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valGrade = [];
$("#idGrade").change(function () {
    let g = document.getElementById('idGrade');
    let valueGrade = g.options[g.selectedIndex].value;
    let textGrade = g.options[g.selectedIndex].text;
    return valGrade = [valueGrade, textGrade];
});

//Obtenemos el identificador del  select idPeriodo para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valCourse = [];
$("#idCourse").change(function () {
    let c = document.getElementById('idCourse');
    let valueCourse = c.options[c.selectedIndex].value;
    let textCourse = c.options[c.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valCourse = [valueCourse, textCourse];
});

//Obtenemos el identificador del  select idSection para luego comprarlo
//Y verificar si podemos ingresar un nuevo curso o no
let valSection = [];
$("#idSection").change(function () {
    let s = document.getElementById('idSection');
    let valueSection = s.options[s.selectedIndex].value;
    let textSection = s.options[s.selectedIndex].text;
    $("#insertCourses").attr("disabled", false);
    return valSection = [valueSection, textSection];
});