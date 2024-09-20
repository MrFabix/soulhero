<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il Caos Elegante</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <style>
        /* Animazioni di colore su tutto lo sfondo */
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #ff0000, #0000ff, #00ff00);
            background-size: 600% 600%;
            animation: colorShift 10s infinite ease-in-out;
            font-family: 'Courier New', monospace;
            color: white;
            overflow: hidden;
        }

        @keyframes colorShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Testo Glitchato */
        .glitch {
            font-size: 4rem;
            position: relative;
            color: #fff;
            animation: glitch 1.5s infinite;
        }

        @keyframes glitch {
            0% { text-shadow: 1px 1px red; }
            25% { text-shadow: -2px -2px cyan; }
            50% { text-shadow: 3px 3px lime; }
            75% { text-shadow: -3px 0px blue; }
            100% { text-shadow: 0px 0px red; }
        }

        /* Cubo 3D animato */
        #cubeCanvas {
            position: absolute;
            top: 20%;
            left: 50%;
            width: 50vw;
            height: 50vh;
            transform: translateX(-50%);
        }

        /* Pulsanti che fluttuano e si glitchano */
        .floating-button {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ff0077;
            border: none;
            color: white;
            padding: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            animation: floating 2s infinite ease-in-out;
        }

        @keyframes floating {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-20px); }
        }

        .floating-button:hover {
            animation: glitchButton 0.5s infinite;
        }

        @keyframes glitchButton {
            0% { background-color: #ff0000; transform: translateX(-50%) translateY(0) rotate(0deg); }
            50% { background-color: #00ff00; transform: translateX(-50%) translateY(-10px) rotate(5deg); }
            100% { background-color: #0000ff; transform: translateX(-50%) translateY(0) rotate(-5deg); }
        }

        /* Testo che si deforma */
        .warp-text {
            font-size: 2rem;
            animation: warp 4s infinite ease-in-out;
        }

        @keyframes warp {
            0% { letter-spacing: 0px; }
            50% { letter-spacing: 10px; color: yellow; }
            100% { letter-spacing: 0px; color: white; }
        }

        /* Effetti Parallax */
        .parallax {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: url('https://placekitten.com/1000/1000') no-repeat center;
            background-size: cover;
            transform: translateZ(-1px) scale(2);
            z-index: -1;
            animation: parallaxShift 20s infinite linear;
        }

        @keyframes parallaxShift {
            0% { transform: translateX(0) translateZ(-1px) scale(2); }
            100% { transform: translateX(-100%) translateZ(-1px) scale(2); }
        }

        /* Suoni casuali */
        audio {
            display: none;
        }

        /* Esplosione di particelle */
        .particle {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: yellow;
            border-radius: 50%;
            animation: explode 1s infinite;
        }

        @keyframes explode {
            0% { opacity: 1; transform: translate(0, 0) scale(1); }
            50% { opacity: 0.5; transform: translate(100px, 100px) scale(2); }
            100% { opacity: 0; transform: translate(200px, 200px) scale(0); }
        }
    </style>
</head>
<body>

<!-- Effetto Parallax -->
<div class="parallax"></div>

<!-- Testo Glitchato -->
<h1 class="glitch text-center mt-10">IL CAOS ELEGANTE</h1>

<!-- Testo che si deforma -->
<p class="warp-text text-center mt-20">Testo in continua trasformazione...</p>

<!-- Cubo 3D animato -->
<div id="cubeCanvas"></div>

<!-- Pulsante fluttuante glitchato -->
<button class="floating-button">Clicca per Più Caos</button>

<!-- Particelle di esplosione -->
<div id="particle" class="particle" style="top: 50%; left: 50%;"></div>

<!-- Audio nascosto -->
<audio id="chaosSound" src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" loop></audio>

<!-- Script per creare il caos -->
<script>
    // Funzione per far partire il cubo 3D
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight / 2);
    document.getElementById('cubeCanvas').appendChild(renderer.domElement);

    var geometry = new THREE.BoxGeometry();
    var material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });
    var cube = new THREE.Mesh(geometry, material);
    scene.add(cube);

    camera.position.z = 5;

    function animateCube() {
        requestAnimationFrame(animateCube);
        cube.rotation.x += 0.01;
        cube.rotation.y += 0.01;
        renderer.render(scene, camera);
    }
    animateCube();

    // Pulsante glitchato che genera esplosioni di particelle e suona
    var button = document.querySelector('.floating-button');
    var particle = document.getElementById('particle');
    var sound = document.getElementById('chaosSound');
    button.addEventListener('click', function() {
        particle.style.top = (Math.random() * window.innerHeight) + 'px';
        particle.style.left = (Math.random() * window.innerWidth) + 'px';
        sound.play();
    });
</script>

</body>
</html>
