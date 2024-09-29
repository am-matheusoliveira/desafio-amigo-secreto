<?php include 'header.php'; ?>

<div class="row d-flex justify-content-between align-items-center my-2">
    
    <div class="col-auto">
        <a href="index.php" class="shadow-none btn-smshadow-none btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i> Retornar
        </a>
    </div>

    <div class="col-md-10">
        <h1>Resultado do Sorteio</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto bg-white rounded shadow">
        <div class="table-wrap table-responsive mt-2">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Sorteador</th>
                        <th class="text-center">Sorteou</th>
                        <th class="text-center">Sorteado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $par): ?>
                        <tr>
                            <td class="text-center"><?= $par['doador'] ?></td>
                            <td class="text-center">
                                Sorteou <i class="fa-regular fa-hand-point-right"></i>
                            </td>
                            <td class="text-center"><?= $par['recebedor'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
