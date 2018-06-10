<?php include_once('head.php') ?>
<div class="container">
    <div class="circle-small mx-auto mt-5">
        <i class="fas fa-eye"></i>
    </div>
    <h6 class="text-center">COPBH</h6>
    
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <?php if(isset($flash['error'])): ?>
            <div class="alert alert-danger"><?php echo $flash['error'] ?></div>
            <?php endif ?>
            <form id="login-form" method="post"> 
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="usuário" required>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="senha" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success form-control" value="ENTRAR">
                </div>
            </form>
        </div>
    </div>
   
    

    <div class="mt-5"></div>
</div>
<?php include_once('footer.php') ?>