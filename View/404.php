<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSS Feed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Config::getAssetsDir(); ?>css/global.css">
    <link rel="stylesheet" href="<?php echo Config::getAssetsDir(); ?>css/landing.css">
</head>
<body>
<nav>
    <div class="logo"><a href="./?page=main"></a></div>
    <ul class="menu">
        <li class="menu__item"><a href="./?page=main" class="link link--dark"><i class="fa fa-home"></i> Home</a></li>
        <li class="menu__item"><a href="<?php echo Config::$Repo; ?>" class="link link--dark"><i class="fa fa-github"></i> Github</a></li>
    </ul>
</nav>
<div class="header">
    <h1 class="header-title">404 !</h1>
    <div>
        <p class="header-description">Hey buddy, are you lost?</p>
    </div>
</div>
<footer class="footer">RSS News Site created by <a href="https://github.com/romain325">Romain OLIVIER</a> and <a href="#">Augustin LABORIE</a></footer>
</body>
</html>