<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Products Crud</a>
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="<?=PUBLIC_PATH?>/login/logout">Cerrar sesión</a>
        </div>
    </div>
</nav>
<br>
<header class="h2 text-center">List of available products</header>
<a href="<?=PUBLIC_PATH?>/dashboard/add" class="btn btn-success mb-3">Add new product</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre producto</th>
            <th>Descripción producto</th>
            <th>Precio producto</th>
            <th>Fabricante</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $urlBase=PUBLIC_PATH;
        foreach ($params as $key => $value) {
            echo "<tr>
                        <th>{$value["idProducto"]}</th>
                        <td>{$value["nombreProducto"]}</td>
                        <td>{$value["descripcionProducto"]}</td>
                        <td>{$value["precioProducto"]}</td>
                        <td>{$value["fabricante"]}</td>
                        <td>
                            <a class='btn btn-primary' href='{$urlBase}/dashboard/edit/{$value["idProducto"]}'>Edit</a>
                            <a class='btn btn-danger' href='{$urlBase}/dashboard/delete/{$value["idProducto"]}'>Delete</a>
                        </td>
                    </tr>";
        }
        ?>
    </tbody>
</table>

