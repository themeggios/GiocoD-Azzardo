<?php
session_start();

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
        <select name="carta1_valore" id="carta1" required>
        <?php 
            $valori = ['' => '', 'A', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
            foreach ($valori as $valore) {
                echo "<option value=\"$valore\">$valore</option>";
            }
        ?>
        </select>
        <select name="carta1_seme" required>
        <?php 
            $semi = ['' => '', 'C' => 'Cuori','Q' => 'Quadri', 'F' => 'Fiori', 'P' => 'Picche'];
            foreach ($semi as $sigla => $nome) {
                echo "<option value=\"$sigla\">$nome</option>";
            }
        ?>
        </select>

        <br>

        <label for="carta2">Carta 2:</label>
        <select name="carta2_valore" id="carta2" required>
        <?php 
            $valori = ['' => '', 'A', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
            foreach ($valori as $valore) {
                echo "<option value=\"$valore\">$valore</option>";
            }
        ?>
        </select>
        <select name="carta2_seme" required>
        <?php 
            $semi = ['' => '', 'C' => 'Cuori','Q' => 'Quadri', 'F' => 'Fiori', 'P' => 'Picche'];
            foreach ($semi as $sigla => $nome) {
                echo "<option value=\"$sigla\">$nome</option>";
            }
        ?>
        </select>

        <br>

        <label for="puntata">Puntata (€):</label>
        <input type="number" name="puntata" id="puntata" required>

        <br>

        <label for="data">Data della giocata:</label>
        <input type="date" name="data" id="data" required>

        <br>

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