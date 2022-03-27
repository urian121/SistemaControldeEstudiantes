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
        <th>ALUMNO</th>
        <th>CORREO</th>
        <th>CEDULA</th>
        <th>LUGAR. EXP</th>
        <th>TELEFONO</th>
        <th>OBSERVACION</th>
        <th>CURSO</th>
        <th>VALOR DEL CURSO</th>
        <th>APORTE</th>
        <th>FECHA APORTE</th>
    </tr>
</thead>
    <tbody>
        @foreach ($pagos as $pago)
        <tr>
            <td>{{ $pago->alumno->nameFullAlumno }}</td>
            <td>{{ $pago->alumno->email_alumno }}</td>
            <td>{{ $pago->alumno->cedula_alumno }}</td>
            <td>{{ $pago->alumno->lugar_exp_document }}</td>
            <td>{{ $pago->alumno->phone_alumno }}</td>
            <td>{{ $pago->alumno->observ }}</td>
            <td>{{ $pago->curso->nombre_curso }}</td>
            <td>{{ $pago->valor_curso }}</td>
            <td>{{ $pago->aporte }}</td>
            <td>{{ $pago->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>