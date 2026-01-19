@extends('layouts.base')
@section('content')
  <!-- Contenu -->
  <div class="container" style="margin-top: 5px;">
    <h1>Tableau de bord</h1>
    <p class="subtitle">Vue d'ensemble de votre boutique et des crédits clients</p>

    <div class="cards">
      <div class="card">
        <div class="card-content">
          
          <p>Total clients</p><br>
          <h2>{{ $totalClients }}</h2>
          <p class="green" style="font-size: 20px; color: #2ecc71;">Clients actifs </p>
        </div>
        <i class="fa-solid fa-user icon"></i>
      </div>

      <div class="card">
        <div class="card-content">
          
          <p>Dettes totales</p><br>
          <h2>{{ $totalDettes }} F cfa</h2>
          <p class="red" style="font-size: 20px; color: #e74c3c;">Crédit en cours </p>
        </div>
        <i class="fa-solid fa-money-bill icon red"></i>
      </div>

      <div class="card">
        <div class="card-content">
          
          <p>Paiements reçus</p><br>
          <h2>{{ $totalPaiements }}F cfa</h2>
          <p class="green" style="font-size: 20px; color: #2ecc71;">Ce mois </p>
        </div>
        <i class="fa-solid  fa-coins icon green"></i>
      </div>

      
    </div>
  </div>

 
<div class="container">
    <h2>🔝 Top 10 des dettes les plus grandes</h2>
    <canvas id="topDettesChart" height="120"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('topDettesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($topDettes as $dette)
                    "{{ $dette->client->nom }} (Dette #{{ $dette->id }})",
                @endforeach
            ],
            datasets: [{
                label: 'Montant restant',
                data: [
                    @foreach($topDettes as $dette)
                        {{ $dette->montant_restant }},
                    @endforeach
                ],
                backgroundColor: 'rgba(255,99,132,0.6)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Top 10 dettes les plus élevées'
                }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection

