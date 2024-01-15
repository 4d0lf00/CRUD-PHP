<?php
    $conexion = new mysqli("localhost", "cus77407_user_ev2", "cus77407_user_ev2", "cus77407_bd_pibes");
    
    
    $id = "";
    $nombre = "";
    $email = "";
    $telefono = "";
    $direccion = "";
    
    $errorMensaje = "";
    $listoMensaje = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if(!isset($_GET["id"]) ){
            header("https://usuario1.talleresmelipilla.cl/avenegas2/crud/index.php");
            exit;
        }
        
        $id = $_GET["id"];
        //consulta
        $sql = "SELECT * FROM clientes WHERE id =$id";
        $resultado = $conexion->query($sql);
        $row = $resultado->fetch_assoc();
        
        if(!$row){
            header("https://usuario1.talleresmelipilla.cl/avenegas2/crud/index.php");
            exit;
        }
        
        $nombre = $row["nombre"];
        $email = $row["email"];
        $telefono = $row["telefono"];
        $direccion = $row["direccion"];
    
    
    }else{
        
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        
        do{
            if(empty($id) || empty($nombre) || empty($email) || empty($telefono) || empty($direccion)){
                
                $errorMensaje = "Campos requeridos";
                break;
            }
            
            $sql = "UPDATE clientes SET nombre = '$nombre', email = '$email' , telefono = '$telefono' , direccion = '$direccion' WHERE id = $id";
            
            $resultado = $conexion->query($sql);
            
            if(!$resultado){
                $errorMensaje = "Query invalida: ".$conexion->$error;
                break;
            }
            
        $listoMensaje = "Cliente Editado";  
        
        header("Location: https://usuario1.talleresmelipilla.cl/avenegas2/crud/index.php");
            exit;
            
        }while (true);
        
        
        
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
            <div class='aler alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMensaje</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }

        ?>


        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
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
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='aler alert-warning alert-dismissible fade show' role='alert'>
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
                    <a class="btn btn-outline-primary" href="../index.php" role="button">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</body>
</html>