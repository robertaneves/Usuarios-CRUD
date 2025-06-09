<?php
    require_once 'config.php';

    function uploadAnexo($fileInput, $id){
        if (isset($_FILES[$fileInput]) && $_FILES[$fileInput] ['error'] == 0) {
            $target_dir = "uploads/";
            $extension = pathinfo($_FILES[$fileInput] ["name"], PATHINFO_EXTENSION);
            $new_filename = "anexo_" . $id . "_" . time() . "_" . $fileInput . "." . $extension;
            $target_file = $target_dir . $new_filename;

            if ($extension != 'pdf') {
                die("Error: Apenas arquivos PDF são permitidos.");
            }

            //Move o arquivo
            if (move_uploaded_file($_FILES[$fileInput] ["tmp_name"], $target_file)) {
                return $new_filename;
            }

        }
        return null;
    }

    //Dados do formulário
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
?>