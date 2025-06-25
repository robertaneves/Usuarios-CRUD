<?php
require_once "../model/config.php";

// Corrigir a consulta
$result = $conn->query("SELECT * FROM usuarios ORDER BY nome ASC");
require_once '../header/header.php';
?>

<h2>Usuários Cadastrados</h2>

<div>
    <a href="criar.php">Novo Usuário</a> |
    <a href="log.php">Ver logs</a>
</div>

<hr>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Anexos</th>
            <th>Ações</th>
        </tr>
    </thead>
    
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['idade']); ?></td>
                    <td>
                        <?php if (!empty($row['anexo1'])): ?>
                            <a href="uploads/<?php echo htmlspecialchars($row['anexo1']); ?>" target="_blank">Frente</a>
                        <?php endif; ?>
                        <?php if (!empty($row['anexo2'])): ?>
                            |
                            <a href="uploads/<?php echo htmlspecialchars($row['anexo2']); ?>" target="_blank">Verso</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a> |
                        <a href="excluir.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhum usuário cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
    require_once '../footer/footer.php';
?>

