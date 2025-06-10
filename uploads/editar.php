<?php
    require_once 'config.php';
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt-> bind_param("i", $id);
    $stmt-> execute();

    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    
    <form action="salvar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>" required>
  
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required> <br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required> <br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required> <br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?php echo htmlspecialchars($usuario['idade']); ?>" required> <br>

        <label for="anexo1">RG(Frente):</label>
        <input type="file" name="anexo1" id="anexo1" accept=".pdf">
            <?php if(!empty($usuario['anexo1'])): ?>    
                <small>Atual: <a href="uploads/<?php echo $usuario['anexo1']; ?>" target="_blank">Ver anexo</a></small>
                    <?php endif; ?> <br>


        <label for="anexo2">RG(Verso) - Manter ou substituir:</label>
        <input type="file" name="anexo2" id="anexo2" accept=".pdf">
        <?php if(!empty($usuario['anexo2'])): ?>    
                <small>Atual: <a href="uploads/<?php echo $usuario['anexo2']; ?>" target="_blank">Ver anexo</a></small>
                    <?php endif; ?> <br>

        <button type="submit">Salvar Alterações</button>
        <a href="index.php">Cancelar</a>
   
    </form>


 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00', {reverse:true});
            $('#telefone').mask('(00) 00000-0000');
        });
 
    </script>
    </body>
</html>