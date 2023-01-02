<main class="d-flex flex-column justify-content-center align-items-center min-vh-100">
    <?php
      /*  if($_GET["error"]==true){
            echo '<div class="alert alert-danger w-50" role="alert">
                    Favor de ingresar sus credenciales correctamente
                </div>';
        }*/
    ?>
    <form class="w-50 p-3 border border-dark rounded" action="<?=PUBLIC_PATH?>/login/loginpost" method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input placeholder="Type your username..." type="text" name="usernametxt" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input placeholder="Type your password..." type="password" name="userpass" class="form-control">
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
</main>

