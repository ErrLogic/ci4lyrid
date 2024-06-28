<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('style') ?>
    <link rel="stylesheet" type="text/css" href="/css/main.css" media="screen" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <?= $this->include('layouts/navbar') ?>
    
    <div class="container mt-4">
        <h1>Welcome to the Dashboard</h1>
        <p>This is a simple system just for task completion</p>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
<?= $this->endSection() ?>