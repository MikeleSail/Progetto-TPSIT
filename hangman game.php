<!DOCTYPE html>

<head>
    <title>Hangman Game</title>
</head>
    
<body style="background-color:aquamarine;">
<!-- CANZONE -->
    <audio autoplay loop id="canzone">
        <source src="song\canzone_iniziale.mp3">
    </audio>
<!-- SCRITTA HANGMAN GAME - LOGO -->
<img id="logo" src="immagini_gioco\hangman_game.png">
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
    $ngiocatori = isset($_GET['players']) ? $_GET['players'] : 0;
    // Controlla se è stato cliccato il regolamento
    if(isset($_SESSION['localhost/regolamento.html']) && $_SESSION['localhost/regolamento.html'] === true) {
        $buttonDisabled = false;
    } else {
        $buttonDisabled = true;
    }
    $_SESSION['http://localhost/regolamento.html'] = true;
    header('Location: hangman%20game.php');
    exit();
?>
<div id="selected-players"> 
    Giocatori selezionati:<?php echo $ngiocatori ?> 
    </div> 
    <?php echo "<a id='next-button' href='http://localhost/impostazioni.php?players=$ngiocatori'>";?> 
    <button <?php if($buttonDisabled) echo 'disabled'; ?>>
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
