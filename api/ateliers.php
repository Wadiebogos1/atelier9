<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Dev Portfolio | Wadie</title>
    <style>
        :root {
            /* الألوان الأساسية: أخضر زمردي غامق ونحاسي فخم */
            --bg-dark: #0a1a14; 
            --deep-green: #1b4d3e;
            --luxury-brown: #a67c52;
            --accent-green: #2ecc71;
            --text-light: #e0e0e0;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --shadow: 0 15px 35px rgba(0,0,0,0.5);
            --font-code: 'Fira Code', 'Consolas', monospace;
        }

        /* تم تعديل الوضع هنا ليكون بنفسجياً فخماً بدلاً من البيج */
        body.beige-mode {
            --bg-dark: #120a1a; 
            --deep-green: #2d1b4d;
            --primary-green: #9b59b6;
            --luxury-brown: #d4a373; 
            --accent-green: #9b59b6;
            --text-light: #e0e0e0;
            --shadow: 0 15px 35px rgba(155, 89, 182, 0.2);
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background-color: var(--bg-dark); 
            color: var(--text-light);
            margin: 0;
            overflow-x: hidden;
            transition: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* --- تأثير الأوراق المتطايرة --- */
        .gold-leaf {
            position: fixed;
            background: linear-gradient(135deg, var(--luxury-brown), #ffe4b5);
            width: 8px;
            height: 10px;
            opacity: 0.3;
            z-index: -1;
            pointer-events: none;
            border-radius: 2px;
            animation: luxuryFloat linear infinite;
        }

        @keyframes luxuryFloat {
            0% { transform: translateY(110vh) rotate(0deg); opacity: 0; }
            20% { opacity: 0.4; }
            100% { transform: translateY(-10vh) rotate(720deg); opacity: 0; }
        }

        header {
            background: rgba(10, 26, 20, 0.8);
            backdrop-filter: blur(10px);
            padding: 0 10%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(166, 124, 82, 0.2);
            position: sticky; top: 0; z-index: 1000;
            height: 75px;
        }

        .logo {
            font-family: var(--font-code);
            font-weight: 800;
            color: var(--luxury-brown);
            letter-spacing: -1px;
            font-size: 1.4rem;
        }

        nav { display: flex; align-items: center; gap: 15px; }

        nav a, .dropdown-btn {
            text-decoration: none;
            color: var(--text-light);
            padding: 8px 15px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: 0.3s;
            cursor: pointer;
            border: none;
            background: none;
        }

        nav a:hover, .dropdown-btn:hover { color: var(--accent-green); }

        .theme-toggle-btn {
            background: var(--luxury-brown);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: bold;
            transition: 0.3s;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 60px; right: 0;
            background: #0d1e18;
            min-width: 200px;
            border: 1px solid rgba(166, 124, 82, 0.3);
            border-radius: 12px;
            box-shadow: var(--shadow);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown-content a {
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            font-family: var(--font-code);
            font-size: 0.8rem;
        }

        .dropdown-content a:hover { background: rgba(166, 124, 82, 0.1); color: var(--accent-green); }
        .show { display: block; }

        .hero {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* التدرج اللوني يتغير بناءً على المتغيرات */
            background: radial-gradient(circle at center, var(--deep-green) 0%, var(--bg-dark) 70%);
            padding: 0 20px;
            transition: background 0.5s ease;
        }

        .hero h1 { 
            font-size: 4rem; 
            margin: 0; 
            font-weight: 900;
            letter-spacing: -2px;
            transition: 0.5s;
        }
        .hero h1 span { color: var(--luxury-brown); }
        
        .hero p { 
            font-family: var(--font-code);
            color: var(--accent-green); 
            font-size: 1rem;
            margin: 20px 0 40px; 
            opacity: 0.8;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 80px 10%;
        }

        .feat-card {
            padding: 40px 30px;
            background: var(--glass-bg);
            border: 1px solid rgba(166, 124, 82, 0.1);
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(5px);
            transition: 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .feat-card:hover { 
            transform: translateY(-12px); 
            border-color: var(--luxury-brown);
            background: rgba(166, 124, 82, 0.05);
        }

        .feat-card h3 { color: var(--luxury-brown); font-family: var(--font-code); font-size: 1.1rem; }

        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(12px);
            align-items: center; justify-content: center;
        }

        .modal-box {
            background: #0d1e18;
            padding: 50px;
            border-radius: 30px;
            border: 1px solid var(--luxury-brown);
            max-width: 500px; width: 90%;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .btn-res {
            padding: 14px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            display: block;
            margin-top: 12px;
            transition: 0.3s;
            font-family: var(--font-code);
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .btn-ennonce { background: rgba(255,255,255,0.05); color: var(--text-light); }
        .btn-rapport { background: var(--luxury-brown); color: white; }
        .btn-github { background: var(--accent-green); color: #0a1a14; }
        
        .btn-main {
            background: linear-gradient(135deg, var(--luxury-brown), #7d5a37);
            color: white;
            padding: 18px 45px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            transition: 0.3s;
        }

        .btn-main:hover { transform: scale(1.05); filter: brightness(1.2); }

        footer { text-align: center; padding: 60px; opacity: 0.4; font-family: var(--font-code); font-size: 0.7rem; }
    </style>
</head>
<body>

    <div id="float-container"></div>

    <header>
        <div class="logo">< WADIE.DEV /></div>
        <nav>
            <a href="index.php">Accueil</a>
            <div class="dropdown">
                <button class="dropdown-btn" onclick="toggleDropdown()">Repositories.exe ▼</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#" onclick="openAtelier('Atelier 1', 'Analyse du système', '#', '#', '#')">> Atelier_01</a>
                    <a href="#" onclick="openAtelier('Atelier 2', 'Design Interfaces', '#', '#', '#')">> Atelier_02</a>
                    <a href="#" onclick="openAtelier('Atelier 3', 'Cyber Security', '#', '#', '#')">> Atelier_03</a>
                    <a href="#" onclick="openAtelier('Atelier 4', 'Storage Engine', '#', '#', '#')">> Atelier_04</a>
                    <a href="#" onclick="openAtelier('Atelier 5', 'Auth Sessions', '#', '#', '#')">> Atelier_05</a>
                </div>
            </div>
            <a href="contact.php">Contact</a>
            <button class="theme-toggle-btn" onclick="toggleTheme()">🌓 MODE</button>
        </nav>
    </header>

    <section class="hero">
        <h1 id="heroTitle">Digital <span>Prestige</span></h1>
        <p>> system.init("Conception d'interfaces modernes");</p>
        <a href="#" class="btn-main" onclick="toggleDropdown()">Execute_Portfolio()</a>
    </section>

    <section class="features">
        <div class="feat-card" onclick="openAtelier('Atelier 1', 'Focus: Analyse & Algorithmes', '#', '#', '#')">
            <h3>Atelier_01</h3>
            <p>Analysis</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 2', 'Focus: UI/UX & Design Systems', '#', '#', '#')">
            <h3>Atelier_02</h3>
            <p>Design</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 3', 'Focus: Security & Encryption', '#', '#', '#')">
            <h3>Atelier_03</h3>
            <p>Security</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 4', 'Focus: SQL & Data Management', '#', '#', '#')">
            <h3>Atelier_04</h3>
            <p>Storage</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 5', 'Focus: SQL & Data Management', 'accueil.php', '#', 'https://github.com/Wadiebogos1/Portfolio.git')">
            <h3>Atelier_05</h3>
            <p>Storage</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 6', 'Focus: SQL & Data Management', '#', '#', '#')">
            <h3>Atelier_06</h3>
            <p>Storage</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 7', 'Focus: SQL & Data Management', '#', '#', '#')">
            <h3>Atelier_07</h3>
            <p>Storage</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 8', 'Focus: SQL & Data Management', 'connexion.php', '#', '#')">
            <h3>Atelier_08</h3>
            <p>Storage</p>
        </div>
        <div class="feat-card" onclick="openAtelier('Atelier 9', 'Focus: SQL & Data Management', 'accueil.php', '#', '#')">
            <h3>Atelier_09</h3>
            <p>Storage</p>
        </div>
    </section>

    <div id="atelierModal" class="modal">
        <div class="modal-box">
            <h2 id="atTitle" style="color: var(--luxury-brown); font-family: var(--font-code);"></h2>
            <p id="atDesc" style="color: var(--text-light); opacity: 0.7;"></p>
            <div class="modal-footer">
                <a href="#" id="linkEnnonce" class="btn-res btn-ennonce">Description</a>
                <a href="#" id="linkRapport" class="btn-res btn-rapport">View Report</a>
                <a href="#" id="linkGithub" class="btn-res btn-github">Source Code</a>
            </div>
            <button onclick="closeAtelier()" style="margin-top:30px; border:none; background:none; cursor:pointer; color:var(--luxury-brown); font-family: var(--font-code); font-size: 0.8rem;">[ CLOSE_WINDOW ]</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 // COMPILED BY WADIE TITUZ // ALL RIGHTS RESERVED</p>
    </footer>

    <script>
        // تأثير الأوراق المتطايرة
        const container = document.getElementById('float-container');
        function createLeaf() {
            const leaf = document.createElement('div');
            leaf.className = 'gold-leaf';
            leaf.style.left = Math.random() * 100 + 'vw';
            leaf.style.animationDuration = (Math.random() * 5 + 7) + 's';
            leaf.style.width = (Math.random() * 6 + 4) + 'px';
            container.appendChild(leaf);
            setTimeout(() => leaf.remove(), 10000);
        }
        setInterval(createLeaf, 700);

        function toggleTheme() {
            const body = document.body;
            const heroTitle = document.getElementById('heroTitle');
            
            body.classList.toggle('beige-mode');

            if (body.classList.contains('beige-mode')) {
                // العنوان يتغير في الوضع البنفسجي
                heroTitle.innerHTML = 'Royal <span>Excellence</span>';
            } else {
                heroTitle.innerHTML = 'Digital <span>Prestige</span>';
            }
        }

        function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function openAtelier(title, desc, ennonce, rapport, github) {
            document.getElementById('atTitle').innerText = title;
            document.getElementById('atDesc').innerText = desc;
            document.getElementById('linkEnnonce').href = ennonce;
            document.getElementById('linkRapport').href = rapport;
            document.getElementById('linkGithub').href = github;
            document.getElementById('atelierModal').style.display = 'flex';
        }

        function closeAtelier() {
            document.getElementById('atelierModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-btn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    if (dropdowns[i].classList.contains('show')) dropdowns[i].classList.remove('show');
                }
            }
            if (event.target.className === 'modal') closeAtelier();
        }
    </script>
</body>
</html>