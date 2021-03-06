<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSS Feed Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Config::getAssetsDir() ?>css/global.css">
    <link rel="stylesheet" href="<?php echo Config::getAssetsDir() ?>css/landing.css">
    <link rel="stylesheet" href="<?php echo Config::getAssetsDir() ?>css/form.css">
</head>
<body>
<nav>
    <div class="logo"></div>
    <ul class="menu">
        <div class="menu__item toggle"><span></span></div>
        <li class="menu__item"><a href="./?page=main" class="link link--dark"><i class="fa fa-home"></i> Home</a></li>
        <li class="menu__item"><a href="<?php echo Config::$Repo; ?>" class="link link--dark"><i class="fa fa-github"></i> Github</a></li>
    </ul>
</nav>
<div class="header">
    <h1 class="header-title">DevRSS</h1>
    <div>
        <p class="header-description">How you're an admin ? Log then !</p>
    </div>
</div>
<div class="wrapper">
    <div class="lined">
        <div class="wrapper">
            <div class="lined_item login-box">
                <form action="./?page=login" method="post">
                    <div class="user-box">
                        <h2>Login</h2>
                    </div>
                    <div class="user-box">
                        <input type="text" name="username" required="">
                        <label>Username</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required="">
                        <label>Password</label>
                    </div>
                    <div class="user-box">
                        <p class="error"><?php echo $this->getError(); ?></p>
                    </div>
                    <a>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <input type="submit" value="Log In">
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer">RSS News Site created by <a href="https://github.com/romain325">Romain OLIVIER</a> and <a href="#">Augustin LABORIE</a></footer>
</body>
</html>