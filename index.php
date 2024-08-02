<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos y sus Notas</title>
    <script type="text/JavaScript">
        function confirmar(){
            return confirm('Esta Seguro de ELIMINAR los datos?');
        }
    </script>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php 
    
        include("conexion.php");
        //select * from alumnos
        $sql = "select * from alumnos";
        $resultado = mysqli_query($conexion, $sql);

    ?>

    <h1>LISTA DE ALUMNOS</h1>
    <a href="agregar.php">Nuevo Alumno</a>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Alumno:</th>
                <th>Nota:</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <th><?php echo $filas['id'] ?></th>
                <th><?php echo $filas['nombre'] ?></th>
                <th><?php echo $filas['nota'] ?></th>
                <th>
                    <?php echo "<a href='editar.php?id=".$filas['id']."'>EDITAR</a>";?>
                    -
                    <?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick= 'return confirmar()'>ELIMINAR</a>";?>
                </th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php 
        mysqli_close($conexion);
    ?>
</body>
</html>