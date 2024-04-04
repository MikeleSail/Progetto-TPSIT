<!DOCTYPE html>

<head>
    <title>Hangman Game</title>
</head>

<body style="background-color:aquamarine;">
<!-- SCRITTA HANGMAN GAME - LOGO -->
<img id="logo" src="immagini_gioco\hangman_game.png">
<!-- LINK CSS -->
    <link href="style.css" rel="stylesheet">
<!-- SCELTA NUMERO GIOCATORI -->
    <div id="sceltagiocatori">
        <h2 id="scritta_scelta_giocatori">SCEGLI IL NUMERO DI GIOCATORI</h2>
        <button id="ngiocatori">
            <img id="playerimg" src="immagini_gioco\player.png">
            <br>
            <h3>1 GIOCATORE</h3>
        </button>
        <button id="ngiocatori">
            <img id="playerimg" src="immagini_gioco\player.png"><img id="playerimg" src="immagini_gioco\player.png">
            <br>
            <h3>2 GIOCATORI</h3>
        </button>
        <button id="ngiocatori">
            <img id="playerimg" src="immagini_gioco\player.png"><img id="playerimg" src="immagini_gioco\player.png"><img id="playerimg" src="immagini_gioco\player.png">
            <br>
            <h3>3 GIOCATORI</h3>
        </button>
        <button id="ngiocatori">
            <img id="playerimg" src="immagini_gioco\player.png"><img id="playerimg" src="immagini_gioco\player.png"><img id="playerimg" src="immagini_gioco\player.png"><img id="playerimg" src="immagini_gioco\player.png">
            <br>
            <h3>4 GIOCATORI</h3>
        </button>
    </div>
<!-- REGOLAMENTO -->
    <div id="regolamento">
    <h2>PREMI QUI PER IL REGOLAMETO!</h2>
    <a href="regolamento.html">
<!-- ANIMAZIONE -->
    <video width="620" height="350" autoplay muted loop id="animazione">
        <source src="immagini_gioco\animation.mp4">
    </video>
    </a>
    </div>
    <?php

    ?>
</body>

</html>
