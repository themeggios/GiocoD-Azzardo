<?php
session_start();

// Inizializza l'array delle giocate se non esiste
if (!isset($_SESSION['giocate'])) {
    $_SESSION['giocate'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Salva i dati della giocata
    $carta1_valore = $_POST['carta1_valore'];
    $carta1_seme = $_POST['carta1_seme'];
    $carta2_valore = $_POST['carta2_valore'];
    $carta2_seme = $_POST['carta2_seme'];
    $puntata = $_POST['puntata'];
    $data = $_POST['data'];

    // Aggiungi la giocata all'array
    $_SESSION['giocate'][] = [
        'carta1' => "$carta1_valore$carta1_seme",
        'carta2' => "$carta2_valore$carta2_seme",
        'puntata' => "$puntata",
        'data' => "$data",
    ];
}
?>


<head>
    <title>Poker Texas Hold'em - I soldi vanno i matti restano</title>
</head>
<body>
    <h1>Registrazione Giocate Poker</h1>
    <form action="index.php" method="post">
        <label for="carta1">Carta 1:</label>
        <select name="carta1_valore" id="carta1">
            <option value="A">A</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="J">J</option>
            <option value="Q">Q</option>
            <option value="K">K</option>
        </select>
        <select name="carta1_seme">
            <option value="C">Cuori</option>
            <option value="Q">Quadri</option>
            <option value="F">Fiori</option>
            <option value="P">Picche</option>
        </select>

        <label for="carta2">Carta 2:</label>
        <select name="carta2_valore" id="carta2">
        <option value="A">A</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="J">J</option>
            <option value="Q">Q</option>
            <option value="K">K</option>
        </select>
        <select name="carta2_seme">
            <option value="C">Cuori</option>
            <option value="Q">Quadri</option>
            <option value="F">Fiori</option>
            <option value="P">Picche</option>
        </select>

        <label for="puntata">Puntata (€):</label>
        <input type="number" name="puntata" id="puntata" required>

        <label for="data">Data della giocata:</label>
        <input type="date" name="data" id="data" required>

        <br><br>
        <button type="submit">SALVA</button>
    </form>

    <form action="incassi.php" method="post">
        <button type="submit">FINISCI</button>
    </form>

    <form action="logout.php" method="post">
        <button type="submit">NUOVA</button>
    </form>

</body>
</html>