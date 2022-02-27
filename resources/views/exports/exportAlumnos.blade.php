<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteAlumnos_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");
?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background:#cecece;">
        <th>Nombre del Alumno</th>
        <th>Cédula</th>
        <th>Edad</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Ciudad</th>
        <th>Direccion</th>
        <th>Curso</th>
        <th>Profesor</th>
    </tr>
</thead>
    <tbody>
        @foreach ($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->nameFullAlumno }}</td>
            <td>{{ $alumno->cedula_alumno }}</td>
            <td>{{ $alumno->edad_alumno  }}</td>
            <td>{{ $alumno->phone_alumno  }}</td>
            <td>{{ $alumno->email_alumno }}</td>
            <td>{{ $alumno->ciudad }}</td>
            <td>{{ $alumno->addres }}</td>
            <td>{{ $alumno->curso->nombre_curso }}</td>
            <td>{{ $alumno->profesor->nameFull }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>