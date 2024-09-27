<?php

namespace App\Message;

enum Fail : string
{
    case failUserRegister = "No se pudo crear el usuario ";
    case failUserLogin = "Email o password incorrecto";
    case failModelException = "Datos incorrectos";
    case failAuthorizationLogin = "Contacte al administrador del sitio";
}
