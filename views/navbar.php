<nav class="navbar navbar-dark bg-dark">
    <div class="col-md-1">
        <div class="circle-small">
            <a href="/"><i class="fas fa-eye"></i></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="dropdown">
            <a class="dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Chamados
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="chamados/cadastrar">Cadastrar</a>
            </div>
        </div>
    </div>
   
    <div class="col-md-2 text-right text-light">
        <small class="clearfix">Olá <?php echo isset($_SESSION['user'])? $_SESSION['user'] :'' ; ?>! </small>
        <?php if(isset($_SESSION['auth'])) : ?>
            <a class="text-light" href="logout"><i class="fas fa-sign-out-alt"></i> sair</a>
        <?php endif ?>
    </div>
    
</nav>