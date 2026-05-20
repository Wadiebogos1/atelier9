<?php
include_once 'students.php';
session_start();
$errorMessage = ""; 

if(isset($_POST["conn"])){
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $w=Students::checkuser($login,$pass);
    if($w==0){
        $errorMessage="Login ou pass incorrect!!!";
    }
    else{
         if(isset($_POST["remember"])){
            setcookie("clogin", $login, time() + 3600, "/");
            setcookie("cpass", $pass, time() + 3600, "/");
        } else {
            // Optional: Clear cookies if "Remember me" is unchecked during a successful login
            setcookie("clogin", "", time() - 3600, "/");
            setcookie("cpass", "", time() - 3600, "/");
        }
        header("Location:save.php");
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDM-Classroom | Login</title>
    <!-- Bootstrap 5.3.x CDN -->
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

        /* Sleek Login Card */
        .login-card {
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
        .form-check-input:checked {
            background-color: var(--accent-orange);
            border-color: var(--accent-orange);
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
                    <li class="nav-item active"><a class="nav-link px-3" href="accueil.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="enregistrer.php">Nouveau</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="rechercher.php">Rechercher</a></li>
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

    <!-- Login Section -->
    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-5">
                    <div class="login-card p-4 p-sm-5 text-white">
                        <h3 class="fw-bold mb-2">Veuillez vous authentifier</h3>
                        <p class="text-muted small mb-4">Accédez à votre espace de travail</p>
                        
                        <?php if(!empty($errorMessage)): ?>
                            <div class="alert alert-danger mb-4"><?php echo htmlspecialchars($errorMessage); ?></div>
                        <?php endif; ?>

                        <form action="" method="POST" class="d-flex flex-column gap-3">
                            <div>
                                <label class="form-label small fw-medium text-secondary-emphasis">Login</label>
                                <input name="login" type="text" class="form-control" placeholder="Nom d'utilisateur" required 
                                       value="<?php echo isset($_COOKIE['clogin']) ? htmlspecialchars($_COOKIE['clogin']) : ''; ?>">
                            </div>
                            <div>
                                <label class="form-label small fw-medium text-secondary-emphasis">Mot de passe</label>
                                <input name="pass" type="password" class="form-control" placeholder="••••••••" required
                                       value="<?php echo isset($_COOKIE['cpass']) ? htmlspecialchars($_COOKIE['cpass']) : ''; ?>">
                            </div>
                            
                            <div class="form-check my-2">
                                <input name="remember" type="checkbox" class="form-check-input" id="rememberMe" 
                                       <?php echo isset($_COOKIE['clogin']) ? 'checked' : ''; ?>>
                                <label class="form-check-label small text-secondary-emphasis" for="rememberMe">Se souvenir de moi</label>
                            </div>
                            
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end mt-2">
                                <button type="reset" class="btn btn-reset px-4 order-2 order-sm-1">Annuler</button>
                                <button type="submit" name="conn" class="btn btn-submit px-4 order-1 order-sm-2">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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