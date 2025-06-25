<?php
// 1. Establish database connection
require_once "../model/config.php";


// 2. Fetch data from the database
// The query is ordered to show the most recent actions first.
$result = $conn->query("SELECT * FROM logs ORDER BY data_acao DESC");
require_once '../header/header.php';

?>

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
            <?php while ($row = $result->fetch_assoc()): ?>
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

<?php
// 3. Close the database connection
if ($conn) {
    $conn->close();
}
require_once '../footer/footer.php';
?>