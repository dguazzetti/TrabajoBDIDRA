<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Alumno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php 
        if(isset($_POST['enviar'])){
            $nombre = $_POST['nombre'];
            $nota = $_POST['nota'];

            include("conexion.php");
            //ahora hacemos las querys
            //insert into alumnos(nombre, nota)
            //values($nombre, $nota)
            $sql = "insert into alumnos(nombre, nota)
            values('".$nombre."', '".$nota."')";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                //los datos ingresaron a la bd
                echo "<script language='JavaScript'>
                      alert('Los datos fueron ingresados correctamente a la BD');
                      location.assign('index.php');
                      </script>";
            }else{
                //los datos NO ingresaron a la bd
                echo "<script language='JavaScript'>
                      alert ('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                      location.assign('index.php');
                      </script>";
            }
            mysqli_close($conexion);

        }else{
    ?>
    <h1>Agregar Nuevo Alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <label for="">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="">Nota:</label>
        <input type="text" name="nota"><br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar </a>
    </form>
    <?php 
        }
    ?>
</body>
</html>