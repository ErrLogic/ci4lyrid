<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Lyrid App</a>
        <div class="d-flex logout-btn">
            <span class="username"><?= session('full_name') ?></span>
            <a href="<?= url_to('logout') ?>" class="btn btn-outline-danger" type="button">Logout</a>
        </div>
    </div>
</nav>