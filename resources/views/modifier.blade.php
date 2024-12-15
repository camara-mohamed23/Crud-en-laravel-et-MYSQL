<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>ajouter</title>
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
          <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Accueil</a>
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
<br>
<!-- Afficher les erreurs de validation -->
<!-- Affichage des erreurs de validation -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>
<form action="{{ route('update', $personne->id) }}" method="POST">
@csrf
@method('PUT') <!-- Pour indiquer qu'on fait une mise à jour -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" id="exampleInputEmail1" 
    value="{{ old('nom', $personne->nom) }}" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">veuillez saisir votre nom.</div>
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">prénom</label>
    <input type="text" class="form-control" name="prenom"
     value="{{ old('prenom', $personne->prenom) }}"
    id="prenom">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">telephone</label>
    <input type="text" class="form-control" name="telephone"  value="{{ old('telephone', $personne->telephone) }}"id="exampleInputPassword1">
  </div>
 
  <button type="submit" class="btn btn-primary">modifierr</button>
</form>
</body>
</html>