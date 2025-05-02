<!-- AUTOR @rewor18 2025 -->

<?php 
$polaczenie=mysqli_connect('localhost','root','','kalendarz');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
<header class="naglowek">
<h1>Dni, miesiące, lata...</h1>
</header>

<section class="napis">
<p>
<?php 
$data_dzien_miesiac = date('m-d');
$data_pelna = date('d-m-Y');
$dzien_tygodnia_ang = date('l');

$dni_polskie = [
    'Monday'    => 'poniedziałek',
    'Tuesday'   => 'wtorek',
    'Wednesday' => 'środa',
    'Thursday'  => 'czwartek',
    'Friday'    => 'piątek',
    'Saturday'  => 'sobota',
    'Sunday'    => 'niedziela'
];

$dzien_tygodnia_pol = $dni_polskie[$dzien_tygodnia_ang];

$zapytanie = "SELECT imiona FROM imieniny WHERE data = '$data_dzien_miesiac'";
$wynik = mysqli_query($polaczenie, $zapytanie);

$imiona = '';
if ($wynik && mysqli_num_rows($wynik) > 0) {
    $wiersz = mysqli_fetch_assoc($wynik);
    $imiona = $wiersz['imiona'];
}

echo "Dzisiaj jest $dzien_tygodnia_pol, $data_pelna, imieniny: $imiona";

mysqli_close($polaczenie);
?>
</p>
</section>

<section class="lewy">
    <table>
        <thead>
            <tr>
                <th colspan="2">Liczba dni miesiąc</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </tbody>
    </table>
</section>

<section class="srodkowy">
<h2>Sprawdź kto ma urodziny</h2>
<form action="kalendarz.php" method="post">
    <input type="date" name="data" required min="2024-01-01" max="2024-12-31">
    <button type="submit">wyślij</button>
</form>
<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'kalendarz');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data'])) {
    $data_formularza = $_POST['data']; // yyyy-mm-dd
    $data_mmdd = date('m-d', strtotime($data_formularza));

    $zapytanie = "SELECT imiona FROM imieniny WHERE data = '$data_mmdd'";
    $wynik = mysqli_query($polaczenie, $zapytanie);

    $imiona = '';
    if ($wynik && mysqli_num_rows($wynik) > 0) {
        $wiersz = mysqli_fetch_assoc($wynik);
        $imiona = $wiersz['imiona'];
    }

    echo "Dnia $data_formularza są imieniny: $imiona";
}

mysqli_close($polaczenie);
?>
</section>


<section class="prawy">
<a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank">
    <img src="kalendarz.gif" alt="Kalendarz Majów">
</a>
<h2>Rodzaje kalendarzy</h2>
<ol>
    <li>słoneczny
        <ul>
            <li>kalendarz Majów</li>
            <li>juliański</li>
            <li>gregoriański</li>
        </ul>
    </li>
    <li>księżycowy
        <ul>
            <li>starogrecki</li>
            <li>babiloński</li>
        </ul>
    </li>
</ol>
</section>

<footer class="stopka">
<p>Stronę opracował(a): @rewor18</p>
</footer>

</body>
</html>

<!-- AUTOR @rewor18 2025 -->