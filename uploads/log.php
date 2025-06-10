<?php
// 1. Establish database connection
require_once "config.php";

// 2. Fetch data from the database
// The query is ordered to show the most recent actions first.
$result = $conn->query("SELECT * FROM logs ORDER BY data_acao DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log de Ações</title>
    
</head>
<body>

    <h2>Log de Ações do Sistema</h2>
    <a href="index.php">Voltar para a Lista</a>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Data e Hora</th>
                <th>Ação</th>
                <th>ID do Usuário</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($row['data_acao'])); ?></td>
                        <td>
                            <?php 
                                $acao = htmlspecialchars($row['acao']);
                                $cor = '#6c757d'; // Default: gray
                                if ($acao == 'CREATE') $cor = '#28a745'; // Green
                                if ($acao == 'UPDATE') $cor = '#ffc107'; // Yellow
                                if ($acao == 'DELETE') $cor = '#dc3545'; // Red

                                // Using a class makes the HTML cleaner
                                echo "<span class='action-badge' style='background-color: $cor;'>$acao</span>";
                            ?>
                        </td>
                        <td><?php echo $row['id_usuario'] ? htmlspecialchars($row['id_usuario']) : 'N/A'; ?></td>
                        <td><?php echo htmlspecialchars($row['detalhes']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Nenhuma ação registrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
<?php
// 3. Close the database connection
if ($conn) {
    $conn->close();
}
?>

<style>
        /* Optional: Adding some basic styling for better presentation */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-badge {
            display: inline-block;
            padding: 4px 8px;
            color: #fff;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>