<?php
$usuario = [
    ['id' => 1, 'nombre' => 'Nombre de la empresa numero uno', 'estado' => 0, 'porcentajecompletado'=> 60, 'tipologia' => 'Spa'],
    ['id' => 2, 'nombre' => 'Nombre de la empresa numero dos', 'estado' => 1, 'porcentajecompletado'=> 40, 'tipologia' => 'Clinica estetica'],
    ['id' => 3, 'nombre' => 'Nombre de la empresa numero tres', 'estado' => 1, 'porcentajecompletado'=> 80, 'tipologia' => 'Clinica dental']
];

$asesores = [
    ['id' => 1, 'nombre' => 'Asesor #1'],
    ['id' => 2, 'nombre' => 'Asesor #2'],
    ['id' => 3, 'nombre' => 'Asesor #3']
];

$tipologias = [
    ['id' => 1, 'tipologia' => 'Spa'],
    ['id' => 2, 'tipologia' => 'Clinica estetica'],
    ['id' => 3, 'tipologia' => 'Centro de estetica']
];

$datosdelusuario = [
    'id'                      => 1,
    'nombre_empresa'          => 'Nombre de la empresa numero uno',
    'nit'                     => '123456789',
    'numero_empleados'        => 150,
    'tipologia'               => 'Spa',
    'direccion'               => 'Calle Falsa 123, Ciudad',
    'telefono'                => '3102640456',
    'whatsapp'                => '573102640456',
    'representante_legal'     => 'Juan Pérez',
    'sitio_web'               => 'https://www.ejemplo.com',
    'descripcion_empresa'     => 'Descripción breve de la empresa y sus actividades.',
    'estado'                  => 1,
    'ultima_fecha_pago'       => '2024-10-01',
    'fecha_vencimiento_pago'  => '2024-11-01',
    'correo_contacto'         => 'contacto@ejemplo.com',
    'fecha_creacion'          => '2022-01-15',
    'tipo_persona'            => 'Jurídica',
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
    <title>Usuarios</title>
    {!! RecaptchaV3::initJs() !!}
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])
    <style>
        #slideDiv { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #slideDiv.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
        @keyframes growWidth { from { width: 0; } to { width: 60%; } } #porcentajetotal div { animation: growWidth 3s ease forwards; }
        .switch input{opacity:0;width:0}.slideres{display:flex;align-items:center;position:absolute;cursor:pointer;top:10%;left:10%;right:0;bottom:0;background-color:#FD7377;transition:0.4s;border-radius:100vw}.slideres span{position:absolute;content:'';height:75%;aspect-ratio:1/1;border-radius:50%;left:8%;background-color:white;transition:0.4s}.slideres.on{background-color:#47A1A8}.slideres.off{background-color:#FD7377}.slideres.on span{transform:translateX(100%)}.slideres.off span{transform:translateX(0)}
        #slideDivcdclientes { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #slideDivcdclientes.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
    </style>
</head>
<body style="overflow:hidden;">
    
    <div style="width:100%; height:100%; box-sizing: border-box; padding-left:3%;">
        <h1 style="color:#47A1A8;">Lista de Usuarios</h1>
        <p style="font-size:1vw;">En esta sección puedes gestionar cada uno de los usuarios de la plataforma, sus datos, estados y permisos.</p>
        
        <div style="width:96%; aspect-ratio:35/1; display:flex; flex-direction:row; justify-content: space-between;">
            <div style="width:50%; height:95%; position: relative;">
                <input id="buscar" type="text" placeholder="Buscar" style="padding-left:40px; font-size:.9vw; width:calc(99% - 40px); height:100%; border:2px solid #47A1A8; border-radius:12px;" oninput="filtrarEmpresas()">
                <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-30%); color: #ccc;">
                    <img src="https://img.icons8.com/material-outlined/24/cccccc/search.png" alt="Search Icon">
                </span>
            </div>
            <select id="filtrarporestado" style="padding-left:1%; font-size:.9vw; width:22%; height:115%; background-color:#ffffff; border: 2px solid #47A1A8; border-radius:12px;" onchange="filtrarEmpresas()">
                <option value="Todos">Todos</option>
                <option value="Activos">Activos</option>
                <option value="Inactivos">Inactivos</option>
            </select>

            <div onclick="descargarCSV()" style="cursor:pointer; width:13%; height:100%; background-color:#ffffff; border-radius:10px; display:flex; align-items:center; justify-content:center; border: 2px solid #47A1A8;">
                <p style="color:#47A1A8; font-size:.9vw;">Exportar</p>
            </div>
            <div onclick="mostrarmodalsumarusuario()" style="cursor:pointer; width:13%; height:100%; background-color:#47A1A8; border-radius:10px; display:flex; align-items:center; justify-content:center; border: 2px solid #47A1A8;">
                <p style="color:#ffffff; font-size:.9vw;">+ Nuevo usuario</p>
            </div>
        </div>

        <div id="lista" style="width:96%; height:calc(70% + 10px); margin-top:20px; overflow-y: auto;">
        <?php foreach ($usuario as $usuarios): ?>
            <div id="empresa<?php echo $usuarios['id']; ?>" class="empresa" data-estado="<?php echo $usuarios['estado']; ?>" style="width:100%; aspect-ratio:25/1; margin-bottom:.6%; background-color:#F2F3F6; border-radius:.5vw; display:flex; flex-direction:row; align-items:center;">
                
                <p class="nombre-empresa" style="margin-left:2%; width:40%; font-size:.9vw; cursor:pointer;"><?php echo $usuarios['nombre']; ?></p>
                <p style="font-size:.9vw; margin-left:2%;"><?php echo $usuarios['porcentajecompletado']; ?>%</p>
                <div style="margin-left:1%; width:20%; height:20%; background-color:#ffffff; border-radius:12px;">
                    <div style="width:<?php echo $usuarios['porcentajecompletado']; ?>%; height:100%; background-color:#47A1A8; border-radius:12px;"></div>
                </div>
                <p style="width:20%; font-size:.9vw; margin-left:1%; text-align:center; color:#47A1A8; font-weight:600;"><?php echo $usuarios['tipologia']; ?></p>
                
                <label class="switch" style="position: relative; display: inline-block; height: 60%; aspect-ratio:1.8/1;">
                    <input type="checkbox" id="switch<?php echo $usuarios['id']; ?>" onchange="toggleSwitchclientes(<?php echo $usuarios['id']; ?>)" style="opacity: 0; width: 0;" <?php echo ($usuarios['estado'] == 1) ? 'checked' : ''; ?>>
                    <span class="slideres <?php echo ($usuarios['estado'] == 1) ? 'on' : 'off'; ?>" style="display:flex; align-items:center; position: absolute; cursor: pointer; top: 10%; left: 10%; right: 0; bottom: 0; transition: 0.4s; border-radius:100vw;">
                        <span style="position: absolute; content: ''; height: 75%; aspect-ratio:1/1; border-radius: 50%; left: 8%; background-color: white; transition: 0.4s;"></span>
                    </span>
                </label>

                <div style="width:10%; height:100%; display:flex; flex-direction:row; justify-content: flex-end; align-items:center;">
                    <img onclick="enviaremailclientes(<?php echo $usuarios['id']; ?>)" style="height:50%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/mail.png" alt="Edit Icon">
                    <img onclick="eliminarusuario(<?php echo $usuarios['id']; ?>)" style=" height:50%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/delete.png" alt="Delete Icon">
                    <img onclick="editarusuario(<?php echo $usuarios['id']; ?>)" style="height:50%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/edit.png" alt="Edit Icon">
                </div>
            </div>
        <?php endforeach; ?>
 
        </div>
    </div>

    <div id="modalnuevousuario" style="display:none; position:relative; width:150vw; height:150vh; background-color:rgba(50, 50, 50, 0.8); position:fixed; padding:0; margin:0; z-index: 99999; margin-left:-18.4%; align-items:center; justify-content:center;">
        <div style="position:relative; Width:50vw;height:50vh;;background-color:#ffffff; margin:0;padding:0;border-radius:12px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <img src="img/logo.svg" alt="logo" style="width:30%;">
            <p style="width:70%;text-align:center; font-size:.9vw;">No es posible agregar a un nuevo usuario de forma directa, ya que es necesario que realice su registro. Sin embargo, puedes utilizar este formulario para enviar una invitación por correo electrónico, permitiendo que la persona se una a la comunidad.</p>
            <input id="nombreinvitacion" type="text" autocomplete="off" name="name"placeholder="Nombre" style=" text-align:center;width:50%;height:30px;border-radius:12px;border:2px solid #47A1A8;">
            <input id="emailinvitacion" type="email" autocomplete="off" placeholder="Email" style=" text-align:center;width:50%;height:30px;margin-top:10px;border-radius:12px;border:2px solid #47A1A8;">
            <div onclick="enviarinvitacionnuevocliente()" style="background-color:#47A1A8; margin-top:10px; width:200px; height:35px; border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer;"><p style="color:#ffffff; width:100%;height:50%;text-align:center;padding:0;">Enviar invitación</p></div>
            <p onclick="ocultarmodalsumarusuario()" style="color:#47A1A8; cursor:pointer;">Cerrar</p>
        </div>
    </div>
    <div id="modaleliminarusuario" style="display:none; position:relative; width:150vw; height:150vh; background-color:rgba(50, 50, 50, 0.8); position:fixed; padding:0; margin:0; z-index: 99999; margin-left:-18.4%; align-items:center; justify-content:center;">
        <div style="position:relative; Width:50vw;height:50vh;;background-color:#ffffff; margin:0;padding:0;border-radius:12px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <img src="img/logo.svg" alt="logo" style="width:30%;">
            <p style="width:50%;text-align:center; font-size:.9vw;">Para eliminar de manera <b>permanente</b> este usuario por favor escriba <b>la palabra "eliminar"</b></p>
            <input id="palabraeliminar" type="nombre" placeholder="Escriba la palabra eliminar" style=" text-align:center;width:50%;height:30px;border-radius:12px;border:2px solid #47A1A8;">
            <div onclick="confirmareliminarusuario()" style="background-color:#47A1A8; margin-top:10px; width:200px; height:35px; border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer;"><p style="color:#ffffff; width:100%;height:50%;text-align:center;padding:0;">Eliminar</p></div>
            <p onclick="cerrareliminarusuario()" style="color:#47A1A8; cursor:pointer;">Cerrar</p>
        </div> 
    </div>

    <!--slide-->
    <div id="slideDiv" style="padding:2%; box-sizing: border-box;">

            <div style="height:100%; overflow-y: auto; overflow-x: hidden; padding:3%; padding-top:0; padding-bottom:0;">
                <p style="margin:0; padding:0; color:#47A1A8; font-size:1.3vw; font-weight:700;">Informacion del usuario</p>
                <p style="font-size:.7vw;  padding:0;">A continuación se muestra la información del usuario seleccionado. Por favor, no realices modificaciones a menos que sea estrictamente necesario.</p>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                <div style="margin-bottom: 16px; position: relative; width:49%;">
                    <input type="text" name="ciudad" value="<?php echo $datosdelusuario['ciudad']; ?>" placeholder="Ciudad" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/building.png" alt="Company Icon">
                    </span>
                </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input readonly type="text" value="<?php echo $datosdelusuario['fecha_creacion'];?>" name="Suscripción" placeholder="Suscripción" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/calendar.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" name="empresa" value="<?php echo $datosdelusuario['nombre_empresa']; ?>" placeholder="Nombre de la empresa o razón social" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/building.png" alt="Company Icon">
                    </span>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" name="identificacion" value="<?php echo $datosdelusuario['nit'];?>" placeholder="Nit" style="width: 100%; padding: 6px; padding-left:40px; width:calc(96% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/identification-documents.png" alt="Identification Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" name="empleados" value="<?php echo $datosdelusuario['numero_empleados'];?>" placeholder="No. Empleados" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/user.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <select name="empresa_tipo" style="padding: 6px; padding-left:40px; width:101.5%; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333; appearance: none;">
                        <option value="" disabled <?php echo !$datosdelusuario['tipologia'] ? 'selected' : ''; ?>>Tipo de empresa</option>
                        <?php foreach ($tipologias as $tipologia): ?>
                            <option value="<?php echo strtolower(str_replace(' ', '_', $tipologia['tipologia'])); ?>" <?php echo $datosdelusuario['tipologia'] == $tipologia['tipologia'] ? 'selected' : ''; ?>>
                                <?php echo $tipologia['tipologia']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/stethoscope.png" alt="Company Type Icon">
                    </span>
                </div>


                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" name="location" value="<?php echo $datosdelusuario['direccion'];?>" placeholder="Dirección de la sede principal" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/marker.png" alt="Location Icon">
                    </span>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" value="<?php echo $datosdelusuario['telefono'];?>" name="Teléfono" placeholder="Teléfono" style="width: 100%; padding: 6px; padding-left:40px; width:calc(96% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/phone.png" alt="Identification Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" value="<?php echo $datosdelusuario['whatsapp'];?>" name="WhatsApp" placeholder="WhatsApp" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/whatsapp.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" value="<?php echo $datosdelusuario['representante_legal'];?>" name="representante" placeholder="Representante legal" style="width: calc(100% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/businessman.png" alt="Representative Icon">
                    </span>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" value="<?php echo $datosdelusuario['sitio_web'];?>" name="web" placeholder="Sitio web" style="width: calc(100% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/internet.png" alt="Website Icon">
                    </span>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                <select name="empresa_tipo" style="padding: 6px; padding-left:40px; width:101.5%; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333; appearance: none;">
                    <option value="" disabled <?php echo empty($datosdelusuario['asesor']) ? 'selected' : ''; ?>>Asesor asignado</option>
                        <?php foreach ($asesores as $asesor): ?>
                            <option value="<?php echo strtolower(str_replace(' ', '_', $asesor['nombre'])); ?>" 
                                <?php echo (isset($datosdelusuario['asesor']) && $datosdelusuario['asesor'] == $asesor['nombre']) ? 'selected' : ''; ?>>
                                <?php echo $asesor['nombre']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/user.png" alt="Company Type Icon">
                    </span>
                </div>

                <div style="margin-bottom: 10px; position: relative;">
                    <textarea name="descripcion" placeholder="Descripcion de la empresa" rows="3" style="width: 98%; padding: 6px 6px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333; resize: none;"><?php echo $datosdelusuario['descripcion_empresa'];?></textarea>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:50%;"> 
                        <button onclick="guradrusuariosmodificado()" style="cursor:pointer; background-color:#ffffff; color:#47A1A8; border-radius:10px; border: 2px solid #47A1A8; width:100%;height:35px;font-weight:600;">Cerrar</button>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:50%; margin-left:2%;">
                        <button onclick="guradrusuariosmodificado()" style="cursor:pointer; background-color:#47A1A8; color:#ffffff; border-radius:10px; border:none; width:100%;height:35px;font-weight:600;">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="slideDivcdclientes" style="padding:2%; box-sizing: border-box;">
            <p style="margin:0; padding:0; color:#47A1A8; font-size:1.3vw; font-weight:700;">Informacion del colaborador</p>
            <p style="font-size:.7vw;  padding:0;">Este es un email transaccional, por tanto, debe ser de caracter informativo. No se espera que el usuario responda y no existe un historial.</p>
            <div style="margin-bottom: 16px; position: relative;">
                <input id="asuntoemailcolaborador" type="text" name="empresac" placeholder="Asunto" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
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
        var usuarios = <?php echo json_encode($usuario); ?>;
        var usuarioaeliminar = "";

        function filtrarEmpresas() {
            const input = document.getElementById('buscar').value.toLowerCase(); 
            const estadoFiltro = document.getElementById('filtrarporestado').value; 
            const empresas = document.querySelectorAll('.empresa'); 
            empresas.forEach(empresa => {
                const nombreEmpresa = empresa.querySelector('.nombre-empresa').textContent.toLowerCase(); 
                const estadoEmpresa = empresa.getAttribute('data-estado'); 
                const coincideEstado = (estadoFiltro === "Todos" || (estadoFiltro === "Activos" && estadoEmpresa == 1) || (estadoFiltro === "Inactivos" && estadoEmpresa == 0));
                const coincideNombre = nombreEmpresa.includes(input);
                if (coincideNombre && coincideEstado) {
                    empresa.style.display = 'flex';
                } else {
                    empresa.style.display = 'none';
                }
            });
        }

        function descargarCSV() {
            const encabezados = ['ID', 'Nombre', 'Estado', 'Porcentaje Completado', 'Tipología'];
            let contenidoCSV = encabezados.join(',') + '\n'; 
            usuarios.forEach(usuario => {
                contenidoCSV += [
                    usuario.id,
                    usuario.nombre,
                    usuario.estado === 1 ? 'Activo' : 'Inactivo',
                    usuario.porcentajecompletado + '%',
                    usuario.tipologia
                ].join(',') + '\n';
            });
            const blob = new Blob([ "\ufeff" + contenidoCSV ], { type: 'text/csv; charset=utf-8' });
            const enlace = document.createElement('a');
            enlace.href = URL.createObjectURL(blob);
            enlace.download = 'usuarios.csv';
            enlace.click();
        }
        function mostrarmodalsumarusuario(){
            document.getElementById('modalnuevousuario').style.display = "flex";
        }
        function ocultarmodalsumarusuario(){
            document.getElementById('modalnuevousuario').style.display = "none";
        }
        function eliminarusuario(id){
            //alert('Eliminando usuario numero  ' + id);
            usuarioaeliminar = id;
            document.getElementById('modaleliminarusuario').style.display = "flex";
        }
        function confirmareliminarusuario(){
            //alert(usuarioaeliminar);
            let palabraeliminar = document.getElementById('palabraeliminar').value;
            if(palabraeliminar === 'eliminar'){
                document.getElementById('modaleliminarusuario').style.display = "none";
                const empresaDiv = document.getElementById('empresa' + usuarioaeliminar);
                if (empresaDiv) {
                    empresaDiv.style.display = 'none';
                }
                //alert('USUARIO ELIMINADO');
                   
            }else{
                alert('La palabra '+palabraeliminar+' no coincide');
            }
        }
        
        function enviarinvitacionnuevocliente(){
            let nombre = document.getElementById('nombreinvitacion').value;
            let email = document.getElementById('emailinvitacion').value;
            if(nombre && email){
                ocultarmodalsumarusuario()
                //alert('Enviando invitacion a '+nombre+' al correo electronico '+email);
            }else{
                alert('Los campos no pueden estar vacios');
            }
        }

        function editarusuario(id) {
            const slideDiv = document.getElementById('slideDiv');
            if (slideDiv.classList.contains('active')) {
                slideDiv.classList.remove('active'); 
            } else {
                slideDiv.classList.add('active');  
            }
        }

        
        function enviaremailclientes(id) {
            const slideDiv = document.getElementById('slideDivcdclientes');
            if (slideDiv.classList.contains('active')) {
                slideDiv.classList.remove('active'); 
            } else {
                slideDiv.classList.add('active');   
            }
        }

        function guradrusuariosmodificado(){
            const slideDiv = document.getElementById('slideDiv');
            slideDiv.classList.remove('active'); 
        }

        function solicitardatosusuarioseleccionado(){

        }
        function cambiarEstadoIcono() {
            var estado = document.getElementById("estado").value;
            var icono = document.getElementById("estadoIcono");
            if (estado == "1") {
                icono.src = "https://img.icons8.com/material-outlined/24/47A1A8/filled-circle.png";
            } else {
                icono.src = "https://img.icons8.com/material-outlined/24/FD7377/filled-circle.png";
            }
        }
        window.onload = function() {
            cambiarEstadoIcono();
        }

         
        function cerrareliminarusuario(){
            document.getElementById('modaleliminarusuario').style.display = "none";
        }


        function toggleSwitch(usuarioId) {
            var switchElement = document.getElementById("switch" + usuarioId);
            var estado = switchElement.checked ? 1 : 0;  
                        var slider = switchElement.nextElementSibling;
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
            xhr.send("usuario_id=" + usuarioId + "&estado=" + estado);  // Enviar datos al servidor
        }

        function toggleSwitchclientes(userId) {
            var checkbox = document.getElementById('switch' + userId);
            var estado = checkbox.checked ? 1 : 0; 
            var slider = document.querySelector('#switch' + userId + ' + .slideres');
            var circle = slider.querySelector('span');
            if (estado === 1) {
                slider.style.backgroundColor = '#47A1A8';
                circle.style.transform = 'translateX(100%)';
            } else {
                slider.style.backgroundColor = '#FD7377'; 
                circle.style.transform = 'translateX(0px)';
            }
        }

        
        

    </script>
</body>
</html>
