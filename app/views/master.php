<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <div id="header"> 
        <?php require "partials/header.php"; ?>
    </div>
    <div class="container">
        <?php  require VIEWS.$view;  ?>
    </div>
</body>
</html>