<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carnet de Dettes - Tableau de bord</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="left">Carnet de Dettes</div>
    <div class="menu">
      <a href="{{ route('home') }}">Tableau de bord</a>
      <a href="{{ route('Clients.client') }}">Clients</a>
      <a href="{{ route('Dettes.dette') }}">Dettes</a>
      <a href="{{ route('Paiements.paiement') }}">Paiement</a>
      
      <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user profile" style="width:30px; height:30px; border-radius:50%; margin-left:10px; vertical-align:middle;">
      <a href="{{ route('logout') }}">Déconnexion</a>
    </div>
  </div>

  


  @yield('content')
  
    
</body>
</html>