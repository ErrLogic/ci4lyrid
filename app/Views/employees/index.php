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
            <h2>Employee Management</h2>
            <a href="<?= route_to('createEmployee') ?>" class="btn btn-primary mb-3">Add New Employee</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Job Position</th>
                        <th>Salary</th>
                        <th>Date of Employment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?= $employee['id'] ?></td>
                            <td><?= $employee['full_name'] ?></td>
                            <td><?= $employee['job_position_id'] ?></td>
                            <td><?= $employee['salary'] ?></td>
                            <td><?= $employee['date_of_employment'] ?></td>
                            <td><?= $employee['is_active'] ? 'Active' : 'Inactive' ?></td>
                            <td>
                                <a href="<?= route_to('editEmployee', $employee['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= url_to('deleteEmployee', $employee['id']) ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
<?= $this->endSection() ?>