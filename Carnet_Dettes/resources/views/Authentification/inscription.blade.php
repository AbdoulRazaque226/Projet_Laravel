<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
    <title>Inscription</title>
</head>
<body>

    <h2 class="title">Créer un compte</h2>
<p class="description">Inscrivez-vous gratuitement et commencez à suivre vos dettes et paiements facilement.</p>

    <div class="register-container">
        <h2>Créer un compte</h2>

        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}">
            </div>

            <div>
                <label for="email">Adresse Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}">
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">S’inscrire</button>
            <a href="{{ route('connexion') }}">Déjà un compte ? Se connecter</a>

        </form>
    </div> 
</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("password_confirmation");

    form.addEventListener("submit", function (e) {
        let errors = [];

        // Vérif mot de passe identiques
        if (password.value !== confirmPassword.value) {
            errors.push("Les mots de passe ne correspondent pas.");
        }

        // Vérif longueur du mot de passe
        if (password.value.length < 6) {
            errors.push("Le mot de passe doit contenir au moins 6 caractères.");
        }

        if (errors.length > 0) {
            e.preventDefault(); // Empêche l'envoi du formulaire
            alert(errors.join("\n"));
        }
    });
});
</script>

</html>
