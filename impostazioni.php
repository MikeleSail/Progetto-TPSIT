<!DOCTYPE html>
<html>

<head>
    <title>Hangman Game</title>
</head>
<!-- LINK CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">

<body>
    <!-- CANZONE -->
    <audio autoplay loop id="canzone">
        <source src="song\canzone_iniziale.mp3">
    </audio>

    <?php
    // Inizializzazione del numero di round
    $rounds = 1;

    // Verifica se è stato inviato un valore attraverso il parametro GET
    if (isset($_GET['rounds']) == true) {

        // Limita il numero di round tra 1 e 10
        $rounds = max(1, min(10, $rounds));
    }

    // Verifica se è stato cliccato il pulsante "+" per incrementare i round
    if (isset($_GET['increment']) == true) {
        $rounds++;
    }

    // Verifica se è stato cliccato il pulsante "-" per decrementare i round
    if (isset($_GET['decrement']) == true && $rounds > 1) {
        $rounds--;
    }
    ?>

    <!-- SCRITTA HANGMAN GAME - LOGO -->
    <img id="logo" src="immagini_gioco\hangman_game.png">
    <h1>NUMERO ROUND: <?php echo $rounds; ?></h1>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="bg-info clearfix" id="divround">
            <input type="submit" name="decrement" class="btn btn-secondary float-start" value="-<?php echo $rounds > 1 ? ' ' : ''; ?>">
            <br>
            <h1 style="text-align: center;" id="nround"><?php echo $rounds ?></h1>
            <input type="submit" name="increment" value="+ " class="btn btn-secondary float-end">
        </div>
</body>

</html>
