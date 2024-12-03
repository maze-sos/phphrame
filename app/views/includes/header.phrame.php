<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=ROOT?>/assets/img/favicon_io/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?=ROOT?>/assets/img/favicon_io/favicon.png" />
    <title><?=$title ?? 'Unknown'?> | <?=APP_NAME?></title>
    <meta name="description" content="<?=APP_DESC?>">
    <meta name="author" content="<?=APP_AUTHOR?>">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="<?=ROOT?>">Home</a>
            <a href="<?=ROOT?>/login">Login</a>
            <a href="<?=ROOT?>/signup">Signup</a>
            <a href="<?=ROOT?>/dashboard">Dashboard</a>
        </nav>
    </header>
    <main>
