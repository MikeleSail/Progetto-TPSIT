<!DOCTYPE html>

<head>
    <title>Hangman Game</title>
</head>
    
<body style="background-color:aquamarinw;">
<!-- CANZONE -->
    <audio autoplay loop id="canzone">
        <source src="song\canzone_iniziale.mp3">
    </audio>
<!-- SCRITTA HANGMAN GAME - LOGO -->
<a href="http://localhost/hangman%20game.php"><image id="logo" src="immagini_gioco\hangman_game.png"></image></a>
<!-- LINK CSS -->
    <link href="style.css" rel="stylesheet">
<!-- SCELTA NUMERO GIOCATORI -->
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div id="sceltagiocatori">
        <h2 id="scritta_scelta_giocatori">SCEGLI IL NUMERO DI GIOCATORI</h2>
        <button id="btnplayers" name="players" value="1">
        <image img id="playerimg" src="immagini_gioco\1giocatore.png">
        </button> 
        <button id="btnplayers" name="players" value="2">        
            <img id="playerimg" src="immagini_gioco\2giocatori.png">
        </button>
        <button id="btnplayers" name="players" value="3">        
            <img id="playerimg" src="immagini_gioco\3giocatori.png">
        </button>
        <button id="btnplayers" name="players" value="4">        
            <img id="playerimg" src="immagini_gioco\4giocatori.png">
        </button>
    </div>
</form>
<?php
session_start();
    $_SESSION['players'] = isset($_GET['players']) ? $_GET['players'] : 0; ?>
<div id="selected-players"> 
    Giocatori selezionati:<?php echo $_SESSION['players'] ?> 
    </div> 
    <a href="http://localhost/impostazioni.php">
    <button <?php if ($_SESSION['players'] == 0) echo 'disabled'; ?>>
    Avanti
    </button></a>
<!-- REGOLAMENTO -->
    <div id="regolamento">
    <h2>PREMI QUI PER IL REGOLAMETO!</h2>
    <a href="http://localhost/regolamento.html">
<!-- ANIMAZIONE -->
    <video width="620" height="350" autoplay muted loop id="animazione">
        <source src="immagini_gioco\animation.mp4">
    </video>
    </a>
    </div>
</body>

</html>
