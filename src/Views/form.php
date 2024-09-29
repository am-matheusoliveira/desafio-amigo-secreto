<?php include 'header.php'; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> <?= htmlspecialchars($_GET['error']); ?>
    </div>
<?php endif; ?>

<div class="row d-flex justify-content-between align-items-center my-2">
    
    <div class="col-auto">
        <a href="index.php" class="shadow-none btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i> Retornar
        </a>
    </div>

    <div class="col-md-10">
        <h1><?= isset($pessoa) ? 'Editar Pessoa' : 'Adicionar Pessoa' ?></h1>
    </div>
    
</div>

<form action="<?= isset($pessoa) ? '?action=update&id=' . $pessoa->id : '?action=store' ?>" method="POST" class="requires-validation" novalidate>
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="shadow-none form-control" id="nome" name="nome" value="<?= isset($pessoa) ? $pessoa->nome : (isset($_GET['nome']) ? $_GET['nome'] : '') ?>" required>

        <div class="valid-feedback">Nome corretamente preenchido!</div>
        <div class="invalid-feedback">Por favor, preencha seu nome!</div>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="shadow-none form-control" id="email" name="email" value="<?= isset($pessoa) ? $pessoa->email : (isset($_GET['email']) ? $_GET['email'] : '') ?>" required>
        
        <div class="valid-feedback">E-mail corretamente preenchido!</div>
        <div class="invalid-feedback">Por favor, preencha seu e-mail!</div>
    </div>
    
    <button type="submit" class="shadow-none btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Salvar</button>

</form>

<?php include 'footer.php'; ?>
