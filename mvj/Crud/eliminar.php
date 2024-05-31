<?php 
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $usuario_id = $_GET['usuario_id'];

    $sentencia = $bd->prepare("DELETE FROM persona where usuario_id = ?;");
    $resultado = $sentencia->execute([$usuario_id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>