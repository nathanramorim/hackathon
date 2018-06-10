<nav class="navbar navbar-dark bg-dark">
    <div class="col-md-1">
        <div class="circle-small mx-auto">
            <a href="/"><i class="fas fa-eye"></i></a>
        </div>
    </div>
    <div class="offset-md-7"></div>
    <div class="col-md-2 text-right text-light">
        <small class="clearfix">Olá <?php echo isset($_SESSION['user'])? $_SESSION['user'] :'' ; ?>! </small>

        <?php if(isset($_SESSION['auth'])) : ?>
            <a class="text-light" href="logout"><i class="fas fa-sign-out-alt"></i> sair</a>
        <?php endif ?>
    </div>
    
</nav>