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
$filename = "ReportePagos_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background:#cecece;">
        <th>Alumno</th>
        <th>Curso</th>
        <th>Valor del Curso</th>
        <th>Aporte</th>
    </tr>
</thead>
    <tbody>
        @foreach ($pagos as $pago)
        <tr>
            <td>{{ $pago->alumno->nameFullAlumno }}</td>
            <td>{{ $pago->curso->nombre_curso }}</td>
            <td>{{ $pago->valor_curso }}</td>
            <td>{{ $pago->aporte }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>