<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="estilos.css">
    <title>Libreta de Notas</title>
</head>
<body>
    <div class="text-center">
         <h4>Libreta de Notas</h4>
    <div class="contenedor-1">
        <div class="contenedor">
            <div class="contenido-1">AÑO O GRADO</div>
            <div class="contenido1">Primer Grado de Secundaria</div>
            <div class="contenido-2">SECCION</div>
            <div class="contenido2">A</div>
            <div class="contenido-3">FECHA</div>
            <div class="contenido3">12/02/2016</div>
            <div class="contenido-4">N° de Orden: 123</div>
        </div>
        <div class="contenedor1">
            <div class="contenido-5">COD. EDUCANDO</div>
            <div class="contenido5">021345625875</div>
            <div class="contenido-6">DNI</div>
            <div class="contenido6">74122485</div>
            <div class="contenido-7">ALUMNO(A)</div>
            <div class="contenido7">Jacinto Manuel Rodriguez Mendoza</div>
        </div>
    </div>

        <table class="table table-striped text-left">
            <thead>
                <tr>
                    <td rowspan="2">ASIGNATURAS/CAPACIDADES</td>
                    <td rowspan="2">CRITERIOS</td>
                    <td colspan="4">NOTAS BIMESTRALES</td>
                    <td rowspan="2">PROMEDIO</td>                    
                </tr>
                 <tr>
                    <td>1° BIM.</td><td>2° BIM.</td><td>3° BIM.</td><td>4° BIM.</td>
                 </tr>                   
            </thead>
            <tbody>
                <tr>
                    <th>Matematica <br>
                        Doc. Nestor Jacinto Mendoza Arce
                    </th>
                    <th>
                        Razonamiento y demostracion <br>
                        Participacion en clase <br>
                        No duerme en clase <br>
                        Hace las tareas
                    </th>
                    <td>
                        01 <br>
                        09 <br>
                        06 <br>
                        20 <br>
                    </td>
                    <td>
                        01 <br>
                        09 <br>
                        06 <br>
                        20 <br>
                    </td>
                    <td>
                        01 <br>
                        09 <br>
                        06 <br>
                        20 <br>
                    </td>
                    <td>
                        01 <br>
                        09 <br>
                        06 <br>
                        20 <br>
                    </td>
                    <td> 20</td>
                </tr>  
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th colspan="2">PROMEDIOS</th>
                    <td>12.00</td>
                    <td>12.00</td>
                    <td>12.00</td>
                    <td>12.00</td>
                    <td>12.00</td>
                </tr>
                <tr>
                    <th colspan="2">ORDEN DE MÉRITO</th>
                    <td>27/33</td>
                    <td>27/33</td>
                    <td>27/98</td>
                    <td>12/15</td>
                    <td>23/45</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>