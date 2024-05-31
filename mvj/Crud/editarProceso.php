<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $usuario_id = $_POST['usuario_id'];
    $nombre = $_POST['txtNombre'];
    $email = $_POST['txtEmail'];
    $edad = $_POST['txtEdad'];
    $telefono = $_POST['txtTelefono'];
   

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, email = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>