<?php

 $conexion = new mysqli("localhost", "cus77407_user_ev2", "cus77407_user_ev2", "cus77407_bd_pibes");

$nombre = "";
$email = "";
$telefono = "";
$direccion = "";

$errorMensaje = "";
$listoMensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    do {
        if( empty($nombre) ||  empty($email) ||  empty($telefono) ||  empty($direccion)){
            $errorMensaje = "Campo vacio";
            break;
        }
        //agregar
        
        $sql = "INSERT INTO clientes (id, nombre, email,telefono, direccion) VALUES (NULL,'$nombre','$email','$telefono','$direccion')";
        
        $resultado = $conexion->query($sql);
        
        if(!$resultado){
            $errorMensaje = "query invalida: ".$conexion->$error;
            break;
        }
        
        $nombre = "";
        $email = "";
        $telefono = "";
        $direccion = "";

        $listoMensaje = "cliente agregado!";
        
        header("Location: https://usuario1.talleresmelipilla.cl/avenegas2/crud/index.php");
            exit;
        
    } while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My lista</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="contenedor my-5">
        <h2>Nuevo cliente</h2>

        <?php
        if(!empty($errorMensaje)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMensaje</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }

        ?>


        <form method="post">
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-label">Nombre</label>     
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>    
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-label">Email</label>     
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>    
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-label">Telefono</label>     
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>">
                </div>    
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-label">Direccion</label>     
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>">
                </div>    
            </div>

            <?php
            if(!empty($listoMensaje)){
                echo"
                <div class='row mb-3'>
                    <div class= 'offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$listoMensaje</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }

            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="ingresar" class="btn btn-primary">Ingresar</button>
                </div>  
                 <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</body>
</html>