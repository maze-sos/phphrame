<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?? 'Unknown'?> | <?=APP_NAME?></title>
    <meta name="description" content="<?=APP_DESC?>">
    <meta name="author" content="<?=APP_AUTHOR?>">
    <link rel="icon" href="<?=ROOT?>/assets/img/favicon_io/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?=ROOT?>/assets/img/favicon_io/favicon.png" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/404.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@300;500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</head>

<body>

<div class="centered">
    <div class="error-container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! The page you’re looking for doesn’t exist.</p>
        <a href="<?=ROOT?>" class="button">Go Back Home</a>
    </div>
</div>

</body>

</html>
