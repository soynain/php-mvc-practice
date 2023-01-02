<main class="container-fluid">
    <header class="h2 text-center">Edit product</header>
    <form action="<?=PUBLIC_PATH?>/dashboard/editprod" method="POST">
        <?php include_once "productinputs.view.php"; ?>
        <div class="mb-3">
            <input class="btn btn-primary w-100" type="submit" value="Registrar nuevo producto">
        </div>
    </form>
</main>