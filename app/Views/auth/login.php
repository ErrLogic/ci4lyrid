<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('style') ?>
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .form-control {
        border-radius: 0.5rem;
    }

    .btn-primary {
        border-radius: 0.5rem;
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .form-check-label {
        font-weight: 300;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert-danger">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <div class="card p-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login to Your Account</h5>
                        <form action="<?= url_to('attemptLogin') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="username" class="form-control" id="username" name="username" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>