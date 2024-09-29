<?php include 'header.php'; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success text-center" role="alert">
        <i class="fa-regular fa-circle-check"></i> <?= htmlspecialchars($_GET['success']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> <?= htmlspecialchars($_GET['error']); ?>
    </div>
<?php endif; ?>

<h1>Amigo Secreto</h1>
<a href="?action=create" class="shadow-none btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar Pessoa</a>
<a href="?action=sorteio" class="shadow-none btn btn-success"><i class="fa-solid fa-shuffle"></i> Realizar Sorteio</a>

<form action="index.php" method="GET" class="my-2">
    <div class="form-row">    
        <div class="form-group col-md-10">        
            <label for="busca">Buscar</label>
            <input type="text" class="shadow-none form-control" id="busca" name="busca" placeholder="Digite o nome ou e-mail"  value="<?= $busca ?>">
            <small class="form-text text-muted">Você pode buscar por nome ou e-mail.</small>
        </div>
        <div class="form-group col-md-2">
            <label for="btn-busca">&nbsp;</label>
            <button type="submit" class="form-control shadow-none btn btn-primary" id="btn-busca"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
        </div>
    </div>    
</form>

<div class="container">
    <div class="row">            
        <div class="col-lg-12 mx-auto bg-white rounded shadow">
            <div class="table-wrap table-responsive mt-2">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pessoas as $pessoa): ?>
                            <tr>
                                <td><?= $pessoa->nome ?></td>
                                <td><?= $pessoa->email ?></td>
                                <td class="text-center">
                                    <a href="?action=edit&id=<?= $pessoa->id ?>"   class="shadow-none btn btn-warning btn-edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    <a href="?action=delete&id=<?= $pessoa->id ?>" class="shadow-none btn btn-danger btn-delete"><i class="fa-regular fa-trash-can"></i> Deletar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
