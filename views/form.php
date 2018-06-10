<?php include_once('head.php') ?>
<?php include_once('navbar.php') ?>

<div class="container mt-5">
    <?php if(isset($data['message'])) : ?>
        <div class="alert alert-success flipInX animated ">
            <?php echo $data['message'] ?>
        </div>
    <?php endif ?>
    <form id="contact-form" method="post"> 
        <div class="form-group">
            <input name="name" type="text" class="form-control" placeholder="Nome..." required>
        </div>
        <div class="form-group">
            <input name="phone" type="phone" class="form-control" placeholder="Telefone..." required>
        </div>
        <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="E-mail..." required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success form-control" value="ENVIAR">
        </div>
    </form>

</div>

<?php include_once('footer.php') ?>