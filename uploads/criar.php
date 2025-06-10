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
        <input type="file" id="anexo1" name="anexo1" accept=".pdf"> <br>
        
        <label for="rgVerso">Insira seu RG (Verso)</label>
        <input type="file" id="anexo2" name="anexo2" accept=".pdf"> <br>

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

<style>
    /* style.css */

/* --- Configurações Gerais e Fundo --- */
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* --- Contêiner Principal do Formulário --- */
.container_usuario {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    box-sizing: border-box;
}

/* --- Título e Linha Horizontal --- */
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

/* --- Estilo dos Rótulos (Labels) --- */
label {
    display: block; /* Faz o rótulo ocupar uma linha inteira */
    font-weight: 600;
    margin-bottom: 8px; /* Espaço entre o rótulo e o campo de input */
    color: #606770;
}

/* --- Estilo Geral para todos os Campos de Input --- */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="number"],
input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px; /* Espaçamento que substitui os <br> */
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box; /* Garante que padding não afete a largura final */
    font-size: 1rem;
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

/* --- Efeito de Foco nos Inputs --- */
input:focus {
    outline: none;
    border-color: #007bff; /* Cor azul ao focar */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
}

/* --- Estilo para o Input de Arquivo (básico) --- */
input[type="file"] {
    padding: 8px;
    background-color: #f9f9f9;
}

/* --- Botão de Envio --- */
button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #28a745; /* Cor verde para ação de salvar */
    color: white;
    font-size: 1.1rem;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}

button[type="submit"]:hover {
    background-color: #218838; /* Verde mais escuro no hover */
}
</style>