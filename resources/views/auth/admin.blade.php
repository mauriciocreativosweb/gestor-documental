<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])
</head>
<body style="padding: 0; margin: 0;">
    <div style="width: 100vw; height: 100vh; background-color: #F2F3F6; display: flex;">
        <div style="width: 20%; display: flex; align-items: center; justify-content: center;">
            <div style="width: 90%; height: 95%; background-color: #fff; border-radius: 14px;">
                <div style="width: 100%; aspect-ratio: 3/1; background: url(img/logo.png) center/90% no-repeat; margin-top: 15px;"></div>

                <router-link to="/clientes" style="width: 80%; margin: 5px auto; display: flex; align-items: center; cursor: pointer;">
                    <img src="img/icono1.png" alt="Clientes" style="width: 15%; aspect-ratio: 1;">
                    <p style="margin-left: 5%;">Clientes</p>
                </router-link>
                <router-link to="/permisos" style="width: 80%; margin: 5px auto; display: flex; align-items: center; cursor: pointer;">
                    <img src="img/icono2.png" alt="Permisos" style="width: 15%; aspect-ratio: 1;">
                    <p style="margin-left: 5%;">Permisos</p>
                </router-link>
                <router-link to="/colaboradores" style="width: 80%; margin: 5px auto; display: flex; align-items: center; cursor: pointer;">
                    <img src="img/icono3.png" alt="Colaboradores" style="width: 15%; aspect-ratio: 1;">
                    <p style="margin-left: 5%;">Colaboradores</p>
                </router-link>
                <router-link to="/normatividad" style="width: 80%; margin: 5px auto; display: flex; align-items: center; cursor: pointer;">
                    <img src="img/icono4.png" alt="Normatividad" style="width: 15%; aspect-ratio: 1;">
                    <p style="margin-left: 5%;">Normatividad</p>
                </router-link>
                <router-link to="/facturacion" style="width: 80%; margin: 5px auto; display: flex; align-items: center; cursor: pointer;">
                    <img src="img/icono5.png" alt="Facturación" style="width: 15%; aspect-ratio: 1;">
                    <p style="margin-left: 5%;">Facturación</p>
                </router-link>
                <router-link to="/alertas" style="width: 80%; margin: 5px auto; display: flex; align-items: center; cursor: pointer;">
                    <img src="img/icono6.png" alt="Alertas" style="width: 15%; aspect-ratio: 1;">
                    <p style="margin-left: 5%;">Alertas</p>
                </router-link>
            </div>
        </div>

        <div id="ContenedorAdmin" style="background-color:#2085ec; width: 80vw; height: 100vh; display: flex; align-items: center; justify-content: center; z-index: 90000;">
            
            <div id="app">
                <router-view style="width:1000px; height:1000px; background-color:red; margin:0px; padding:0px;"></router-view>
            </div>
            
        </div>
    </div>
</body>
</html>
