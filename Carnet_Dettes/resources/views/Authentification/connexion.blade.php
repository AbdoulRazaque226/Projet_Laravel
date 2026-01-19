<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">    
    <title>Connexion</title>
</head>
<body>
   <h2>Bienvenue !</h2>
<p class="description">Connectez-vous pour accéder à votre espace et gérer vos dettes en toute simplicité.</p>


    <form method="post" action="{{ route('connecter') }}">
        @csrf
        @method('POST')
            <div class="box">
             
                <h1>Connexion</h1>
                <br>
                @if(Session::get('error_msg'))
                    <b style="font-size:14px; color:red">{{ Session::get('error_msg') }}</b>

                @endif

                <input type="email" name="email" class="email" ><br >
                <input type="password" name="password" class="email" ><br >
                <div class="btn-container">
                <button type="submit"> Se connecter</button>
                <a href="{{ route('inscription') }}">Créer un compte</a>
            </div>
        </div>

    </form>

   

</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const email = document.querySelector("input[name='email']");
    const password = document.querySelector("input[name='password']");

    form.addEventListener("submit", function (e) {
        let errors = [];

        if (!email.value.includes("@")) {
            errors.push("Veuillez entrer un email valide.");
        }

        if (password.value.length < 6) {
            errors.push("Le mot de passe doit contenir au moins 6 caractères.");
        }

        if (errors.length > 0) {
            e.preventDefault(); 
            alert(errors.join("\n"));
        }
    });
});
</script>

</html>
