<?php include_once('templates/head.php') ?>
<?php include_once('templates/navbar.php') ?>
<div class="container-fluid">
    <?php if(isset($_SESSION['auth'])) : ?>
        <div class="row">
            <iframe src="/mapa" frameborder="0" width="100%" height="600px"></iframe>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Você foi deslogado.</div>
    <?php endif ?>
</div>
<?php include_once('templates/footer.php') ?>