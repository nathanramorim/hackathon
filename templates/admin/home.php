<?php include_once('templates/head.php') ?>
<?php include_once('templates/navbar.php') ?>
<div class="container-fluid">
<style>
#map {
        height: 90vh;
      }
</style>
    <?php if(isset($_SESSION['auth'])) : ?>
        <div class="row">
            <div class="col-md-12" id="map"></div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Você foi deslogado.</div>
    <?php endif ?>
</div>
<?php include_once('templates/footer.php') ?>