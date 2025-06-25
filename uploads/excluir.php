<?php 
    require_once'config.php';
    $id = $_GET['id'];

    // Pega os dados do usuário para log e para deletar os arquivos
    $stmt_select = $conn->prepare("SELECT nome, anexo1, anexo2 FROM usuarios WHERE id=?");
    $stmt_select->bind_param("i", $id);
    $stmt_select-> execute();

    $result = $stmt_select->get_result();
    $usuario = $result->fetch_assoc();
    $stmt_select->close();

    if ($usuario) {
        // Deletar os anexos do servidor
        if ($usuario['anexo1'] && file_exists('uploads/' . $usuario['anexo1'])) {
            unlink('uploads/' . $usuarios['anexo1']);
        }

        if ($usuario['anexo2'] && file_exists('uploads/' . $usuario['anexo2'])) {
            unlink('uploads/' . $usuarios['anexo2']);
        }

        $stmt_select = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt_select->bind_param("i", $id);

        if($stmt_select->execute()){
            $detalhes = "Usuários '" . $usuario['nome'] . "' (ID: $id) foi excluido.";
            registrarLog('DELETE', $id, $detalhes);
        }
    }
        header('Location: index.php');
        exit();

?>