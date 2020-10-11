<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table{
        border-collapse: collapse;
        width: 100%;
    }
    th{
        background-color:royalblue;
        color:white;
        font-size: 15px;
    }
    td{
        font-size:13px;
    }
    table td,table th{
        border: 1px solid #ddd;
    }
    .sombreado{
        font-weight: bold;
    }
    .azul{
        color:blue;
    }
    .rojo 
    {
        color:red;
    }
    .abajo
    {
      margin-bottom: 20px; 
    }
    .page-break {
            padding-top: 150px;
        }
</style>
<body>
    <div class="abajo">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Datos Personales</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $item)
                <tr>
                <td>{{"Nombre: ".$item->nameWorker}}</td>
                </tr>  
                <tr>
                    <td>{{"Apellidos: ".$item->lastNameWorker}}</td>
                </tr>
                <tr>
                    <td>{{"Grado: ".$item->descriptionGrade}}</td>
                </tr>
                <tr>
                    <td>{{"Curso: ".$item->descriptionCourse}}</td>
                </tr>
                <tr>
                    <td>{{"Sección: ".$item->descriptionSection}}</td>
                </tr>
                @endforeach
             
            </tbody>
        
        </table>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th colspan="3">REPORTE</th>
            </tr>
            <tr>
                <th>ALUMNO</th>
                <th>BIMESTRE</th>
                <th>NOTA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($note as $item1)
            <tr>
                <td class="sombreado">{{$item1->nameStudent}}</td>
                <td class="sombreado">{{$item1->bimester}}</td>
                @if($item1->note>=11)
                    <td class="azul">{{$item1->note}}</td>
                @else 
                    <td class="rojo">{{$item1->note}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>