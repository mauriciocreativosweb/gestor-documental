<?php 
    print_r(session()->all());
    echo "<br>";

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestor documental</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {!! RecaptchaV3::initJs() !!}
        @vite(['resources/css/app.css', 'resources/css/home.css','resources/js/app.js'])
        
    </head>
    <body>  
        <div class="containerHome">
            <x-register></x-register>
            <x-login></x-login>
            <aside class="imgBackgroundHome">
              

            </aside>
        </div>
        <script>
            function onSubmit(token) {
                document.getElementById("submitRegister").submit();
            }
        </script>
    </body>
</html>
