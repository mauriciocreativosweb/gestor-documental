<?php
$colaborador = [
    ['id' => 1, 'nombre' => 'Nombre de la empresac numero uno', 'estadoc' => 0, 'empresasasignadas'=> 60, 'tipologia' => 'Spa'],
    ['id' => 2, 'nombre' => 'Nombre de la empresac numero dos', 'estadoc' => 1, 'empresasasignadas'=> 40, 'tipologia' => 'Clinica estetica'],
    ['id' => 3, 'nombre' => 'Nombre de la empresac numero tres', 'estadoc' => 1, 'empresasasignadas'=> 80, 'tipologia' => 'Clinica dental']
];


$datosdelcolaborador = [
    'id'                      => 1,
    'nombre_colaborador'      => 'Colaborador nuemro uno',
    'cedula'                  => '123456789',
    'cargo'                  => 'Asesor',
    'numero_empresas'         => 150,
    'direccion'               => 'Calle Falsa 123, Ciudad',
    'telefono'                => '3102640456',
    'whatsapp'                => '573102640456',
    'estadoc'                  => 1,
    'correo_contacto'         => 'contacto@ejemplo.com',
    'fecha_creacion'          => '2022-01-15',
    'empresas'                => [
        [
            'id' => 101,
            'nombre' => 'Empresa Uno S.A.',
            'usuario' => 'usuario1'
        ],
        [
            'id' => 102,
            'nombre' => 'Empresa Dos Ltda.',
            'usuario' => 'usuario2'
        ],
        [
            'id' => 103,
            'nombre' => 'Empresa Tres S.A.S.',
            'usuario' => 'usuario3'
        ]
    ]
];



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>colaboradors</title>
    {!! RecaptchaV3::initJs() !!}
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])
    <style>
        #slideDivc { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #slideDivc.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
        @keyframes growWidth { from { width: 0; } to { width: 60%; } } #porcentajetotal div { animation: growWidth 3s ease forwards; }
        .switchc input{opacity:0;width:0}.slideres{display:flex;align-items:center;position:absolute;cursor:pointer;top:10%;left:10%;right:0;bottom:0;background-color:#FD7377;transition:0.4s;border-radius:100vw}.slideres span{position:absolute;content:'';height:75%;aspect-ratio:1/1;border-radius:50%;left:8%;background-color:white;transition:0.4s}.slideres.on{background-color:#47A1A8}.slideres.off{background-color:#FD7377}.slideres.on span{transform:translateX(100%)}.slideres.off span{transform:translateX(0)}
        #slideDivcd { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #slideDivcd.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
        #listaempresasdeasesor { width: 500px; height: 100vh; background-color: #ffffff; position: fixed; top: 0; right: -600px; border-radius: 14px 0 0 14px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: right 0.5s ease; } 
        #listaempresasdeasesor.active { right: 0; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } } 
    </style>
</head>
<body style="overflow:hidden;">
    
    <div style="width:100%; height:100%; box-sizing: border-box; padding-left:3%;">
        <h1 style="color:#47A1A8;">Lista de asesores</h1>
        <p style="font-size:1vw;">En esta sección puedes gestionar cada uno de los colaboradors de la plataforma, sus datos, estadocs y permisos.</p>
        
        <div style="width:96%; aspect-ratio:35/1; display:flex; flex-direction:row; justify-content: space-between;">
            <div style="width:50%; height:95%; position: relative;">
                <input id="buscarc" type="text" placeholder="Buscar" style="padding-left:40px; font-size:.9vw; width:calc(99% - 40px); height:100%; border:2px solid #47A1A8; border-radius:12px;" oninput="filtrarempresacs()">
                <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-30%); color: #ccc;">
                    <img src="https://img.icons8.com/material-outlined/24/cccccc/search.png" alt="Search Icon">
                </span>
            </div>
            <select id="filtrarporestadocc" style="padding-left:1%; font-size:.9vw; width:22%; height:115%; background-color:#ffffff; border: 2px solid #47A1A8; border-radius:12px;" onchange="filtrarempresacs()">
                <option value="Todos">Todos</option>
                <option value="Activos">Activos</option>
                <option value="Inactivos">Inactivos</option>
            </select>

            <div onclick="descargarCSV()" style="cursor:pointer; width:13%; height:100%; background-color:#ffffff; border-radius:10px; display:flex; align-items:center; justify-content:center; border: 2px solid #47A1A8;">
                <p style="color:#47A1A8; font-size:.9vw;">Exportar</p>
            </div>
            <div onclick="mostrarmodalsumarcolaborador()" style="cursor:pointer; width:13%; height:100%; background-color:#47A1A8; border-radius:10px; display:flex; align-items:center; justify-content:center; border: 2px solid #47A1A8;">
                <p style="color:#ffffff; font-size:.9vw;">+ Nuevo colaborador</p>
            </div>
        </div>

        <div id="listac" style="width:96%; height:calc(70% + 10px); margin-top:20px; overflow-y: auto;">
        <?php foreach ($colaborador as $colaboradors): ?>
            <div id="empresac<?php echo $colaboradors['id']; ?>" class="empresac" data-estadoc="<?php echo $colaboradors['estadoc']; ?>" style="width:100%; aspect-ratio:25/1; margin-bottom:.6%; background-color:#F2F3F6; border-radius:.5vw; display:flex; flex-direction:row; align-items:center;">
                <p class="nombre-empresac" style="margin-left:2%; width:65%; font-size:.9vw; cursor:pointer;"><?php echo $colaboradors['nombre']; ?></p>
                <p onclick="verlistaempresasdeasesor()" style="width:20%; cursor:pointer; font-size:.9vw; margin-left:1%; text-align:center; color:#47A1A8; font-weight:600;"><?php echo $colaboradors['empresasasignadas']; ?> empresas</p>
                <label class="switchc" style="position: relative; display: inline-block; height: 60%; aspect-ratio:1.8/1;">
                    <input type="checkbox" id="switchc<?php echo $colaboradors['id']; ?>" onchange="toggleswitchcclientes(<?php echo $colaboradors['id']; ?>)" style="opacity: 0; width: 0;" <?php echo ($colaboradors['estadoc'] == 1) ? 'checked' : ''; ?>>
                    <span class="slideres <?php echo ($colaboradors['estadoc'] == 1) ? 'on' : 'off'; ?>" style="display:flex; align-items:center; position: absolute; cursor: pointer; top: 10%; left: 10%; right: 0; bottom: 0; transition: 0.4s; border-radius:100vw;">
                        <span style="position: absolute; content: ''; height: 75%; aspect-ratio:1/1; border-radius: 50%; left: 8%; background-color: white; transition: 0.4s;"></span>
                    </span>
                </label>

                <div style="width:10%; height:100%; display:flex; flex-direction:row; justify-content: flex-end; align-items:center;">
                    <img onclick="enviaremailcolaborador(<?php echo $colaboradors['id']; ?>)" style=" height:50%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/mail.png" alt="Delete Icon">
                    <img onclick="eliminarcolaboradorc(<?php echo $colaboradors['id']; ?>)" style=" height:50%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/delete.png" alt="Delete Icon">
                    <img onclick="editarcolaborador(<?php echo $colaboradors['id']; ?>)" style="height:50%; margin-right:8%; cursor:pointer;" src="https://img.icons8.com/material-outlined/24/47A1A8/edit.png" alt="Edit Icon">
                </div>
            </div>
        <?php endforeach; ?>
 
        </div>
    </div>

    <div id="modalnuevocolaboradorc" style="display:none; position:relative; width:150vw; height:150vh; background-color:rgba(50, 50, 50, 0.8); position:fixed; padding:0; margin:0; z-index: 99999; margin-left:-18.4%; align-items:center; justify-content:center;">
        <div style="position:relative; Width:50vw;height:50vh;;background-color:#ffffff; margin:0;padding:0;border-radius:12px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <img src="img/logo.svg" alt="logo" style="width:30%;">
            <p style="width:70%;text-align:center; font-size:.9vw;">No es posible agregar a un nuevo colaborador de forma directa, ya que es necesario que realice su registro. Sin embargo, puedes utilizar este formulario para enviar una invitación por correo electrónico, permitiendo que la persona se una a la comunidad.</p>
            <input id="" type="text" name="name"placeholder="Nombre" style=" text-align:center;width:50%;height:30px;border-radius:12px;border:2px solid #47A1A8;">
            <input id="" type="email" placeholder="Email" style=" text-align:center;width:50%;height:30px;margin-top:10px;border-radius:12px;border:2px solid #47A1A8;">
            <div onclick="enviarinvitacion()" style="background-color:#47A1A8; margin-top:10px; width:200px; height:35px; border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer;"><p style="color:#ffffff; width:100%;height:50%;text-align:center;padding:0;">Enviar invitación</p></div>
            <p onclick="ocultarmodalsumarcolaborador()" style="color:#47A1A8; cursor:pointer;">Cerrar</p>
        </div>      
    </div>
    <div id="modaleliminarcolaboradorc" style="display:none; position:relative; width:150vw; height:150vh; background-color:rgba(50, 50, 50, 0.8); position:fixed; padding:0; margin:0; z-index: 99999; margin-left:-18.4%; align-items:center; justify-content:center;">
        <div style="position:relative; Width:50vw;height:50vh;;background-color:#ffffff; margin:0;padding:0;border-radius:12px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <img src="img/logo.svg" alt="logo" style="width:30%;">
            <p style="width:50%;text-align:center; font-size:.9vw;">Para eliminar de manera <b>permanente</b> este colaborador por favor escriba <b>la palabra "eliminar"</b></p>
            <input id="palabraeliminarc" type="nombre" placeholder="Escriba la palabra eliminar" style=" text-align:center;width:50%;height:30px;border-radius:12px;border:2px solid #47A1A8;">
            <div onclick="confirmareliminarcolaboradorc()" style="background-color:#47A1A8; margin-top:10px; width:200px; height:35px; border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer;"><p style="color:#ffffff; width:100%;height:50%;text-align:center;padding:0;">Eliminar</p></div>
            <p onclick="cerrareliminarcolaboradorc()" style="color:#47A1A8; cursor:pointer;">Cerrar</p>
        </div> 
    </div>

    <!--slide-->
    <div id="slideDivc" style="padding:2%; box-sizing: border-box;">

            <div style="height:100%; overflow-y: auto; overflow-x: hidden; padding:3%; padding-top:0; padding-bottom:0;">
                <p style="margin:0; padding:0; color:#47A1A8; font-size:1.3vw; font-weight:700;">Informacion del colaborador</p>
                <p style="font-size:.7vw;  padding:0;">A continuación se muestra la información del colaborador seleccionado. Por favor, no realices modificaciones a menos que sea estrictamente necesario.</p>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                <div style="margin-bottom: 16px; position: relative; width:49%;">
                    <input type="text" name="Cargo" value="<?php echo $datosdelcolaborador['cargo']; ?>" placeholder="Cargo" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/building.png" alt="Company Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input readonly type="text" value="<?php echo $datosdelcolaborador['fecha_creacion'];?>" name="Suscripción" placeholder="Suscripción" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/calendar.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" name="empresac" value="<?php echo $datosdelcolaborador['nombre_colaborador']; ?>" placeholder="Nombre de la empresac o razón social" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/building.png" alt="Company Icon">
                    </span>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" name="identificacion" value="<?php echo $datosdelcolaborador['cedula'];?>" placeholder="cedula" style="width: 100%; padding: 6px; padding-left:40px; width:calc(96% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/identification-documents.png" alt="Identification Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" name="empleados" value="<?php echo $datosdelcolaborador['numero_empresas'];?>" placeholder="No. Empleados" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/user.png" alt="User Icon">
                        </span>
                    </div>
                </div>


                <div style="margin-bottom: 16px; position: relative;">
                    <input type="text" name="location" value="<?php echo $datosdelcolaborador['direccion'];?>" placeholder="Dirección de la sede principal" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                    <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                        <img src="https://img.icons8.com/material-outlined/24/cccccc/marker.png" alt="Location Icon">
                    </span>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" value="<?php echo $datosdelcolaborador['telefono'];?>" name="Teléfono" placeholder="Teléfono" style="width: 100%; padding: 6px; padding-left:40px; width:calc(96% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/phone.png" alt="Identification Icon">
                        </span>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:49%;">
                        <input type="number" value="<?php echo $datosdelcolaborador['whatsapp'];?>" name="WhatsApp" placeholder="WhatsApp" style="width: 100%; padding: 6px; padding-left:40px; width:calc(98% - 40px); border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                        <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                            <img src="https://img.icons8.com/material-outlined/24/cccccc/whatsapp.png" alt="User Icon">
                        </span>
                    </div>
                </div>

                <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
                    <div style="margin-bottom: 16px; position: relative; width:50%; "> 
                        <button onclick="guradrcolaboradorsmodificado()" style="cursor:pointer; background-color:#ffffff; color:#47A1A8; border-radius:10px; border:2px solid #47A1A8; width:100%;height:35px;font-weight:600;">Cerrar</button>
                    </div>
                    <div style="margin-bottom: 16px; position: relative; width:50%; margin-left:2%;">
                        <button onclick="guradrcolaboradorsmodificado()" style="cursor:pointer; background-color:#47A1A8; color:#ffffff; border-radius:10px; border:none; width:100%;height:35px;font-weight:600;">Guardar</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="slideDivcd" style="padding:2%; box-sizing: border-box;">
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
                    <button onclick="enviaremailcolaborador()" style="cursor:pointer; background-color:#ffffff; color:#47A1A8; border-radius:10px; border:2px solid #47A1A8; width:100%;height:35px;font-weight:600;">Cerrar</button>
                </div>
                <div style="margin-bottom: 16px; position: relative; width:50%; margin-left:2%;">
                    <button onclick="enviaremailcolaborador()" style="cursor:pointer; background-color:#47A1A8; color:#ffffff; border-radius:10px; border:none; width:100%;height:35px;font-weight:600;">Enviar</button>
                </div>
            </div>
        </div>

        <div id="listaempresasdeasesor" style="padding:2%; box-sizing: border-box;">
            <p style="margin:0; padding:0; color:#47A1A8; font-size:1.3vw; font-weight:700;">Informacion del colaborador</p>
            <p style="font-size:.7vw;  padding:0;">Este es un email transaccional, por tanto, debe ser de caracter informativo. No se espera que el usuario responda y no existe un historial.</p>
            <div style="margin-bottom: 16px; position: relative;">
                <input id="buscartodaslasempresas" oninput="filterCompanies()" type="text" placeholder="Buscar" style="width: calc(99% - 40px); padding: 6px; padding-left:40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 14px; background-color: #FAFBFE; color: #333;">
                <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                    <img src="https://img.icons8.com/material-outlined/24/cccccc/search.png" alt="Company Icon">
                </span>
            </div>
            <div style="margin-bottom: 10px; position: relative; height:80%; overflow-y: auto;">
                <?php foreach ($colaborador as $colaboradors): ?>
                    <div id="empresadeasesorlista<?php echo $colaboradors['id']; ?>" class="empresadeasesorlista" data-estadoc="<?php echo $colaboradors['estadoc']; ?>" style="width:100%; aspect-ratio:20/1; margin-bottom:.6%; background-color:#F2F3F6; border-radius:.5vw; display:flex; flex-direction:row; align-items:center;">
                        <div style="height:100%; aspect-ratio:1/1; background-color:<?php echo $colaboradors['estadoc'] == 1 ? '#47A1A8' : '#FD7377'; ?>; margin-left:3%; border-radius:.3vw;"></div>
                        <p class="nombreempresadelasesor" style="margin-left:2%; width:80%; font-size:.9vw; cursor:pointer;"><?php echo $colaboradors['nombre']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;">
            <button onclick="verlistaempresasdeasesor()" style="cursor:pointer; background-color:#47A1A8; color:#ffffff; border-radius:10px; border:none; width:100%;height:35px;font-weight:600;">Cerrar</button>

            </div>
        </div>


    <script>


        var colaboradors = <?php echo json_encode($colaborador); ?>;
        var colaboradoraeliminar = "";

        function filtrarempresacs() {
            const input = document.getElementById('buscarc').value.toLowerCase(); 
            const estadocFiltro = document.getElementById('filtrarporestadocc').value; 
            const empresacs = document.querySelectorAll('.empresac'); 
            empresacs.forEach(empresac => {
                const nombreempresac = empresac.querySelector('.nombre-empresac').textContent.toLowerCase(); 
                const estadocempresac = empresac.getAttribute('data-estadoc'); 
                const coincideestadoc = (estadocFiltro === "Todos" || (estadocFiltro === "Activos" && estadocempresac == 1) || (estadocFiltro === "Inactivos" && estadocempresac == 0));
                const coincideNombre = nombreempresac.includes(input);
                if (coincideNombre && coincideestadoc) {
                    empresac.style.display = 'flex';
                } else {
                    empresac.style.display = 'none';
                }
            });
        }

        function descargarCSV() {
            const encabezados = ['ID', 'Nombre', 'estadoc', 'Porcentaje Completado', 'Tipología'];
            let contenidoCSV = encabezados.join(',') + '\n'; 
            colaboradors.forEach(colaborador => {
                contenidoCSV += [
                    colaborador.id,
                    colaborador.nombre,
                    colaborador.estadoc === 1 ? 'Activo' : 'Inactivo',
                    colaborador.porcentajecompletado + '%',
                    colaborador.tipologia
                ].join(',') + '\n';
            });
            const blob = new Blob([ "\ufeff" + contenidoCSV ], { type: 'text/csv; charset=utf-8' });
            const enlace = document.createElement('a');
            enlace.href = URL.createObjectURL(blob);
            enlace.download = 'colaboradors.csv';
            enlace.click();
        }
        function mostrarmodalsumarcolaborador(){
            document.getElementById('modalnuevocolaboradorc').style.display = "flex";
        }
        function ocultarmodalsumarcolaborador(){
            document.getElementById('modalnuevocolaboradorc').style.display = "none";
        }
        function eliminarcolaboradorc(id){
            //alert('Eliminando colaborador numero  ' + id);
            colaboradoraeliminar = id;
            document.getElementById('modaleliminarcolaboradorc').style.display = "flex";
        }
        function confirmareliminarcolaboradorc(){
            //alert(colaboradoraeliminar);
            let palabraeliminarc = document.getElementById('palabraeliminarc').value;
            if(palabraeliminarc === 'eliminar'){
                document.getElementById('modaleliminarcolaboradorc').style.display = "none";
                const empresacDiv = document.getElementById('empresac' + colaboradoraeliminar);
                if (empresacDiv) {
                    empresacDiv.style.display = 'none';
                }
                alert('colaborador ELIMINADO');
                   
            }else{
                alert('La palabra '+palabraeliminarc+' no coincide');
            }
        }
        
        function enviarinvitacion(){
            let nombre = document.getElementById('nombreinvitacionc').value;
            let email = document.getElementById('emailinvitacionc').value;
            if(nombre && email){
                ocultarmodalsumarcolaborador()
                alert('Enviando invitacion a '+nombre+' al correo electronico '+email);
            }else{
                alert('Los campos no pueden estar vacios');
            }
        }

        function editarcolaborador(id) {
            const slideDivc = document.getElementById('slideDivc');
            if (slideDivc.classList.contains('active')) {
                slideDivc.classList.remove('active'); 
            } else {
                slideDivc.classList.add('active');  
                //alert(id);  
            }
        }

        function verlistaempresasdeasesor(id) {
            const slideDivc = document.getElementById('listaempresasdeasesor');
            if (slideDivc.classList.contains('active')) {
                slideDivc.classList.remove('active'); 
            } else {
                slideDivc.classList.add('active');  
                //alert(id);  
            }
        }

        function enviaremailcolaborador(id) {
            const slideDivc = document.getElementById('slideDivcd');
            if (slideDivc.classList.contains('active')) {
                slideDivc.classList.remove('active'); 
            } else {
                slideDivc.classList.add('active');   
            }
        }

        function guradrcolaboradorsmodificado(){
            const slideDivc = document.getElementById('slideDivc');
            slideDivc.classList.remove('active'); 
        }

        function solicitardatoscolaboradorseleccionado(){

        }
        function cambiarestadocIconoc() {
            var estadoc = document.getElementById("estadoc").value;
            var icono = document.getElementById("estadocIconoc");
            if (estadoc == "1") {
                icono.src = "https://img.icons8.com/material-outlined/24/47A1A8/filled-circle.png";
            } else {
                icono.src = "https://img.icons8.com/material-outlined/24/FD7377/filled-circle.png";
            }
        }
        window.onload = function() {
            cambiarestadocIconoc();
        }

         
        function cerrareliminarcolaboradorc(){
            document.getElementById('modaleliminarcolaboradorc').style.display = "none";
        }


        function toggleswitchc(colaboradorId) {
            var switchcElement = document.getElementById("switchc" + colaboradorId);
            var estadoc = switchcElement.checked ? 1 : 0;  
                        var slider = switchcElement.nextElementSibling;
            var color = estadoc === 1 ? '#47A1A8' : '#FD7377';  
            slider.style.backgroundColor = color;
            actualizarestadoc(colaboradorId, estadoc);
        }

        function actualizarestadoc(colaboradorId, estadoc) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "actualizar_estadoc.php", true); 
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("estadoc de colaborador " + colaboradorId + " actualizado a " + estadoc);
                }
            };
            xhr.send("colaborador_id=" + colaboradorId + "&estadoc=" + estadoc);  // Enviar datos al servidor
        }

        function toggleswitchcclientes(userId) {
            var checkbox = document.getElementById('switchc' + userId);
            var estadoc = checkbox.checked ? 1 : 0; 
            var slider = document.querySelector('#switchc' + userId + ' + .slideres');
            var circle = slider.querySelector('span');
            if (estadoc === 1) {
                slider.style.backgroundColor = '#47A1A8';
                circle.style.transform = 'translateX(100%)';
            } else {
                slider.style.backgroundColor = '#FD7377'; 
                circle.style.transform = 'translateX(0px)';
            }
        }

        function filterCompanies() {
            var input = document.querySelector('#buscartodaslasempresas'); 
            var filter = input.value.toLowerCase(); 
            var empresas = document.querySelectorAll('.empresadeasesorlista');
            empresas.forEach(function(empresac) {
                var nombreEmpresa = empresac.querySelector('.nombreempresadelasesor').textContent.toLowerCase();
                if (nombreEmpresa.indexOf(filter) > -1) {
                    empresac.style.display = 'flex'; 
                } else {
                    empresac.style.display = 'none';
                }
            });
        }



        

        
        

    </script>
</body>
</html>
