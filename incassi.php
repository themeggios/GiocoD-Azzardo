<?php
session_start();

// Verifica se esistono giocate nella sessione
if (!isset($_SESSION['giocate']) || empty($_SESSION['giocate'])) {
    echo "<p>Nessuna giocata registrata.</p>";
    echo "<a href='index.php'>Torna alla pagina principale</a>";
    exit();
}

// Calcola il totale delle puntate
$totale_puntate = 0;
foreach ($_SESSION['giocate'] as $giocata) {
    $totale_puntate += floatval($giocata['puntata']);
}

?>

<head>
    <title>Riepilogo Incassi - Poker Texas Hold'em</title>
</head>
<body>
    <h1>Riepilogo Incassi del Tavolo</h1>
    
    <table>
        <tr>
            <th>Data</th>
            <th>Carta 1</th>
            <th>Carta 2</th>
            <th>Puntata (€)</th>
        </tr>
        <?php foreach ($_SESSION['giocate'] as $giocata): ?>
        <tr>
            <td><?= htmlspecialchars($giocata['data']) ?></td>
            <td><?= htmlspecialchars($giocata['carta1']) ?></td>
            <td><?= htmlspecialchars($giocata['carta2']) ?></td>
            <td><?= htmlspecialchars($giocata['puntata']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Totale Puntate: €<?= number_format($totale_puntate, 2) ?></h2>

    <p><a href="index.php">Torna alla pagina principale</a></p>
    
    <form action="logout.php" method="post">
        <button type="submit">Nuova Sessione</button>
    </form>
</body>
</html>