<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Invisible Dice Roller</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        #dice-rolling-canvas {
            width: 100%;
            height: 100%;
            background-color: transparent; /* Transparent background */
        }
        .dice-roll-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }
    </style>
</head>
<body>

<!-- Dice Roll Button -->

<!-- Canvas for dice rolling -->
<canvas id="dice-rolling-canvas" class="dice-rolling-panel__container" touch-action="none" tabindex="1"></canvas>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="https://cdn.babylonjs.com/babylon.js"></script>
<script src="https://cdn.babylonjs.com/Oimo.js"></script> <!-- Optional: Oimo.js for physics engine -->

<script>
    window.addEventListener('DOMContentLoaded', function() {
        // Get the canvas element
        var canvas = document.getElementById('dice-rolling-canvas');

        // Create BabylonJS engine
        var engine = new BABYLON.Engine(canvas, true);

        //disabilita movimentro della pagina


        // Create the scene
        var createScene = function() {
            var scene = new BABYLON.Scene(engine);

            // Create a basic arc rotate camera (user can rotate and zoom)
            var camera = new BABYLON.ArcRotateCamera("camera",
                BABYLON.Tools.ToRadians(45), BABYLON.Tools.ToRadians(45),
                10, BABYLON.Vector3.Zero(), scene);
            camera.attachControl(canvas, f);

            // Create a simple light
            var light = new BABYLON.HemisphericLight("light",
                new BABYLON.Vector3(1, 1, 0), scene);
            light.intensity = 0.7;

            // Load a dice model
            BABYLON.SceneLoader.ImportMeshAsync(["ground", "semi_house"], "https://assets.babylonjs.com/meshes/", "both_houses_scene.babylon");


            // Add basic physics to the scene
            scene.enablePhysics(new BABYLON.Vector3(0, -9.81, 0),
                new BABYLON.OimoJSPlugin());

            return scene;
        };




        var scene = createScene();



        // Register a render loop to continuously render the scene
        engine.runRenderLoop(function() {
            scene.render();
        });

        // Resize the engine if the window is resized
        window.addEventListener('resize', function() {
            engine.resize();
        });


    });
</script>

</body>
</html>
