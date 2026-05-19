<?php
include_once("connexion.php");
include_once("students.php");
session_start();

?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDM-Classroom | Rechercher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2 family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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

        /* Navbar */
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
        .nav-link:hover, .nav-item.active .nav-link, .nav-link.active {
            color: var(--accent-orange) !important;
        }

        /* Hero / Banner replacing old Jumbotron */
        .hero-banner {
            background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.85)), url('./images/school.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 16px;
            padding: 4rem 2rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.15);
        }

        /* Search Panel Card */
        .search-card {
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

        footer {
            background-color: var(--primary-dark);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

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
                    <li class="nav-item"><a class="nav-link px-3" href="save.php">Nouveau</a></li>
                    <li class="nav-item"><a class="nav-link active px-3" href="rechercher.php">Rechercher</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="flex-shrink-0">
    <section class="my-4">
        <div class="container"> 
            <div class="hero-banner d-flex align-items-center">
                <h2 class="display-5 fw-bold text-white m-0 ps-3">
                    Bienvenue à<br/><span style="color: var(--accent-orange)">TDM-Classroom.</span>
                </h2>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="search-card p-4 p-sm-5 text-white">
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold m-0" style="font-size: 1.5rem;">Rechercher par Ville</h3>
                            <!----->
                            <a href="search.php?cle=display" class="btn btn-sm btn-outline-light rounded-pill px-3">Afficher Tous</a>
                        </div>

                        <form action="search.php" method="POST" class="d-flex flex-column gap-3">
                            <div class="form-group">
                                <label class="form-label small fw-medium text-secondary-emphasis">Ville</label>
                                <input name="ville" type="text" class="form-control" placeholder="Entrez le nom d'une ville" required>
                            </div>
                            
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end mt-2">
                                <button type="reset" class="btn btn-reset px-4 order-2 order-sm-1">Annuler</button>
                                <button type="submit" name="search" class="btn btn-submit px-4 order-1 order-sm-2">Rechercher</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
 <div class="container mt-4">
            <div class="row">
                  <?php
                
                  ?>
                  <div class="container mt-4">
            <div class="row">
                             <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Ville</th>
                      <th>Photo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($_GET["cle"])){
                       $students = Students::AllStudents();
                    while ($student = $students->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $student['nom'] . "</td>";
                        echo "<td>" . $student['prenom'] . "</td>";
                        echo "<td>" . $student['ville'] . "</td>";
                        echo "<td><img src='" . $student['photo'] . "' alt='Photo' class='img-thumbnail' style='width: 100px; height: 100px; object-fit: cover;'></td>";
                        echo "</tr>";
                    } 
                    $students->closeCursor();
                    }
                      if(isset(($_POST["search"]))){

                  
                        $city=$_POST["ville"];
                        

                         $curstudents=Students::SearchStudents($city);
                    while ($student = $curstudents->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $student['nom'] . "</td>";
                        echo "<td>" . $student['prenom'] . "</td>";
                        echo "<td>" . $student['ville'] . "</td>";
                        echo "<td><img src='" . $student['photo'] . "' alt='Photo' class='img-thumbnail' style='width: 100px; height: 100px; object-fit: cover;'></td>";
                        echo "</tr>";
                    } 
                    $curstudents->closeCursor();
                    }














                    ?>
                  </tbody>
                  </table>
<footer class="mt-auto py-4 text-center text-secondary">
    <div class="container">
        <h4 class="text-white fw-bold mb-2" style="font-size: 1.2rem;">TDM-Classroom<span style="color: var(--accent-orange)">.</span></h4>
        <p class="small mb-0">&copy; Tous droits réservés.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>