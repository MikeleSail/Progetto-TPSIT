<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
</head>
<!-- LINK CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">

<body>
    <!-- CANZONE -->
    <audio autoplay id="canzone">
        <source src="song\onmousehover.mp3">
    </audio>

    <?php
    session_start();

    // Inizializzazione del contatore dei rounds se non è già stato impostato
    if (!isset($_SESSION['rounds'])) {
        $_SESSION['rounds'] = 1;
    }

    // Gestione dell'incremento del contatore
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['increment'])) {
            $_SESSION['rounds']++;
        } elseif (isset($_POST['decrement']) && $_SESSION['rounds'] > 0) {
            $_SESSION['rounds']--;
        }
    }
    ?>

    <!-- SCRITTA HANGMAN GAME - LOGO -->
    <img id="logo" src="immagini_gioco\hangman_game.png">
    <h1>NUMERO ROUND</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="bg-info clearfix" id="divround">
        <button class="btn btn-secondary float-start" type="submit" name="decrement" <?php if ($_SESSION['rounds'] === 1) echo 'disabled'; ?>>-</button>
        <br>    
            <h1 style="text-align: center;"><?php echo $_SESSION['rounds']; ?></h1>
            <button class="btn btn-secondary float-end" type="submit" name="increment" <?php if ($_SESSION['rounds'] >= 10) echo 'disabled'; ?>>+</button>
        </div>
    </form>
        <br>
        <a href="http://localhost/game.php">
    
    <button>
    Avanti
    </button>
</a>
    </body>

</html>
