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
        <h2 class="mb-4">Add New Employee</h2>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="<?= route_to('updateEmployee', $employee['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $employee['full_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="job_position_id" class="form-label">Job Position</label>
                <select class="form-control" id="job_position_id" name="job_position_id" required>
                    <?php foreach ($job_positions as $position): ?>
                        <option value="<?= $position['id'] ?>" <?= $employee['job_position_id'] == $position['id'] ? 'selected' : '' ?>><?= $position['description'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="<?= $employee['salary'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="date_of_employment" class="form-label">Date of Employment</label>
                <input type="date" class="form-control" id="date_of_employment" name="date_of_employment" value="<?= $employee['date_of_employment'] ?>" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" <?= $employee['is_active'] ? 'checked' : '' ?>>
                <label for="is_active" class="form-check-label">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= route_to('employeeList') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
<?= $this->endSection() ?>