<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>User<?= $this->endSection() ?>

<?= $this->section('style') ?>
    <link rel="stylesheet" type="text/css" href="/css/main.css" media="screen" />

    <style>
        .table .action-btn {
            width: auto;
        }

        .pill-active,
        .pill-inactive {
            padding: 0.1rem 0.4rem;
            font-size: 0.8rem;
            border-radius: 0.5rem;
            text-align: center;
            display: inline-block;
            min-width: 60px;
        }

        .pill-active {
            background-color: #28a745;
            color: #ffffff;
        }

        .pill-inactive {
            background-color: #dc3545;
            color: #ffffff;
        }

        .username-column {
            min-width: 250px;
        }

        .fullname-column {
            min-width: 450px;
        }

        .status-column, .action-column {
            max-width: 50px;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <?= $this->include('layouts/navbar') ?>
    
    <div class="container mt-4">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>User Management</h2>
            <a href="<?= url_to('createUser') ?>" class="btn btn-success">Add New User</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="fullname-column">Full Name</th>
                        <th class="username-column">Username</th>
                        <th class="status-column">Status</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users) && is_array($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['full_name']) ?></td>
                                <td><?= esc($user['username']) ?></td>
                                <td>
                                    <?php if (esc($user['is_active'])): ?>
                                        <span class="pill-active">Active</span>
                                    <?php else: ?>
                                        <span class="pill-inactive">Inactive</span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="<?= url_to('editUser', $user['id']) ?>" class="btn btn-warning btn-sm action-btn">Edit</a>
                                    <form action="<?= url_to('deleteUser', $user['id']) ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No users found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
<?= $this->endSection() ?>