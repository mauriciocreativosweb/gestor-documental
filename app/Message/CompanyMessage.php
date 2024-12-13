<?php

namespace App\Message;

enum CompanyMessage : string
{
    case successCompanyCreate = "se creo la nueva empresa";
    case failCompanyCreate = "No se pudo crear la empresa ";
    case existCompany = "La empresa ya existe";
    case failCreateCompanyModel = "porfavor verifique el nombre de la empresa";
    case failCreateCompanyExcept = "Intente mas tarde crear la empresa";


    case successUpdateCompany = "Se actualizó la empresa";
    case failUpdateCompanyModel = "No se pudo actualizar la empresa";
    case failUpdateCompanyException = "Por favor verifique los datos e intente nuevamente";

    case successDeleteCompany = "Se eliminado la empresa";
    case failDeleteCompanyModel = "No se pudo eliminar la empresa";
    case failDeleteCompanyException = "Ups no se pudo eliminar la empresa, intente mas tarde";

    case succcessFindCompany = "Se encontro la empresa";
    case failFindCompanyModel = "Empresa no encontrada";
    case failFindCompanyException = "Ups la empresa no existe";
}
