<?php
include_once("students.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDM-Classroom | Nouveau</title>
    <!-- Upgraded to Bootstrap 5.3.x -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-dark: #0f172a;
            --accent-orange: #f97316;
            --body-bg: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--body-bg);
            color: #334155;
        }

        /* Navbar Customizations */
        .navbar {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .navbar-brand h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }
        .nav-link {
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .nav-link:hover, .nav-item.active .nav-link {
            color: var(--accent-orange) !important;
        }

        /* Modernized Hero Section */
        .hero-banner {
            background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.85)), url('./images/school.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 16px;
            padding: 4rem 2rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.15);
        }

        /* Sleek Card */
        .form-card {
            background-color: var(--primary-dark);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-orange);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.25);
            color: #fff;
        }
        .form-control::placeholder {
            color: #94a3b8;
        }

        /* Custom Buttons */
        .btn-submit {
            background-color: var(--accent-orange);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            transition: transform 0.1s ease, background-color 0.2s ease;
        }
        .btn-submit:hover {
            background-color: #ea580c;
            color: white;
            transform: translateY(-1px);
        }
        .btn-reset {
            background-color: transparent;
            color: #94a3b8;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 8px;
        }
        .btn-reset:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        /* Table design updates */
        .custom-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .custom-table th {
            background-color: var(--primary-dark);
            color: white !important;
            font-weight: 600;
        }

        /* Footer styling */
        footer {
            background-color: var(--primary-dark);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

<!-- Header / Navigation -->
<header class="sticky-top">
    <nav class="navbar navbar-expand-sm navbar-dark py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <h1>TDM-Classroom<span style="color: var(--accent-orange)">.</span></h1>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="menu">
                <ul class="navbar-nav gap-2 mt-3 mt-sm-0">
                    <li class="nav-item"><a class="nav-link px-3" href="accueil.php">Accueil</a></li>
                    <li class="nav-item active"><a class="nav-link px-3" href="save.php">Nouveau</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="search.php">Rechercher</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main Content Wrapper -->
<main class="flex-shrink-0">
    <!-- Hero Section -->
    <section class="my-4">
        <div class="container"> 
            <div class="hero-banner d-flex align-items-center">
                <h2 class="display-5 fw-bold text-white m-0 ps-3">
                    Bienvenue à<br/><span style="color: var(--accent-orange)">TDM-Classroom.</span>
                </h2>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <div class="form-card p-4 p-sm-5 text-white">
                        <h3 class="fw-bold mb-2">Veuillez saisir vos informations</h3>
                        <p class="text-muted small mb-4">Créez un nouveau profil étudiant ou enseignant</p>
                        
                        <form action="save.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">
                            <div>
                                <label class="form-label small fw-medium text-secondary-emphasis">Nom</label>
                                <input name="nom" type="text" class="form-control" placeholder="Entrez votre Nom" required>
                            </div>
                            <div>
                                <label class="form-label small fw-medium text-secondary-emphasis">Prénom</label>
                                <input name="prenom" type="text" class="form-control" placeholder="Entrez votre Prénom" required>
                            </div>
                            <div>
                                <label class="form-label small fw-medium text-secondary-emphasis">Ville</label>
                                <input name="ville" type="text" class="form-control" placeholder="Entrez votre Ville" required>
                            </div>
                            <div>
                                <label class="form-label small fw-medium text-secondary-emphasis">Photo de profil</label>
                                <input name="photo" type="file" class="form-control" required>
                            </div>
                            
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end mt-3">
                                <button type="reset" class="btn btn-reset px-4 order-2 order-sm-1">Annuler</button>
                                <button type="submit" name="Enregistrer" value="Save" class="btn btn-submit px-4 order-1 order-sm-2">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PHP Output Results Container -->
    <?php
    if(!empty($_POST["Enregistrer"])){
        
        $Nom = htmlspecialchars($_POST['nom']);
        $Prenom = htmlspecialchars($_POST['prenom']);
        $Ville = htmlspecialchars($_POST['ville']);
        
        $Photo_tmp = $_FILES['photo']['tmp_name'];
        $nomph = $_FILES['photo']['name'];
        $des = "images/" . basename($nomph);
            $r=Students::AddStudent($Nom,$Prenom,$Ville,$Photo_tmp,$nomph);
            if($r!=0){
        echo "Merci de votre inscription !!!";
    }
        // Silent file move handling
        if(move_uploaded_file($Photo_tmp, $des)) {
            echo '<section class="mb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-6">
                                <div class="table-responsive custom-table">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="p-3">Photo</th>
                                                <th scope="col" class="p-3">Nom</th>
                                                <th scope="col" class="p-3">Prénom</th>
                                                <th scope="col" class="p-3">Ville</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="p-3">
                                                    <img src="images/'. $nomph .'" width="60" height="60" class="rounded-circle object-fit-cover shadow-sm" alt="Profile">
                                                </td>
                                                <td class="p-3 fw-semibold text-dark">'. $Nom .'</td>
                                                <td class="p-3 text-secondary">'. $Prenom .'</td>
                                                <td class="p-3 text-secondary">'. $Ville .'</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </section>';
        }
    }
    ?>
</main>

<!-- Footer -->
<footer class="mt-auto py-4 text-center text-secondary">
    <div class="container">
        <h4 class="text-white fw-bold mb-2" style="font-size: 1.2rem;">TDM-Classroom<span style="color: var(--accent-orange)">.</span></h4>
        <p class="small mb-0">&copy; Tous droits réservés.</p>
    </div>
</footer>

<!-- Bootstrap 5 Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>