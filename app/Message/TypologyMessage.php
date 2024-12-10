<?php

namespace App\Message;

enum TypologyMessage : string
{
    case successTypologyCreate = "se creo la nueva tipología ";
    case failTypologyCreate = "No se pudo crear la tipología ";
    case existTypology = "La tipología ya existe";
    case failCreateTypologyModel = "porfavor verifique el nombre de la tipología";
    case failCreateTypologyExcept = "Intente mas tarde crear la tipología";

    case successUpdateTypology = "Se actualizó la tipología";
    case failUpdateTypologyModel = "No se pudo actualizar la topología";
    case failUpdateTypologyException = "Por favor verifique los datos e intente nuevamente";

    case successDeleteTypology = "Se eliminado la topología";
    case failDeleteTypologyModel = "No se pudo eliminar la topología";
    case failDeleteTypologyException = "Ups no se pudo eliminar la topología, intente mas tarde";

    case succcessFindTypology = "Se encontro la topología";
    case failFindTypology = "Topología no encontrada";
    case failFindTypologyException = "Ups la topología no existe";
}
