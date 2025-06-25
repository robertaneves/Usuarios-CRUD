<?php
require_once '../model/config.php';

function uploadAnexo($fileInput, $id)
{
    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] == 0) {
        $target_dir = "../uploads/";
        $extension = pathinfo($_FILES[$fileInput]["name"], PATHINFO_EXTENSION);
        $new_filename = "anexo_" . $id . "_" . time() . "_" . $fileInput . "." . $extension;
        $target_file = $target_dir . $new_filename;

        if ($extension != 'pdf') {
            die("Error: Apenas arquivos PDF são permitidos.");
        }

        if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $target_file)) {
            return $new_filename;
        }
    }
    return null;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : null;
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$idade = $_POST['idade'];

if ($id) {
    // Edição
    $stmt = $conn->prepare("SELECT anexo1, anexo2 FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario_atual = $result->fetch_assoc();
    $stmt->close();

    $anexo1_nome = uploadAnexo('anexo1', $id) ?? $usuario_atual['anexo1'];
    $anexo2_nome = uploadAnexo('anexo2', $id) ?? $usuario_atual['anexo2'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome=?, cpf=?, telefone=?, email=?, idade=?, anexo1=?, anexo2=? WHERE id=?");
    $stmt->bind_param("sssssssi", $nome, $cpf, $telefone, $email, $idade, $anexo1_nome, $anexo2_nome, $id);

    if ($stmt->execute()) {
        $detalhes = "Usuário '$nome' (ID: $id) foi atualizado.";
        registrarLog('UPDATE', $id, $detalhes);
    }

    $stmt->close();
} else {
    // Criação
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, cpf, telefone, email, idade) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nome, $cpf, $telefone, $email, $idade);

    if ($stmt->execute()) {
        $last_id = $conn->insert_id;

        $anexo1_nome = uploadAnexo('anexo1', $last_id);
        $anexo2_nome = uploadAnexo('anexo2', $last_id);

        if ($anexo1_nome || $anexo2_nome) {
            $update_stmt = $conn->prepare("UPDATE usuarios SET anexo1=?, anexo2=? WHERE id=?");
            $update_stmt->bind_param("ssi", $anexo1_nome, $anexo2_nome, $last_id);
            $update_stmt->execute();
            $update_stmt->close();
        }

        $detalhes = "Usuário '$nome' (ID: $last_id) foi criado.";
        registrarLog('CREATE', $last_id, $detalhes);
    }

    $stmt->close();
}

$conn->close();

header("Location: ../view/index.php");
exit();
