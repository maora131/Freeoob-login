<?php
    session_start(); //unirse a la seesión
    $_SESSION = array();

    session_destroy(); //eliminar la sesión
    //eliminar la cookie

    setcookie(session_name(), 123, time() - 1000);
    header("Location: sesiones1_login.php");