<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <div class="container_usuario">
        <h2>Cadastrar Usuário</h2>
        <hr>
    <form action="salvar.php" method="post" enctype="multipart/form-data" >
        <label for="nome">Nome completo:</label>
        <input type="text" id="nome" name="nome" required>

        <br>
        
        <label for="cpf">Insira seu CPF: </label>
        <input type="text" id="cpf" name="cpf"  maxlength="14" required>

        
        <br>

        <label for="telefone">Insira seu telefone:</label>
        <input type="tel" id="telefone" name="telefone"  maxlength="11" required>

        <br>

        <label for="email">Insira seu email:</label>
        <input type="email" id="email" name="email" required>

        <br>

        <label for="idade">Insira sua idade:</label>
        <input type="number" id="idade" name="idade" required min="1">

        <br>

        <label for="rgFrente">Insira seu RG (Frente)</label>
        <input type="file" id="rgFrente" name="rgFrente" accept=".pdf"> <br>
        
        <label for="rgVerso">Insira seu RG (Verso)</label>
        <input type="file" id="rgVerso" name="rgVerso" accept=".pdf"> <br>

        <button type="submit">Salvar</button>
     
    </form>

    </div>

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