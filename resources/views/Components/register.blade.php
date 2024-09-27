<aside class="formHome">
    <form action="/register" method="POST" id="submitRegister">
        @csrf
        <div class="iconForm"> </div>

        <!-- Campo de Nombre -->
        <label> Name </label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div> Por favor escriba el nombre</div>
        @enderror

        <!-- Campo de Email -->
        <label> Email </label>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
            <div> Por favor escriba el email</div>
        @enderror

        <!-- Campo de Contraseña -->
        <label> Contraseña </label>
        <input type="password" name="password">
        @error('password')
            <div> Por favor escriba el password</div>
        @enderror

        <!-- Campo de ReCaptcha v3 -->
        {!! RecaptchaV3::field('register') !!}

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary btn-lg">
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
