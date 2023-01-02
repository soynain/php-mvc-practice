<?php
function createSession($username, $idusuario)
{
    $_SESSION["user"] = $username;
    $_SESSION["id"] = $idusuario;
    session_start();
}
