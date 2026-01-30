<!DOCTYPE html>
<html>
<head>
    <title>Résultats</title>
    <meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .section { margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Résultats de la requête</h1>
    
    <?php if (isset($clients)): ?>
        <div class="section">
            <h2>Clients de Dakar</h2>
            <table>
                <tr>
                    <th>ID Client</th>
                    <th>Nom</th>
                    <th>Ville</th>
                </tr>
                <?php foreach ($clients['dakar'] as $client): ?>
                    <tr>
                        <td><?= htmlspecialchars($client['nclient']) ?></td>
                        <td><?= htmlspecialchars($client['nom']) ?></td>
                        <td><?= htmlspecialchars($client['ville']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <h2>Clients hors Dakar</h2>
            <table>
                <tr>
                    <th>ID Client</th>
                    <th>Nom</th>
                    <th>Ville</th>
                </tr>
                <?php foreach ($clients['autres'] as $client): ?>
                    <tr>
                        <td><?= htmlspecialchars($client['nclient']) ?></td>
                        <td><?= htmlspecialchars($client['nom']) ?></td>
                        <td><?= htmlspecialchars($client['ville']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>

    <?php if (isset($data)): ?>
        <div class="section">
            <h2>Clients et leurs commandes</h2>
            <table>
                <tr>
                    <th>ID Client</th>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>N° Commande</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                </tr>
                <?php foreach ($data as $site => $records): ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['nclient']) ?></td>
                            <td><?= htmlspecialchars($record['nom']) ?></td>
                            <td><?= htmlspecialchars($record['ville']) ?></td>
                            <td><?= htmlspecialchars($record['ncde'] ?? 'Pas de commande') ?></td>
                            <td><?= htmlspecialchars($record['produit'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($record['qte'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
    
    <button onclick="location.href='index.html'">Retour</button>
</body>
</html>