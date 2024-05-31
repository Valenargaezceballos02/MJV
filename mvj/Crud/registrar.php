<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtEmail"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $Email = $_POST["txtEmail"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,email) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$Email]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>