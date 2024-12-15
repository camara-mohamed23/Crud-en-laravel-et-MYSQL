<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Crud en laravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Accueil</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ajouter') }}">Ajouter</a>
        </li>
      </ul>
      <span class="navbar-text">
        Gestion des employés 
      </span>
    </div>
  </div>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">identifiation</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">telephone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($personnes as $personne)
    <tr>
      <td>{{ ++$i }}</td> <!-- Incrémentation de l'index -->
      <td>{{ $personne->nom }}</td>
      <td>{{ $personne->prenom }}</td>
      <td>{{ $personne->telephone }}</td>
      <td>
        <!-- Tu peux ajouter des actions ici, comme des boutons pour modifier ou supprimer -->
        <a href="{{ route('modifier', $personne->id) }}">Modifier</a> |
        <form action="{{ route('supprimer', $personne->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette personne ?')">Supprimer</button>
                </form>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="5">Aucune personne trouvée.</td>
    </tr>
  @endforelse
  </tbody>
</table>
</body>
</html>