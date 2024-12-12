<?php

namespace App\Message;

enum TypePersonMessage : string
{
    case successTypePersonCreate = "se creo el nuevo tipo de persona ";
    case failTypePersonCreate = "No se pudo crear el tipo de persona ";
    case existTypePerson = "El tipo de persona ya existe";
    case failCreateTypePersonModel = "porfavor verifique el nombre del tipo de persona";
    case failCreateTypePersonExcept = "Intente mas tarde crear el tipo de persona";

    case successUpdateTypePerson = "Se actualizó el tipo de persona";
    case failUpdateTypePersonModel = "No se pudo actualizar el tipo de persona";
    case failUpdateTypePersonException = "Por favor verifique los datos e intente nuevamente";

    case successDeleteTypePerson = "Se elimino el tipo de persona";
    case failDeleteTypePersonModel = "No se pudo eliminar el tipo de persona";
    case failDeleteTypePersonException = "Ups no se pudo eliminar el tipo de persona, intente mas tarde";

    case succcessFindTypePerson = "Se encontro el tipo de persona";
    case failFindTypePerson = "tipo de persona no encontrado";
    case failFindTypePersonException = "Ups el tipo de persona no existe";
}
