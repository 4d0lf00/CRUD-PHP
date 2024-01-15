<?php


 $conexion = new mysqli("localhost", "cus77407_user_ev2", "cus77407_user_ev2", "cus77407_bd_pibes");
if(!$conexion){
    echo'No se pudo establecer conexion con el servidor:'.mysql_error();
}else{
      $sql= "SELECT * FROM clientes";
      $ejecuta_sentencia = mysqli_query($conexion, $sql);
      if(!$ejecuta_sentencia){
          echo'Hay un error en la sentencia SQL:' .mysqli_error();
      }else{
          echo'Error al mostrar lista de usuarios:' .mysqli_error();
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="contenedor -my5">
        <h2>Lista de Pedidos</h2>
        <a class="btn btn-primary" href="crear.php" role="button">Nuevo pedido</a>
        <br>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
                <?php
                while($row=mysqli_fetch_array($ejecuta_sentencia)){
                    echo"
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[nombre]</td>
                            <td>$row[email]</td>
                            <td>$row[telefono]</td>
                            <td>$row[direccion]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='funciones/editar.php?id=$row[id]'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='funciones/eliminar.php?id=$row[id]'>Eliminar</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            
        </tbody>
    </table>
</body>
</html>