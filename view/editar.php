<?php
require_once '../controller/update.php';
require_once '../header/header.php';
?>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Editar Usuário</h4>
        </div>
        <div class="card-body">
            <form action="salvar.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>" required>

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" class="form-control" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="number" name="idade" id="idade" class="form-control" value="<?php echo htmlspecialchars($usuario['idade']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="anexo1" class="form-label">RG (Frente)</label>
                    <input type="file" name="anexo1" id="anexo1" accept=".pdf" class="form-control">
                    <?php if(!empty($usuario['anexo1'])): ?>
                        <small class="form-text text-muted">Atual: <a href="uploads/<?php echo $usuario['anexo1']; ?>" target="_blank">Ver anexo</a></small>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="anexo2" class="form-label">RG (Verso) - Manter ou substituir</label>
                    <input type="file" name="anexo2" id="anexo2" accept=".pdf" class="form-control">
                    <?php if(!empty($usuario['anexo2'])): ?>
                        <small class="form-text text-muted">Atual: <a href="uploads/<?php echo $usuario['anexo2']; ?>" target="_blank">Ver anexo</a></small>
                    <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery & Mask Plugin devem estar carregados antes deste script -->
<script>
$(document).ready(function() {
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#telefone').mask('(00) 00000-0000');
});
</script>

<?php
require_once '../footer/footer.php';
?>
