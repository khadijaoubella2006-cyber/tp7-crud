<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP7 - Gestion CRUD</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: #f8f9fa; }
        .hero { background: linear-gradient(135deg, #0d6efd, #0a58ca); color: white; border-radius: 20px; padding: 50px 30px; }
        .card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.15); }
        .icon-box { width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 15px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-mortarboard-fill"></i> TP7 CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="formations/index.php">Formations</a></li>
                <li class="nav-item"><a class="nav-link" href="module/index.php">Modules</a></li>
                <li class="nav-item"><a class="nav-link" href="etudiane/index.php">Étudiants</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">

    
    <div class="hero text-center mb-5">
        <h1 class="display-5 fw-bold">Bienvenue dans la Gestion TP7</h1>
        <p class="lead opacity-75">Gérez facilement vos formations, modules et étudiants</p>
        <a href="formations/index.php" class="btn btn-light btn-lg fw-bold px-4 mt-2">Commencer </a>
    </div>

    
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="icon-box bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <h4 class="fw-bold">Formations</h4>
                <p class="text-muted">Créer, modifier et supprimer vos formations. Gérer les titres et les prix.</p>
                <div class="d-grid gap-2">
                    <a href="formations/index.php" class="btn btn-primary"><i class="bi bi-eye"></i> Voir les formations</a>
                    <a href="formations/create.php" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Ajouter une formation</a>
                </div>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="icon-box bg-warning bg-opacity-25 text-warning">
                    <i class="bi bi-layers-fill"></i>
                </div>
                <h4 class="fw-bold">Modules</h4>
                <p class="text-muted">Chaque module est lié à une formation. Affichez le nom de la formation, pas l'ID.</p>
                <div class="d-grid gap-2">
                    <a href="module/index.php" class="btn btn-warning text-white"><i class="bi bi-eye"></i> Voir les modules</a>
                    <a href="module/create.php" class="btn btn-outline-warning"><i class="bi bi-plus-circle"></i> Ajouter un module</a>
                </div>
            </div>
        </div>

      
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="icon-box bg-success bg-opacity-10 text-success">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h4 class="fw-bold">Étudiants</h4>
                <p class="text-muted">Gérer les étudiants inscrits et voir dans quelle formation ils sont.</p>
                <div class="d-grid gap-2">
                    <a href="etudiane/index.php" class="btn btn-success"><i class="bi bi-eye"></i> Voir les étudiants</a>
                    <a href="etudiane/create.php" class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Ajouter un étudiant</a>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center mt-5 text-muted">
        <hr>
        <p> Formations - Modules - Étudiants</p>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>