<aside class="formHome" style="width:100%; display: flex; flex-direction:column; align-items: center;">

    <!-- Logo y Descripción -->
    <img src="img/logo.svg" alt="logo habilitapro" style="width:60%; margin-bottom: 3%;">
    <p style="font-size:0.8vw;">Documentación y habilitación en salud sin complicaciones</p>

    <!-- Botones de Inicio de Sesión con Google y Facebook -->
    <div style="width:100%; display: flex; justify-content: space-between;">
        <button style="width:48%; min-height:40px; display: flex; align-items: center; justify-content: center; border: 2px solid #F6F8FB; border-radius: 8px; background-color: #fff; color: #333; font-size: 16px; cursor: pointer; transition: all 0.3s;">
            <img src="https://img.icons8.com/color/24/000000/google-logo.png" alt="Google">
            Google
        </button>
        
        <button style="width:48%; min-height:40px; display: flex; align-items: center; justify-content: center; border: 2px solid #F6F8FB; border-radius: 8px; background-color: #fff; color: #333; font-size: 16px; cursor: pointer; transition: all 0.3s;">
            <img src="https://img.icons8.com/color/24/000000/facebook-new.png" alt="Facebook">
            Facebook
        </button>
    </div>

    <!-- Separador -->
    <div style="width: 100%; display: flex; align-items: center; margin: 16px 0;">
        <hr style="flex: 1; border: none; border-top: 2px solid #333;">
        <span style="padding: 0 10px;">O ingresa con tu email</span>
        <hr style="flex: 1; border: none; border-top: 2px solid #333;">
    </div>

    <!-- Formulario de Inicio de Sesión -->
    <form action="/login" method="POST" style="width:100%;">
        @csrf

        <!-- Campo de Email -->
        <div style="margin-bottom: 16px; position: relative;">
            <input type="email" name="email" placeholder="Email" style="width: 100%; padding: 12px 40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 16px; background-color: #FAFBFE; color: #333;">
            <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                <img src="https://img.icons8.com/material-outlined/24/cccccc/email-open.png" alt="Email Icon">
            </span>
            @if($errors->has('email'))
                <!--<div> Por favor escriba el email</div>-->
            @endif
        </div>

        <!-- Campo de Contraseña -->
        <div style="margin-bottom: 16px; position: relative;">
            <input type="password" name="password" placeholder="Contraseña" style="width: 100%; padding: 12px 40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 16px; background-color: #FAFBFE; color: #333;">
            <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                <img src="https://img.icons8.com/material-outlined/24/cccccc/lock-2.png" alt="Password Icon">
            </span>
            @if($errors->has('password'))
                <!--<div> Por favor escriba la contraseña</div>-->
            @endif
        </div>

        <!-- Recordarme y Olvidé mi Contraseña -->
        <div style="display: flex; align-items: center; margin-bottom: 16px;">
            <input type="checkbox" name="remember" style="width: 16px; height: 16px;">
            <label for="rememberMe" style="margin-left: 8px; font-size: 14px; color: #666;">Recordarme</label>
            <a href="#olvidelacontraselaURL" style="margin-left: auto; font-size: 14px; color: #47A1A8; text-decoration: none;">Olvidé mi contraseña</a>
        </div>

        <!-- Botón de Enviar -->
        <button type="submit" style="width:100%; background-color:#47A1A8; border:none; font-size:1vw; font-weight: 600; color:#fff; aspect-ratio:9/1; border-radius:14px;">
            Ingresar
        </button>
    </form>

    <!-- Mensaje de Respuesta -->
    @if(session("answer"))
        {{ session("answer") }}
    @endif

</aside>
