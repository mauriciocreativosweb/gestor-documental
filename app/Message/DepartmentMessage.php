<?php

namespace App\Message;

enum DepartmentMessage : string
{
    case successDepartmentCreate = "se creo el nuevo departamento ";
    case failDepartmentCreate = "No se pudo crear el departamento ";
    case existDepartment = "El departamento ya existe";
    case failCreateDepartmentModel = "porfavor verifique el nombre del departamento";
    case failCreateDepartmentExcept = "Intente mas tarde crear el departamento";


    case successUpdateDepartment = "Se actualizó el departamento";
    case failUpdateDepartmentModel = "No se pudo actualizar el departamento";
    case failUpdateDepartmentException = "Por favor verifique los datos e intente nuevamente";

    case successDeleteDepartment = "Se eliminado el departamento";
    case failDeleteDepartmentModel = "No se pudo eliminar el departamento";
    case failDeleteDepartmentException = "Ups no se pudo eliminar el departamento, intente mas tarde";

    case succcessFindDepartment = "Se encontro el departamento";
    case failFindDepartment = "Departmento no encontrado";
    case failFindDepartmentException = "Ups el departamento no existe";
}
