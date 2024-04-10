<?php
session_start();

// Calcola il punteggio finale
$score = ($_SESSION['remaining_attempts'] > 0) ? 1 : -1;

// Memorizza il risultato della partita (puoi salvare questo risultato su un database o in un file di log)
$result = [
    'score' => $score,
    'word_to_guess' => $_SESSION['word_to_guess'],
    'remaining_attempts' => $_SESSION['remaining_attempts'],
    'guessed_letters' => $_SESSION['guessed_letters'],
];

// Aggiungi il risultato alla lista delle partite (se esiste)
if (!isset($_SESSION['game_results'])) {
    $_SESSION['game_results'] = [];
}
array_push($_SESSION['game_results'], $result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato Gioco dell'Impiccato</title>
</head>
<body>
    <h1>Risultato del Gioco dell'Impiccato</h1>

    <p><strong>Risultato della partita:</strong></p>
    <ul>
        <li>Punteggio: <?php echo $result['score']; ?></li>
        <li>Parola da indovinare: <?php echo $result['word_to_guess']; ?></li>
        <li>Tentativi rimasti: <?php echo $result['remaining_attempts']; ?></li>
        <li>Lettere indovinate: <?php echo implode(' ', $result['guessed_letters']); ?></li>
    </ul>

    <p><a href="index.php">Torna alla Home</a></p>
</body>
</html>
