<?php
$msdemmodulo = [
    ['id' => 1, 'nombre' => 'Modulo 1', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Modulo 1', 'moduloss' => [1, 2, 3, 4, 5]],
    ['id' => 2, 'nombre' => 'Modulo 2', 'estado' => 1, 'porcentajecompletado'=> 40, 'Modulo 2' => 'Clinica estetica', 'moduloss' => [3, 2, 1, 9]],
    ['id' => 3, 'nombre' => 'Modulo 3', 'estado' => 1, 'porcentajecompletado'=> 60, 'Modulo 3' => 'Spa', 'moduloss' => [2, 3, 5]],
];

$modulossseleccionar = [
    ['id' => 1, 'nombre' => 'Recursos humanos', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Spa', 'color' => '#fd7377', 'icono' => 'img/moduloicono1.png'],
    ['id' => 2, 'nombre' => 'establecimiento e infraetructura', 'estado' => 1, 'porcentajecompletado'=> 40, 'mlogia' => 'Clinica estetica', 'color' => '#62646f', 'icono' => 'img/moduloicono2.png'],
    ['id' => 3, 'nombre' => 'Tratamiento de medicamentos', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Spa', 'color' => '#f2ac3e', 'icono' => 'img/moduloicono3.png'],
    ['id' => 4, 'nombre' => 'Recursos humanos', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Spa', 'color' => '#7b6cc9', 'icono' => 'img/moduloicono4.png'],
    ['id' => 5, 'nombre' => 'establecimiento e infraetructura', 'estado' => 1, 'porcentajecompletado'=> 40, 'mlogia' => 'Clinica estetica', 'color' => '#ffca55', 'icono' => 'img/moduloicono5.png'],
    ['id' => 6, 'nombre' => 'Tratamiento de medicamentos', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Spa', 'color' => '#ff5055', 'icono' => 'img/moduloicono6.png'],
    ['id' => 7, 'nombre' => 'Recursos humanos', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Spa', 'color' => '#47a1a8', 'icono' => 'img/moduloicono7.png'],
    ['id' => 8, 'nombre' => 'establecimiento e infraetructura', 'estado' => 1, 'porcentajecompletado'=> 40, 'mlogia' => 'Clinica estetica', 'color' => '#ffca55', 'icono' => 'img/moduloicono8.png'],
    ['id' => 9, 'nombre' => 'Tratamiento de medicamentos', 'estado' => 0, 'porcentajecompletado'=> 60, 'mlogia' => 'Spa', 'color' => '#7a8ffa', 'icono' => 'img/moduloicono3.png'],
   
];

$informaciondelmmmodulo = [
    'id'                      => 1,
    'nombre_mmodulo'          => 'Nombre de la mmodulo numero uno',
    'nit'                     => '123456789',
    'numero_empleados'        => 150,
    'mlogia'               => 'Spa',
    'direccion'               => 'Calle Falsa 123, Ciudad',
    'telefono'                => '3102640456',
    'whatsapp'                => '573102640456',
    'representante_legal'     => 'Juan Pérez',
    'sitio_web'               => 'https://www.ejemplo.com',
    'descripcion_mmodulo'     => 'Descripción breve de la mmodulo y sus actividades.',
    'estado'                  => 1,
    'ultima_fecha_pago'       => '2024-10-01',
    'fecha_vencimiento_pago'  => '2024-11-01',
    'correo_contacto'         => 'contacto@ejemplo.com',
    'representante_telefono'  => '+591 456 789 012',
    'fecha_creacion'          => '2022-01-15',
    'm_persona'            => 'Jurídica',
    'sector'                  => 'Salud',
    'asesor'                  => 'Asesor #3',
    'ciudad'                  => 'Bogotá',
    'porcentajecompletado'    => 60,
];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mmmodulo</title>
    <style>
        #slideDivmmmodulo { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #slideDivmmmodulo.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
        @keyframes growWidth { from { width: 0; } to { width: 60%; } } #porcentajetotal div { animation: growWidth 3s ease forwards; }
        .switchmmmodulo input{opacity:0;width:0}.slideres{display:flex;align-items:center;position:absolute;cursor:pointer;top:10%;left:10%;right:0;bottom:0;background-color:#FD7377;transition:0.4s;border-radius:100vw}.slideres span{position:absolute;content:'';height:75%;aspect-ratio:1/1;border-radius:50%;left:8%;background-color:white;transition:0.4s}.slideres.on{background-color:#47A1A8}.slideres.off{background-color:#FD7377}.slideres.on span{transform:translateX(100%)}.slideres.off span{transform:translateX(0)}
        #slideDivmmmodulo { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #slideDivmmmodulo.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
    
        .acordeon-container {width: 100%; margin: 0 auto; margin:0; padding:0;}
        .acordeon {border-radius:10px; background-color: #F2F3F6; width: 100%; aspect-ratio:13/1; border: none;text-align: left;cursor: pointer;font-size: 18px;transition: 0.3s; margin-top:.8%;}
        .acordeon:hover {background-color: #ffffff;}
        .panel {margin-top:-5px; z-index:9999999; padding: 10px 18px; display: none; background-color: #ffffff;overflow: hidden;border-top: 1px solid #ccc; border-radius: 0 0 10px 10px;}

    </style>
</head> 
<body style="overflow:hidden;">
    
    <div style="width:100%; height:100%; box-sizing: border-box; padding-left:3%;">
        <h1 style="color:#47A1A8;">moduloss y normatividad</h1>
        <p style="font-size:1vw;">En esta sección puedes gestionar cada uno de los moduloss, es decir las listas de la documentacion que debe cumplir cada usuario</p>
        
        <div style="width:96%; aspect-ratio:35/1; display:flex; flex-direction:row; justify-content: space-between;">
            <div style="width:50%; height:95%; position: relative;">
                <input id="buscarmoduloss" type="text" placeholder="Buscar" style="padding-left:40px; font-size:.9vw; width:calc(99% - 40px); height:100%; border:2px solid #47A1A8; border-radius:12px;" oninput="filtrarmmoduloss()">
                <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-30%); color: #ccc;">
                    <img src="https://img.icons8.com/material-outlined/24/cccccc/search.png" alt="Search Icon">
                </span>
            </div>
            <select id="filtrarporestadomoduloss" style="padding-left:1%; font-size:.9vw; width:22%; height:115%; background-color:#ffffff; border: 2px solid #47A1A8; border-radius:12px;" onchange="filtrarmmoduloss()">
                <option value="Todos">Todos</option>
                <option value="Activos">Activos</option>
                <option value="Inactivos">Inactivos</option>
            </select>

            <div onclick="" style="cursor:pointer; width:13%; height:100%; background-color:#ffffff; border-radius:10px; display:flex; align-items:center; justify-content:center; border: 2px solid #47A1A8;">
                <p style="color:#47A1A8; font-size:.9vw;">Exportar</p>
            </div>
            <div onclick="mostrarmodalsumarusuario()" style="cursor:pointer; width:13%; height:100%; background-color:#47A1A8; border-radius:10px; display:flex; align-items:center; justify-content:center; border: 2px solid #47A1A8;">
                <p style="color:#ffffff; font-size:.9vw;">+ Nuevo modulo</p>
            </div>
        </div>

        <div style="width:96%;height:calc(73% + 10px); display:flex; flex-direction:rpw;">

        
            <div id="listammmodulo" style="width:50%; height:100%; margin-top:20px; overflow-y: auto; padding:1%; box-sizing:border-box;">
                <?php foreach ($msdemmodulo as $msdemmoduloss): ?>
                    <div id="mmodulo<?php echo $msdemmoduloss['id']; ?>" class="mmodulossc" data-estado="<?php echo $msdemmoduloss['estado']; ?>" 
                        style="width:100%; aspect-ratio:25/1; margin-bottom:.6%; background-color:#F2F3F6; border-radius:.5vw; display:flex; flex-direction:row; align-items:center; cursor:pointer;" 
                        onclick="seleccionarmmodulo(<?php echo $msdemmoduloss['id']; ?>)">
                        <p id="nombremmodulo<?php echo $msdemmoduloss['id']; ?>" class="nombremmodulo" style="margin-left:2%; width:80%; font-size:.9vw;"><?php echo $msdemmoduloss['nombre']; ?></p>
                        <div style="width:10%; height:100%; display:flex; flex-direction:row; justify-content: flex-end; align-items:center;">
                            <img id="eliminarmmodulo<?php echo $msdemmoduloss['id']; ?>" class="eliminarmmodulo" onclick="eliminarmmmodulo(<?php echo $msdemmoduloss['id']; ?>)" style=" height:80%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/delete.png" alt="Delete Icon">
                            <img id="editarmmodulo<?php echo $msdemmoduloss['id']; ?>" class="editarmmodulo" onclick="editarmmmodulo(<?php echo $msdemmoduloss['id']; ?>)" style="height:80%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/edit.png" alt="Edit Icon">
                        </div>
                        <label class="switchmmmodulo" style="margin-right:2%; position: relative; display: inline-block; height: 100%; aspect-ratio:1.8/1;">
                            <input type="checkbox" id="switchmmmodulo<?php echo $msdemmoduloss['id']; ?>" onchange="toggleswitchmmmoduloclientes(<?php echo $msdemmoduloss['id']; ?>)" style="opacity: 0; width: 0;" <?php echo ($msdemmoduloss['estado'] == 1) ? 'checked' : ''; ?>>
                            <span class="slideres <?php echo ($msdemmoduloss['estado'] == 1) ? 'on' : 'off'; ?>" style="display:flex; align-items:center; position: absolute; cursor: pointer; top: 10%; left: 10%; right: 0; bottom: 0; transition: 0.4s; border-radius:100vw;">
                                <span style="position: absolute; content: ''; height: 75%; aspect-ratio:1/1; border-radius: 50%; left: 8%; background-color: white; transition: 0.4s;"></span>
                            </span>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="listammmodulo" style="border-radius:10px; background-color:#47A1A8; width:50%; height:100%; margin-top:15px; overflow-y: auto; padding:1%; box-sizing:border-box;">
             
        

            <div class="acordeon-container">

                <div class="acordeon-item" draggable="true">
                    <div class="acordeon" style="display:flex; flex-direction:row; padding-left:3%; box-sizing:border-box; align-items:center; justify-content: space-between;">
                        <p class="abriracordion">Titulo del documento numero uno</p>
                        <div style="margin-right:3%; height:60%; aspect-ratio:1/1; border-radius:8px; background-color:#2085ec; position:relative; cursor:pointer;" onclick="document.getElementById('colorInput').click();">
                            <input id="colorInput" type="color" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0; cursor:pointer;" onchange="this.parentElement.style.backgroundColor=this.value">
                        </div>
                    </div>
                    <div class="panel">
                        <p>Contenido de la sección 1</p>
                    </div>
                </div>
                <div class="acordeon-item" draggable="true">
                    <div class="acordeon" style="display:flex; flex-direction:row; padding-left:3%; box-sizing:border-box; align-items:center; justify-content: space-between;">
                        <p class="abriracordion">Titulo del documento numero dos</p>
                        <div style="margin-right:3%; height:60%; aspect-ratio:1/1; border-radius:8px; background-color:#2085ec; position:relative; cursor:pointer;" onclick="document.getElementById('colorInput').click();">
                            <input id="colorInput" type="color" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0; cursor:pointer;" onchange="this.parentElement.style.backgroundColor=this.value">
                        </div>
                    </div>
                    <div class="panel">
                        <p>Contenido de la sección 1</p>
                    </div>
                </div>
                <div class="acordeon-item" draggable="true">
                    <div class="acordeon" style="display:flex; flex-direction:row; padding-left:3%; box-sizing:border-box; align-items:center; justify-content: space-between;">
                        <p class="abriracordion">Titulo del documento numero tres</p>
                        <div style="margin-right:3%; height:60%; aspect-ratio:1/1; border-radius:8px; background-color:#2085ec; position:relative; cursor:pointer;" onclick="document.getElementById('colorInput').click();">
                            <input id="colorInput" type="color" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0; cursor:pointer;" onchange="this.parentElement.style.backgroundColor=this.value">
                        </div>
                    </div>
                    <div class="panel">
                        <p>Contenido de la sección 1</p>
                    </div>
                </div>



            </div>

                

            </div>



            
            

        </div>
    </div>

    <div id="modalnuevommmodulo" style="display:none; position:relative; width:150vw; height:150vh; background-color:rgba(50, 50, 50, 0.8); position:fixed; padding:0; margin:0; z-index: 99999; margin-left:-18.4%; align-items:center; justify-content:center;">
        <div style="position:relative; Width:50vw;height:50vh;;background-color:#ffffff; margin:0;padding:0;border-radius:12px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <img src="img/logo.svg" alt="logo" style="width:30%;">
            <p style="width:70%;text-align:center; font-size:.9vw;">No es posible agregar a un nuevo usuario de forma directa, ya que es necesario que realice su registro. Sin embargo, puedes utilizar este formulario para enviar una invitación por correo electrónico, permitiendo que la persona se una a la comunidad.</p>
            <input id="nombreinvitacion" type="text" autocomplete="off" name="name"placeholder="Nombre" style=" text-align:center;width:50%;height:30px;border-radius:12px;border:2px solid #47A1A8;">
            <input id="emailinvitacion" type="email" autocomplete="off" placeholder="Email" style=" text-align:center;width:50%;height:30px;margin-top:10px;border-radius:12px;border:2px solid #47A1A8;">
            <div onclick="" style="background-color:#47A1A8; margin-top:10px; width:200px; height:35px; border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer;"><p style="color:#ffffff; width:100%;height:50%;text-align:center;padding:0;">Enviar invitación</p></div>
            <p onclick="ocultarmodalsumarusuario()" style="color:#47A1A8; cursor:pointer;">Cerrar</p>
        </div>
    </div>
    <div id="modaleliminarmmmodulo" style="display:none; position:relative; width:150vw; height:150vh; background-color:rgba(50, 50, 50, 0.8); position:fixed; padding:0; margin:0; z-index: 99999; margin-left:-18.4%; align-items:center; justify-content:center;">
        <div style="position:relative; Width:50vw;height:50vh;;background-color:#ffffff; margin:0;padding:0;border-radius:12px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <img src="img/logo.svg" alt="logo" style="width:30%;">
            <p style="width:50%;text-align:center; font-size:.9vw;">Para eliminar de manera <b>permanente</b> este usuario por favor escriba <b>la palabra "eliminar"</b></p>
            <input id="palabraeliminarmodulo" type="nombre" placeholder="Escriba la palabra eliminar" style=" text-align:center;width:50%;height:30px;border-radius:12px;border:2px solid #47A1A8;">
            <div onclick="confirmareliminarmmmodulo()" style="background-color:#47A1A8; margin-top:10px; width:200px; height:35px; border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer;"><p style="color:#ffffff; width:100%;height:50%;text-align:center;padding:0;">Eliminar</p></div>
            <p onclick="cerrareliminarmmmodulo()" style="color:#47A1A8; cursor:pointer;">Cerrar</p>
        </div> 
    </div>

    <!--slide-->
    <div id="slideDivmmmodulo" style="padding:2%; box-sizing: border-box;">

            <div style="height:100%; overflow-y: auto; overflow-x: hidden; padding:3%; padding-top:0; padding-bottom:0;">
                <p style="margin:0; padding:0; color:#47A1A8; font-size:1.3vw; font-weight:700;">Informacion del usuario</p>
                <p style="font-size:.7vw;  padding:0;">A continuación se muestra la información del usuario seleccionado. Por favor, no realices modificaciones a menos que sea estrictamente necesario.</p>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                <div style="margin-bottom: 16px; position: relative; width:49%;">
                    <input type="text" name="ciudad" value="<?php echo $informaciondelmmmodulo['ciudad']; ?>" placeholder="Ciudad" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/building.png" alt="Company Icon">
                    </span>
                </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input readonly type="text" value="<?php echo $informaciondelmmmodulo['fecha_creacion'];?>" name="Suscripción" placeholder="Suscripción" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/calendar.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" name="mmodulo" value="<?php echo $informaciondelmmmodulo['nombre_mmodulo']; ?>" placeholder="Nombre de la mmodulo o razón social" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/building.png" alt="Company Icon">
                    </span>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" name="identificacion" value="<?php echo $informaciondelmmmodulo['nit'];?>" placeholder="Nit" style="width: 100%; padding: 6px; padding-left:40px; width:calc(96% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/identification-documents.png" alt="Identification Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" name="empleados" value="<?php echo $informaciondelmmmodulo['numero_empleados'];?>" placeholder="No. Empleados" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/user.png" alt="User Icon">
                        </span>
                    </div>
                </div>



                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" name="location" value="<?php echo $informaciondelmmmodulo['direccion'];?>" placeholder="Dirección de la sede principal" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/marker.png" alt="Location Icon">
                    </span>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" value="<?php echo $informaciondelmmmodulo['telefono'];?>" name="Teléfono" placeholder="Teléfono" style="width: 100%; padding: 6px; padding-left:40px; width:calc(96% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/phone.png" alt="Identification Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" value="<?php echo $informaciondelmmmodulo['whatsapp'];?>" name="WhatsApp" placeholder="WhatsApp" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/whatsapp.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" value="<?php echo $informaciondelmmmodulo['representante_legal'];?>" name="representante" placeholder="Representante legal" style="width: calc(100% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/businessman.png" alt="Representative Icon">
                    </span>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" value="<?php echo $informaciondelmmmodulo['sitio_web'];?>" name="web" placeholder="Sitio web" style="width: calc(100% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/internet.png" alt="Website Icon">
                    </span>
                </div>

                <div style="margin-bottom: 10px; position: relative;">
                    <textarea name="descripcion" placeholder="Descripcion de la mmodulo" rows="3" style="width: 98%; padding: 6px 6px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333; resize: none;"><?php echo $informaciondelmmmodulo['descripcion_mmodulo'];?></textarea>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:50%;"> 
                        <button onclick="guradrmmmodulomodificado()" style="cursor:pointer; background-color:#ffffff; color:#47A1A8; border-radius:10px; border: 2px solid #47A1A8; width:100%;height:35px;font-weight:600;">Cerrar</button>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:50%; margin-left:2%;">
                        <button onclick="guradrmmmodulomodificado()" style="cursor:pointer; background-color:#47A1A8; color:#ffffff; border-radius:10px; border:none; width:100%;height:35px;font-weight:600;">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="slideDivmmmodulo" style="padding:2%; box-sizing: border-box;">
            <p style="margin:0; padding:0; color:#47A1A8; font-size:1.3vw; font-weight:700;">Informacion del colaborador</p>
            <p style="font-size:.7vw;  padding:0;">Este es un email transaccional, por tanto, debe ser de caracter informativo. No se espera que el usuario responda y no existe un historial.</p>
            <div style="margin-bottom: 16px; position: relative;">
                <input id="asuntoemailcolaborador" type="text" name="mmoduloc" placeholder="Asunto" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                    <img src="https://img.icons8.com/material-outlined/24/cccccc/mail.png" alt="Company Icon">
                </span>
            </div>
            <div style="margin-bottom: 10px; position: relative;">
                <textarea name="descripcion" placeholder="Escribe aqui el mensaje que deseas enviar a este usuario" rows="3" style="height:70vh; width: 98%; padding: 6px 6px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 1vw; background-color: #FAFBFE; color: #333; resize: none;"></textarea>
            </div>
            
            <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                <div style="margin-bottom: 16px; position: relative; width:50%; "> 
                    <button onclick="enviaremailclientes()" style="cursor:pointer; background-color:#ffffff; color:#47A1A8; border-radius:10px; border:2px solid #47A1A8; width:100%;height:35px;font-weight:600;">Cerrar</button>
                </div>
                <div style="margin-bottom: 16px; position: relative; width:50%; margin-left:2%;">
                    <button onclick="enviaremailclientes()" style="cursor:pointer; background-color:#47A1A8; color:#ffffff; border-radius:10px; border:none; width:100%;height:35px;font-weight:600;">Enviar</button>
                </div>
            </div>
        </div>


    <script>
        var mmmodulo = <?php echo json_encode($modulossseleccionar); ?>;
        var usuarioaeliminar = "";

        function filtrarmmoduloss() {
            const inputbuscarempresa = document.getElementById('buscarmoduloss').value.toLowerCase(); 
            const estadoFiltrosc = document.getElementById('filtrarporestadomoduloss').value; 
            const mmodulosscs = document.querySelectorAll('.mmodulossc'); 

            mmodulosscs.forEach(mmodulo => {
                const nombremmodulo = mmodulo.querySelector('.nombremmodulo').textContent.toLowerCase(); // Cambiado a 'nombremmodulo'
                const estadommodulo = mmodulo.getAttribute('data-estado'); 
                const coincideEstado = (estadoFiltrosc === "Todos" || (estadoFiltrosc === "Activos" && parseInt(estadommodulo) === 1) || (estadoFiltrosc === "Inactivos" && parseInt(estadommodulo) === 0)); 
                const coincideNombre = nombremmodulo.includes(inputbuscarempresa);
                
                if (coincideNombre && coincideEstado) {
                    mmodulo.style.display = 'flex';
                } else {
                    mmodulo.style.display = 'none';
                }
            });
        }


        function mostrarmodalsumarusuario(){
            document.getElementById('modalnuevommmodulo').style.display = "flex";
        }
        function ocultarmodalsumarusuario(){
            document.getElementById('modalnuevommmodulo').style.display = "none";
        }
        function eliminarmmmodulo(id){
            usuarioaeliminar = id;
            document.getElementById('modaleliminarmmmodulo').style.display = "flex";
        }
        function confirmareliminarmmmodulo(){
            let palabraeliminarmodulo = document.getElementById('palabraeliminarmodulo').value;
            if(palabraeliminarmodulo === 'eliminar'){
                document.getElementById('modaleliminarmmmodulo').style.display = "none";
                const mmoduloDiv = document.getElementById('mmodulo' + usuarioaeliminar);
                if (mmoduloDiv) {
                    mmoduloDiv.style.display = 'none';
                }                   
            }else{
                alert('La palabra '+palabraeliminarmodulo+' no coincide');
            }
        }
        

        function editarmmmodulo(id) {
            const slideDivmmmodulo = document.getElementById('slideDivmmmodulo');
            if (slideDivmmmodulo.classList.contains('active')) {
                slideDivmmmodulo.classList.remove('active'); 
            } else {
                slideDivmmmodulo.classList.add('active');  
            }
        }

        
        function guradrmmmodulomodificado(){
            const slideDivmmmodulo = document.getElementById('slideDivmmmodulo');
            slideDivmmmodulo.classList.remove('active'); 
        }

         
        function cerrareliminarmmmodulo(){
            document.getElementById('modaleliminarmmmodulo').style.display = "none";
        }


        function toggleswitchmmmodulo(usuarioId) {
            var switchmmmoduloElement = document.getElementById("switchmmmodulo" + usuarioId);
            var estado = switchmmmoduloElement.checked ? 1 : 0;  
                        var slider = switchmmmoduloElement.nextElementSibling;
            var color = estado === 1 ? '#47A1A8' : '#FD7377';  
            slider.style.backgroundColor = color;
            actualizarEstado(usuarioId, estado);
        }

        function actualizarEstado(usuarioId, estado) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "actualizar_estado.php", true); 
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Estado de usuario " + usuarioId + " actualizado a " + estado);
                }
            };
            xhr.send("usuario_id=" + usuarioId + "&estado=" + estado);  
        }

        function toggleswitchmmmoduloclientes(userId) {
            var checkbox = document.getElementById('switchmmmodulo' + userId);
            var estado = checkbox.checked ? 1 : 0; 
            var slider = document.querySelector('#switchmmmodulo' + userId + ' + .slideres');
            var circle = slider.querySelector('span');
            if (estado === 1) {
                slider.style.backgroundColor = '#47A1A8';
                circle.style.transform = 'translateX(100%)';
            } else {
                slider.style.backgroundColor = '#FD7377'; 
                circle.style.transform = 'translateX(0px)';
            }
        }




        

        function seleccionarmmodulo(id) {

            const mmoduloss = document.querySelectorAll('.mmodulossc'); 
            const nombremmoduloss = document.querySelectorAll('.nombremmodulo');
            const eliminarmmodulo = document.querySelectorAll('.eliminarmmodulo');
            const editarmmodulo = document.querySelectorAll('.editarmmodulo');

            mmoduloss.forEach(emp => {
                emp.style.backgroundColor = '#F2F3F6';
            });

            nombremmoduloss.forEach(emp => {
                emp.style.color = '#868686';
            });

            eliminarmmodulo.forEach(emp => {
                emp.src = 'https://img.icons8.com/material-outlined/24/47A1A8/delete.png';
            });

            editarmmodulo.forEach(emp => {
                emp.src = 'https://img.icons8.com/material-outlined/24/47A1A8/edit.png';
            });

            const mmodulosseleccionada = document.getElementById('mmodulo' + id);
            let nombremmodulosseleccionada = document.getElementById('nombremmodulo' + id);
            let eliminarmmodulosseleccionada = document.getElementById('eliminarmmodulo' + id);
            let editarmmodulosseleccionada = document.getElementById('editarmmodulo' + id);
            mmodulosseleccionada.style.backgroundColor = 'RGBA(71, 161, 168, .8)';
            nombremmodulosseleccionada.style.color = '#ffffff';
            eliminarmmodulosseleccionada.src = 'https://img.icons8.com/material-outlined/24/ffffff/delete.png';
            editarmmodulosseleccionada.src = 'https://img.icons8.com/material-outlined/24/ffffff/edit.png';


        }

        function movermoduloss(modulossAMover, zonaDestino) {
            const zonaOrigen = document.getElementById('moduloss');
            const zonaDestinoElement = document.getElementById(zonaDestino);
            if (!zonaDestinoElement) {
                console.error('Zona de destino no encontrada:', zonaDestino);
                return;
            }
            zonaOrigen.querySelectorAll('.modulossarrastrar').forEach(item => {
                const moduloId = item.id;
                if (modulossAMover.includes(moduloId)) {
                    zonaDestinoElement.appendChild(item);
                }
            });
        }








        var acordeones = document.querySelectorAll('.abriracordion');  // Seleccionamos solo los elementos <p>

        acordeones.forEach(function(acordeon) {
            acordeon.addEventListener('click', function() {
                // Al hacer clic en el <p>, obtenemos el siguiente elemento hermano (el panel)
                var panel = acordeon.closest('.acordeon-item').querySelector('.panel');
                
                // Verifica si el panel está visible o no
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        });


        // Habilitar arrastrar y soltar
        const acordeonItems = document.querySelectorAll('.acordeon-item');
        acordeonItems.forEach(item => {
            item.addEventListener('dragstart', dragStart);
            item.addEventListener('dragover', dragOver);
            item.addEventListener('drop', drop);
            item.addEventListener('dragleave', dragLeave);
        });

        let draggedItem = null;

        function dragStart(e) {
            draggedItem = this;
            setTimeout(() => {
            this.style.visibility = "hidden"; 
            }, 0);
        }

        function dragOver(e) {
            e.preventDefault();
        }

        function drop(e) {
            e.preventDefault();
            if (draggedItem !== this) {
            this.parentNode.insertBefore(draggedItem, this.nextSibling);
            }
            draggedItem.style.visibility = "visible"; 
            draggedItem = null;
        }

        function dragLeave() {
            if (draggedItem) {
            draggedItem.style.visibility = "visible";
            }
        }

        

    </script>
</body>
</html>
