<!-- AUTOR @rewor18 2025 -->

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<header class="naglowek">
<h1>Obuwie męskie</h1>
</header>

<main class="glowny">
<h2>Zamówienie</h2>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'obuwie');

$model = $_POST['model'];
$rozmiar = $_POST['rozmiar'];
$liczbaPar = $_POST['liczbaPar'];

$zapytanie3 = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.material, produkt.nazwa_pliku 
FROM buty 
JOIN produkt ON buty.model = produkt.model 
WHERE buty.model = '$model'";

$wynik = mysqli_query($conn, $zapytanie3);

if ($wiersz = mysqli_fetch_assoc($wynik)) {
    $cenaCalkowita = $wiersz['cena'] * $liczbaPar;

    echo '<img src="' . $wiersz['nazwa_pliku'] . '" alt="but męski">';
    echo '<h2>' . $wiersz['nazwa'] . '</h2>';
    echo '<p>cena za ' . $liczbaPar . ' par: ' . $cenaCalkowita . ' zł</p>';
    echo '<p>Szczegóły produktu: ' . $wiersz['kolor'] . ', ' . $wiersz['material'] . '</p>';
    echo '<p>Rozmiar: ' . $rozmiar . '</p>';
}

mysqli_close($conn);
?>

<a href="index.php">Strona główna</a>
</main>

<footer class="stopka">
<p>Autor strony: @rewor18</p>
</footer>

</body>
</html>

<!-- AUTOR @rewor18 2025 -->