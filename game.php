<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>hangman game</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h1 id="titolo">Gioco dell'Impiccato</h1>
    <div id="tentativi">
        <h2>tentativi: <?php $tentativi?> </h2>
    </div>
    <div>
  <?php
    $filename = 'parole.txt';
    if (file_exists($filename)) {
      $parole = file($filename, FILE_IGNORE_NEW_LINES);
      $parolaCasuale = $parole[array_rand($parole)];

    } else {
      echo "Il file non esiste.";
    }
  ?>
  <?php
$lettere = str_split($parolaCasuale);
$lunghezza = count($lettere);
$testo="";
$trattino="_";
for($i = 0; $i < $lunghezza; $i++)
{
    echo" _ ";
}
?>
</div>
<div id="lettere">
<button type="button" class="btn btn-dark">A</button>
<button type="button" class="btn btn-dark">B</button>
<button type="button" class="btn btn-dark">C</button>
<button type="button" class="btn btn-dark">D</button>
<button type="button" class="btn btn-dark">E</button>
<button type="button" class="btn btn-dark">F</button>
<button type="button" class="btn btn-dark">G</button>
<button type="button" class="btn btn-dark">H</button>
<button type="button" class="btn btn-dark">I</button>
<button type="button" class="btn btn-dark">J</button>
<button type="button" class="btn btn-dark">K</button>
<button type="button" class="btn btn-dark">L</button> <br>
<button type="button" class="btn btn-dark">M</button>
<button type="button" class="btn btn-dark">N</button>
<button type="button" class="btn btn-dark">O</button>
<button type="button" class="btn btn-dark">P</button>
<button type="button" class="btn btn-dark">Q</button>
<button type="button" class="btn btn-dark">R</button>
<button type="button" class="btn btn-dark">S</button>
<button type="button" class="btn btn-dark">T</button>
<button type="button" class="btn btn-dark">U</button>
<button type="button" class="btn btn-dark">V</button>
<button type="button" class="btn btn-dark">W</button>
<button type="button" class="btn btn-dark">X</button>
<button type="button" class="btn btn-dark">Y</button>
<button type="button" class="btn btn-dark">Z</button>
</div>
</body>
</html>
