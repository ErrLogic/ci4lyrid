<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
            color: #842029;
            padding: 1rem 1.5rem;
            border-radius: 0.375rem;
            position: relative;
            margin-bottom: 1rem;
        }
    </style>

    <?= $this->renderSection('style') ?>
</head>
<body>
    <?= $this->renderSection('content') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?= $this->renderSection('js') ?>
</body>
</html>