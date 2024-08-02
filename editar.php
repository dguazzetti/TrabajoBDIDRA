
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php 
    include("conexion.php");
?>
    <?php 
        if(isset($_POST['enviar'])){
            //aca entra cuando se presionar el boton enviar
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $nota = $_POST['nota'];

            //ahora haremos la query de modificacion o update
            //update alumnos set nombre=$nombre, nota=$nota where id=$id
            $sql = "update alumnos set nombre='".$nombre."', nota='".$nota."' where id='".$id."'";
            $resultado = mysqli_query($conexion, $sql);
            
            if($resultado){
                echo "<script language='JavaScript'>
                      alert('Los datos se actualizaron correctamente');
                      location.assign('index.php');
                      </script>";
            }else{
                echo "<script language='JavaScript'>
                      alert('Los datos NO se actualizaron');
                      location.assign('index.php');
                      </script>";
            }
            
            mysqli_close($conexion);
            
        }else{
            //aca entra cuando no se presiona el boton de enviar
            $id = $_GET['id'];
            $sql = "select * from alumnos where id = '".$id."'";
            $resultado = mysqli_query($conexion, $sql);

            $fila = mysqli_fetch_assoc($resultado);
            $nombre = $fila["nombre"];
            $nota = $fila["nota"];

            mysqli_close($conexion);
    ?>
    <h1>Editar Nombre</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
        <label for="">Nota:</label>
        <input type="text" name="nota" value="<?php echo $nota; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar </a>
    </form>
    <?php 
        }
    ?>
</body>
</html>