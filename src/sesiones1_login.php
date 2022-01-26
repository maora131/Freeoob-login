<?php
function comprobar_usuario($nombre, $clave)
{
    if ($nombre === "usuario" and $clave === "1234") {
        $usu['nombre'] = "usuario";
        $usu['rol'] = 0;
        return $usu;
    } elseif ($nombre === "sofia" and $clave === "1234") {
        $usu['nombre'] = "sofia";
        $usu['rol'] = 1;
        return $usu;
    } else return FALSE;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
    if ($usu == FALSE) {
        $err = TRUE;
        $usuario = $_POST['usuario'];
    }else{
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location:sesiones1_principal.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_GET["redirigido"])) {
        echo "<p> Haga login para continuar </p>";
    } ?>

    <?php if (isset($err) and $err == true) {
        echo "<p> revise usuario y contraseña</p>";
    } ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
        Usuario
        <input value="<?php if (isset($usuario)) echo $usuario; ?>" 
        id="usuario" name="usuario" type="text">
        Clave
        <input id="clave" name="clave" type="password">
         <input type="submit">
    </form>

</body>
</html>
