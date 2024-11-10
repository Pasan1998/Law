<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text and Number Animation</title>
    
    <!-- jQuery for Counter-Up -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Counter-Up Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.counterup/2.1.0/jquery.counterup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    
    <!-- Typed.js for typing effect -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    
    <!-- anime.js for complex animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #061429;
            color: white;
            text-align: center;
            padding: 50px;
        }

        .counter-up {
            font-size: 3rem;
            margin: 20px 0;
        }

        .letter {
            display: inline-block;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        .letter:nth-child(1) { animation-delay: 0.1s; }
        .letter:nth-child(2) { animation-delay: 0.2s; }
        .letter:nth-child(3) { animation-delay: 0.3s; }
        .letter:nth-child(4) { animation-delay: 0.4s; }
        .letter:nth-child(5) { animation-delay: 0.5s; }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        #typed-text {
            font-size: 2rem;
            margin: 20px 0;
        }

        .anime-text {
            font-size: 2rem;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <!-- <h1>Number Counter-Up</h1>
    <h1 class="counter-up" data-toggle="counter-up">12345</h1> -->

    <h1>Typed.js Text Animation</h1>
    <h1 id="typed-text"></h1>

    <h1>Typed.js Text Animation 2</h1>
    <h1 id="typed-text2"></h1>

    <h1>Typed.js Text Animation 3</h1>
    <h1 id="typed-text3"></h1>

    <!-- <h1>CSS Letter-by-Letter Animation</h1>
    <h1 class="text-white mb-0">
        <span class="letter">H</span>
        <span class="letter">e</span>
        <span class="letter">l</span>
        <span class="letter">l</span>
        <span class="letter">o</span>
    </h1> -->

    <!-- <h1>Anime.js Text Animation</h1>
    <h1 class="anime-text">
        <span class="letter">A</span>
        <span class="letter">n</span>
        <span class="letter">i</span>
        <span class="letter">m</span>
        <span class="letter">a</span>
        <span class="letter">t</span>
        <span class="letter">i</span>
        <span class="letter">o</span>
        <span class="letter">n</span>
    </h1> -->

    <script>
        // Initialize the counter-up plugin
        // $('[data-toggle="counter-up"]').counterUp({
        //     delay: 10,
        //     time: 1000
        // });

        // Initialize Typed.js for typing effect
        var typed = new Typed("#typed-text", {
            strings: ["Hello", "Welcome to the site", "Enjoy your stay!"],
            typeSpeed: 50,
            backSpeed: 25,
            loop: true
        });

        var typed = new Typed("#typed-text2", {
            strings: ["Hello", "Welcome to the site", "Enjoy your stay!"],
            typeSpeed: 50,
            backSpeed: 25,
            loop: true
        });

        var typed = new Typed("#typed-text3", {
            strings: ["Hello", "Welcome to the site", "Enjoy your stay!"],
            typeSpeed: 50,
            backSpeed: 25,
            loop: true
        });

        // Initialize Anime.js for complex letter animation
        // anime.timeline({loop: true})
        //   .add({
        //     targets: '.anime-text .letter',
        //     translateY: [-100, 0],
        //     opacity: [0, 1],
        //     easing: "easeOutExpo",
        //     duration: 750,
        //     delay: (el, i) => 50 * i
        // });
    </script>

</body>
</html>
