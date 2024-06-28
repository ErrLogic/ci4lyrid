<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>User<?= $this->endSection() ?>

<?= $this->section('style') ?>
    <link rel="stylesheet" type="text/css" href="/css/main.css" media="screen" />

    <style>
        .form-group label {
            font-weight: bold;
        }

        .radio-label {
            margin-right: 1rem;
        }

        .submit-btn {
            margin-top: 1rem;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <?= $this->include('layouts/navbar') ?>
    
    <div class="container mt-4">
        <h2 class="mb-4">Edit User</h2>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= url_to('updateUser', $user['id']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" value="<?= esc($user['full_name']) ?>" name="full_name" placeholder="Enter full name">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>" placeholder="Enter username" disabled>
            </div>
            <div class="mb-3">
                <label for="old_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your old password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Retype password">
            </div>
            <div class="mb-3">
                <label for="retype_password" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype password">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="active" value="active" checked>
                    <label class="form-check-label radio-label" for="active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
                    <label class="form-check-label radio-label" for="inactive">Inactive</label>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                <button type="button" class="btn btn-secondary ms-2" onclick="window.history.back()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
<?= $this->endSection() ?>