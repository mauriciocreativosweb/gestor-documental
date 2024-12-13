<?php

namespace App\Message;

enum SectorMessage : string
{
    case successCreateSector = "Se creo el nuevo sector";
    case failCreateSector = "No se pudo crear el sector";
    case existSector = "El sector ya existe";
    case failCreateModel = "porfavor verifique el nombre del sector";
    case failCreatorException = "Intente mas tarde crear el sector";

    case successUpdateSector = "Se actualizó el Sector";
    case failUpdateSectorModel = "No se pudo actualizar el sector";
    case failUpdateSectorException = "Por favor verifique los datos e intente nuevamente";

    case successDeleteSector = "Se eliminado el sector";
    case failDeleteSectorModel = "No se pudo eliminar el sector";
    case failDeleteSectorException = "Ups no se pudo eliminar el sector, intente mas tarde";

    case succcessFindSector = "Se encontro el sector";
    case failFindSector = "Sector no encontrado";
    case failFindSectorException = "Ups el sector no existe";


}
