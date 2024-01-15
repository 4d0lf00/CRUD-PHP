<?php
    if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $conexion = new mysqli("localhost", "cus77407_user_ev2", "cus77407_user_ev2", "cus77407_bd_pibes");
    
    $sql = "DELETE FROM clientes WHERE id = $id";
    $conexion->query($sql);
}

    header("Location: https://usuario1.talleresmelipilla.cl/avenegas2/crud/index.php");
    exit;
?>