<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- fim links -->
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/slideBar.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/products.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/clientes.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/body.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/recuperar.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/sistema.css">
    <link rel="shortcut icon" href="/assets/images/faviconImg.ico" type="image/x-icon">
    <!-- fim css -->

    <title>
        <?php echo $title ?>
    </title>
</head>

<body>
    
    <!-- JS -->
    <script src="/scripts/nav-link.js"></script>

    <script src="/scripts/produt-modal.js"></script>
    <!-- FIM JS -->
    <?php if ($_SERVER['REQUEST_URI'] !== "/"): ?>
        <div id="header">
            <?php require "partials/header.php"; ?>
        </div>
    <?php endif; ?>
    <?php require VIEWS . $view; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

</html>