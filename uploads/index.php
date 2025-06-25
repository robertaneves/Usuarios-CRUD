<?php
require_once 'config.php';

// Corrigir a consulta
$result = $conn->query("SELECT * FROM usuarios ORDER BY nome ASC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Usuários Cadastrados</title>
</head>
<body>

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

</body>
</html>

<style>
    /* style.css */

/* --- Configurações Gerais e Fundo (Reutilizado do estilo anterior) --- */
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 20px;
}

/* --- Contêiner Principal para a Lista --- */
.container_lista {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 960px; /* Maior para acomodar a tabela */
    margin: 0 auto; /* Centraliza o contêiner */
    box-sizing: border-box;
}

/* --- Título e Linha Horizontal (Reutilizado) --- */
h2 {
    text-align: center;
    color: #1d2129;
    margin-top: 0;
    margin-bottom: 15px;
}

hr {
    border: none;
    height: 1px;
    background-color: #ddd;
    margin-bottom: 25px;
}

/* --- Barra de Ações (Novo Usuário, Ver logs) --- */
.barra_acoes {
    margin-bottom: 25px;
    display: flex;
    gap: 15px; /* Espaço entre os links */
    align-items: center;
}

.barra_acoes a {
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
}

/* Botão de destaque para "Novo Usuário" */
.barra_acoes a.botao_novo {
    background-color: #007bff; /* Azul primário */
    color: white;
}
.barra_acoes a.botao_novo:hover {
    background-color: #0056b3;
}

/* Link secundário para "Ver logs" */
.barra_acoes a.link_log {
    color: #007bff;
}
.barra_acoes a.link_log:hover {
    text-decoration: underline;
}


/* --- Estilo da Tabela --- */
table {
    width: 100%;
    border-collapse: collapse; /* Remove espaços entre as células */
    font-size: 0.95rem;
}

/* --- Cabeçalho da Tabela --- */
thead th {
    background-color: #f8f9fa;
    color: #343a40;
    text-align: left;
    padding: 12px 15px;
    font-weight: 600;
    border-bottom: 2px solid #dee2e6;
}

/* --- Células e Linhas do Corpo da Tabela --- */
tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle; /* Alinha o conteúdo verticalmente */
}

/* Efeito de hover nas linhas */
tbody tr:hover {
    background-color: #f1f1f1;
}

/* Remove a borda da última linha */
tbody tr:last-child td {
    border-bottom: none;
}

/* --- Links na Tabela (Anexos e Ações) --- */
td a {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
}

td a:hover {
    text-decoration: underline;
}

/* Botões de Ação (Editar e Excluir) */
.acao_editar, .acao_excluir {
    display: inline-block;
    padding: 5px 10px;
    color: white !important; /* Força a cor do texto a ser branca */
    border-radius: 5px;
    text-decoration: none !important; /* Remove o sublinhado */
    margin-right: 5px;
    font-size: 0.9rem;
}
.acao_editar:hover, .acao_excluir:hover {
    opacity: 0.85;
}

.acao_editar {
    background-color: #ffc107; /* Amarelo */
}

.acao_excluir {
    background-color: #dc3545; /* Vermelho */
}s

</style>
