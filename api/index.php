<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exquisite Dev | Portfolio</title>
    <style>
        :root {
            /* Default: Emerald/Gold Theme */
            --bg-dark: #0a1a14; 
            --primary-green: #2ecc71;
            --deep-green: #1b4d3e;
            --luxury-brown: #a67c52; 
            --soft-brown: #d4a373;
            --text-light: #e0e0e0;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --gold-shadow: 0 15px 35px rgba(166, 124, 82, 0.2);
            --font-code: 'Fira Code', monospace;
            --grad: radial-gradient(circle at top right, #1b4d3e, #0a1a14);
        }

        /* Purple Mode Override */
        body.purple-mode {
            --bg-dark: #120a1a; 
            --deep-green: #2d1b4d;
            --primary-green: #9b59b6;
            --luxury-brown: #d4a373; /* Slightly brighter for contrast */
            --grad: radial-gradient(circle at top right, #2d1b4d, #120a1a);
            --gold-shadow: 0 15px 35px rgba(155, 89, 182, 0.2);
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            margin: 0;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: var(--grad);
            transition: background 0.8s ease, color 0.5s ease;
        }

        /* Transition Helper */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            filter: blur(10px);
            transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        /* --- Theme Switcher Button --- */
        .theme-switch {
            background: rgba(166, 124, 82, 0.1);
            border: 1px solid var(--luxury-brown);
            color: var(--luxury-brown);
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-family: var(--font-code);
            font-size: 0.7rem;
            transition: 0.3s;
            text-transform: uppercase;
        }

        .theme-switch:hover {
            background: var(--luxury-brown);
            color: white;
            box-shadow: 0 0 15px var(--luxury-brown);
        }

        /* --- Gold Leaves --- */
        .gold-leaf {
            position: fixed;
            background: linear-gradient(135deg, var(--luxury-brown), #ffe4b5);
            width: 12px; height: 12px;
            opacity: 0.3; z-index: -1;
            pointer-events: none;
            animation: luxuryFloat linear infinite;
        }

        @keyframes luxuryFloat {
            0% { transform: translateY(110vh) rotate(0deg) scale(1); opacity: 0; }
            20% { opacity: 0.4; }
            100% { transform: translateY(-10vh) rotate(720deg) scale(0.5); opacity: 0; }
        }

        header {
            padding: 1.5rem 10%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(166, 124, 82, 0.2);
            position: sticky; top: 0; z-index: 100;
        }

        .logo { 
            font-family: var(--font-code); 
            font-weight: 800; 
            color: var(--luxury-brown); 
            font-size: 1.5rem;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 85vh;
            padding: 0 10%;
            gap: 60px;
        }

        .hero-info { flex: 1; }
        .hero-info h1 { font-size: 4rem; margin: 0; line-height: 1.1; font-weight: 900; }
        
        .typing {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid var(--luxury-brown);
            width: 0;
        }

        .hero-info h1 span { 
            color: var(--luxury-brown);
            background: linear-gradient(to right, #d4a373, #a67c52);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-info p { 
            color: var(--text-light); opacity: 0.7; font-size: 1.2rem; margin: 25px 0;
            border-left: 3px solid var(--luxury-brown); padding-left: 20px;
        }

        .code-vault {
            flex: 1;
            background: linear-gradient(145deg, rgba(20,20,20,0.9), rgba(10,10,10,0.9));
            padding: 40px; border-radius: 30px;
            box-shadow: var(--gold-shadow);
            border: 1px solid rgba(166, 124, 82, 0.3);
            position: relative;
        }

        .grid-lux { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 30px; }
        .lux-card {
            background: rgba(166, 124, 82, 0.05);
            border: 1px solid rgba(166, 124, 82, 0.1);
            padding: 25px; border-radius: 20px; text-align: center;
            transition: all 0.4s ease;
        }
        .lux-card:hover { transform: translateY(-5px); border-color: var(--luxury-brown); }
        .lux-card strong { display: block; color: var(--luxury-brown); font-family: var(--font-code); }

        .btn-gold {
            display: inline-block; padding: 15px 40px;
            background: linear-gradient(135deg, var(--luxury-brown), #7d5a37);
            color: #fff; text-decoration: none; border-radius: 50px;
            font-weight: 700; text-transform: uppercase; letter-spacing: 2px;
        }

        footer { text-align: center; padding: 50px; opacity: 0.5; font-family: var(--font-code); font-size: 0.8rem; }

        @media (max-width: 968px) {
            .hero { flex-direction: column; text-align: center; padding-top: 50px;}
            .hero-info h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

    <div id="particles"></div>

    <header class="reveal">
        <div class="logo">< WADIE.DEV /></div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <button class="theme-switch" onclick="toggleTheme()">SWITCH_THEME.exe</button>
            <div style="color: var(--luxury-brown); font-family: var(--font-code); font-size: 0.8rem;">STATUS: ELITE_DEV</div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-info">
            <h1 class="reveal"><span class="typing" id="type1">Elegance</span> <br><span class="typing" id="type2" style="animation-delay: 1.2s;">In Every Line</span></h1>
            <p class="reveal">Transforming complex logic into seamless digital experiences with a touch of prestige.</p>
            <div class="reveal">
                <a href="ateliers.php" class="btn-gold">Discover Excellence</a>
            </div>
        </div>

        <div class="code-vault reveal">
            <div style="font-family: var(--font-code); color: var(--text-light); opacity: 0.6; margin-bottom: 20px;">
                // Master Class Definition<br>
                <span style="color: var(--luxury-brown)">class</span> <span style="color: var(--primary-green)">PrestigePortfolio</span> {
            </div>
            
            <div class="grid-lux">
                <div class="lux-card"><strong>Architecture</strong><span style="font-size: 0.7rem; opacity: 0.5;">ROBUST SYSTEM</span></div>
                <div class="lux-card"><strong>Intelligence</strong><span style="font-size: 0.7rem; opacity: 0.5;">CLEAN LOGIC</span></div>
                <div class="lux-card"><strong>Refinement</strong><span style="font-size: 0.7rem; opacity: 0.5;">PIXEL PERFECT</span></div>
                <div class="lux-card"><strong>Security</strong><span style="font-size: 0.7rem; opacity: 0.5;">ENCRYPTED</span></div>
            </div>

            <div style="font-family: var(--font-code); color: var(--text-light); opacity: 0.6; margin-top: 20px;">
                } // End of Class
            </div>
        </div>
    </section>

    <footer class="reveal">DESIGNED & CODED FOR THE ELITE — 2026</footer>

    <script>
        // Toggle Theme Function
        function toggleTheme() {
            document.body.classList.toggle('purple-mode');
        }

        // Particle Logic
        const container = document.getElementById('particles');
        function createLeaf() {
            const leaf = document.createElement('div');
            leaf.className = 'gold-leaf';
            leaf.style.left = Math.random() * 100 + 'vw';
            leaf.style.animationDuration = (Math.random() * 5 + 7) + 's';
            leaf.style.width = (Math.random() * 10 + 5) + 'px';
            leaf.style.height = leaf.style.width;
            container.appendChild(leaf);
            setTimeout(() => leaf.remove(), 12000);
        }
        setInterval(createLeaf, 800);

        // Entrance Transition Logic
        window.addEventListener('load', () => {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('active');
                    const typingElements = el.querySelectorAll('.typing');
                    typingElements.forEach(span => {
                        span.style.animation = "typing 1.5s steps(20, end) forwards, blink 0.8s infinite";
                    });
                }, index * 250);
            });
        });

        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes typing { from { width: 0 } to { width: 100% } }
            @keyframes blink { 50% { border-color: transparent } }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>