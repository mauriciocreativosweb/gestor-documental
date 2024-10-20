<aside class="formHome" style="width: 100%; display: flex; flex-direction: column; align-items: center;">

    <!-- Logo y Descripción -->
    <img src="img/logo.png" alt="logo habilitapro" style="width: 60%; margin-bottom: 3%;">
    <p style="font-size: 0.8vw; margin-bottom: 5%;">Documentación y habilitación en salud sin complicaciones</p>

    <!-- Formulario de Registro -->
    <form action="/register" method="POST" id="submitRegister" style="width: 100%; margin-top: 3%;">
        @csrf

        <!-- Campo de Nombre -->
        <div style="margin-bottom: 16px; position: relative;">
            <input type="text" name="name" id="name" placeholder="Nombre" style="width: 100%; padding: 12px 40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 16px; outline: none; background-color: #FAFBFE; color: #333;">
            @error('name')
                <!--<div> Por favor escriba el nombre</div>-->
            @enderror
            <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                <img src="https://img.icons8.com/material-outlined/24/cccccc/user.png" alt="User Icon" />
            </span>
        </div>

        <!-- Campo de Email -->
        <div style="margin-bottom: 16px; position: relative;">
            <input type="email" name="email" id="email" placeholder="Email" style="width: 100%; padding: 12px 40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 16px; outline: none; background-color: #FAFBFE; color: #333;">
            @error('email')
                <!--<div> Por favor escriba el email</div>-->
            @enderror
            <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                <img src="https://img.icons8.com/material-outlined/24/cccccc/email-open.png" alt="Email Icon" />
            </span>
        </div>

        <!-- Campo de Contraseña -->
        <div style="margin-bottom: 16px; position: relative;">
            <input type="password" name="password" id="password" placeholder="Contraseña" style="width: 100%; padding: 12px 40px; border: 3px solid #F6F8FB; border-radius: 8px; font-size: 16px; outline: none; background-color: #FAFBFE; color: #333;">
            @error('password')
                <!--<div> Por favor escriba la contraseña</div>-->
            @enderror
            <span style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #ccc;">
                <img src="https://img.icons8.com/material-outlined/24/cccccc/lock-2.png" alt="Password Icon" />
            </span>
        </div>

        <!-- Políticas y Tratamiento de Datos -->
        <div style="display: flex; align-items: center; margin-bottom: 16px;">
            <input type="checkbox" id="rememberMe" name="remember" style="width: 16px; height: 16px;">
            <label for="rememberMe" style="margin-left: 8px; font-size: 14px; color: #666;">Aceptar políticas</label>
            <a href="#tratamientodatos" style="margin-left: auto; font-size: 14px; color: #47A1A8; text-decoration: none;">Tratamiento de datos</a>
        </div>

        <!-- ReCaptcha v3 -->
        {!! RecaptchaV3::field('register') !!}

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; background-color: #47A1A8; border: none; font-size: 1vw; font-weight: 600; color: #fff; aspect-ratio: 9/1; border-radius: 14px;">
            Registrar
        </button>
    </form>

    <!-- Mensaje de Sesión si existe -->
    @if(session("answer"))
        {{ session("answer") }}
    @endif 

    <!-- Mostrar todos los errores de validación si existen -->
    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</aside>
