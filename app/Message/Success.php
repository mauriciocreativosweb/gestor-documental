<?php

namespace App\Message;

enum Success : string
{
    case successUserRegister = "Se envio la solucitud de creacion de usuario ";
    case successUserLogin = "Bienvenido";
        
}
