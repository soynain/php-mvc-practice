<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Products Crud</a>
        <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?=PUBLIC_PATH?>/login/logout">Products</a>
            <a class="nav-link active" aria-current="page" href="<?=PUBLIC_PATH?>/login/logout">Cerrar sesión</a>

        </div>
    </div>
</nav>

<main class="container-fluid">
    <header class="h2 text-center">Add new product</header>
    <form action="<?=PUBLIC_PATH?>/dashboard/saveprod" method="POST">
        <?php include_once "productinputs.view.php"; ?>
        <div class="mb-3">
            <input class="btn btn-primary w-100" type="submit" value="Registrar nuevo producto">
        </div>
    </form>
</main>