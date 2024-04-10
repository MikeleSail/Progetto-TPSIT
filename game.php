<!DOCTYPE html>

<head>
    <title>Hangman Game</title>
</head>
    
<body style="background-color:aquamarinw;">

<!-- SCRITTA HANGMAN GAME - LOGO -->
<a href="http://localhost/hangman%20game.php"><image id="logo" src="immagini_gioco\hangman_game.png"></image></a>
<!-- LINK CSS -->
    <link href="style.css" rel="stylesheet">
    <?php
session_start();

// Carica le parole da words.txt
$words = file("words.txt", FILE_IGNORE_NEW_LINES);

// Inizializza la sessione per la partita
if (!isset($_SESSION['word_to_guess'])) {
    $_SESSION['game_round'] = 1; // Round corrente
    initializeNewRound();
}

// Funzione per inizializzare un nuovo round
function initializeNewRound() {
    global $words;
    
    // Scegli una nuova parola a caso
    $wordToGuess = $words[array_rand($words)];
    $_SESSION['word_to_guess'] = $wordToGuess;
    
    // Inizializza i tentativi rimasti
    $_SESSION['remaining_attempts'] = 6;
    
    // Inizializza le lettere indovinate
    $_SESSION['guessed_letters'] = array_fill(0, strlen($wordToGuess), '_');
    
    // Inizializza lo stato dei pulsanti delle lettere
    $_SESSION['letter_buttons'] = array_fill_keys(range('A', 'Z'), true);
}

// Controlla se il gioco è finito
function isGameOver() {
    return $_SESSION['remaining_attempts'] <= 0 || !in_array('_', $_SESSION['guessed_letters']);
}

// Processa il tentativo del giocatore
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['letter'])) {
    $letter = strtolower($_POST['letter']);

    if (ctype_alpha($letter)) {
        $wordToGuess = $_SESSION['word_to_guess'];
        $guessedLetters = $_SESSION['guessed_letters'];

        // Verifica se la lettera è presente nella parola da indovinare
        $correctGuess = false;
        for ($i = 0; $i < strlen($wordToGuess); $i++) {
            if ($wordToGuess[$i] === $letter) {
                $guessedLetters[$i] = $letter;
                $correctGuess = true;
            }
        }

        // Aggiorna lo stato della partita
        if (!$correctGuess) {
            $_SESSION['remaining_attempts'] -= 1; // Riduci i tentativi rimasti
            $_SESSION['letter_buttons'][$letter] = false; // Disabilita il pulsante della lettera
        }

        $_SESSION['guessed_letters'] = $guessedLetters;

        // Verifica se la parola è stata indovinata o i tentativi sono finiti
        if (isGameOver()) {
            // Riduci i round di uno
            $_SESSION['game_round'] += 1;
            initializeNewRound();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gioco dell'Impiccato - Round <?php echo $_SESSION['game_round']; ?></title>
</head>
<body>
    <h1>Gioco dell'Impiccato - Round <?php echo $_SESSION['game_round']; ?></h1>

    <?php
    // Mostra lo stato attuale della parola indovinata
    echo "<p>Parola da indovinare:</p>";
    echo "<p>";
    foreach ($_SESSION['guessed_letters'] as $letter) {
        echo "$letter ";
    }
    echo "</p>";

    // Mostra il numero di tentativi rimasti
    echo "<p>Tentativi rimasti: {$_SESSION['remaining_attempts']}</p>";

    // Mostra le lettere come pulsanti per effettuare un nuovo tentativo
    if (!isGameOver()) {
        echo '<form method="post">';
        foreach (range('A', 'Z') as $letter) {
            if ($_SESSION['letter_buttons'][$letter]) {
                echo '<button type="submit" name="letter" value="' . $letter . '">' . $letter . '</button>';
            } else {
                echo '<button type="button" disabled>' . $letter . '</button>'; // Disabilita il pulsante
            }
        }
        echo '</form>';
    }

    // Verifica se il gioco è finito
    if (isGameOver()) {
        $gameResult = ($_SESSION['remaining_attempts'] > 0) ? "Hai vinto!" : "Hai perso!";
        echo "<h2>$gameResult</h2>";
        echo "<p>La parola da indovinare era: {$_SESSION['word_to_guess']}</p>";

        // Mostra il pulsante per passare al round successivo
        echo '<form method="post">';
        echo '<input type="submit" name="next_round" value="Passa al Round Successivo">';
        echo '</form>';
    }
    ?>

    <p><a href="index.php">Torna alla Home</a></p>
</body>
</html>
