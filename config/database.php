<?php
$charset = in_array(strtolower('utf-8'), array('utf-8', 'utf8'), TRUE)
    ? 'UTF-8' : SQLSRV_ENC_CHAR;

$conn_id = array(
    'UID' => 'dbluis',
    'PWD' => '123456',
    'Database' => 'DBLuis',
    'CharacterSet' => $charset
);

// Intenta establecer la conexión
$conn_id = sqlsrv_connect('localhost', $conn_id); // Reemplaza 'hostname' con tu hostname

?>