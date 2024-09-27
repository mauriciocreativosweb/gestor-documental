<aside class="formHome">
    <form action="/login" method="POST">
        @csrf
        <div class="iconForm"> </div>
        <label> Email </label>
        <input type="email" name="email" >
        @if($errors->has('email'))
            <div> Porfavor escriba el email</div>
        @endif
        <label> Contraseña </label>
        <input type="password" name="password">
        @if($errors->has('password'))
            <div> Porfavor escriba la contraseña</div>
        @endif
        <button type="submit"> Ingresar </button>
    </form>
        @if(session("answer"))
            {{session("answer")}}
        @endif
</aside>