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
    <link rel="stylesheet" href="<?php echo Config::getAssetsDir(); ?>css/form.css">
</head>
<body>
<nav>
    <div class="logo"></div>
    <ul class="menu">
        <div class="menu__item toggle"><span></span></div>
        <li class="menu__item"><a href="./?page=main" class="link link--dark"><i class="fa fa-lock"></i> Admin</a></li>
        <li class="menu__item"><a href="<?php echo Config::$Repo; ?>" class="link link--dark"><i class="fa fa-github"></i> Github</a></li>
    </ul>
</nav>
<div class="header">
    <h1 class="header-title">DevRSS, Hello again <?php echo $_SESSION["username"]."[".$_SESSION["id"]."]"; ?></h1>
    <div>
        <p class="header-description">Wonderful Admin Panel isn't it?</p>
    </div>
</div>
<div class="wrapper">
    <div class="lined">
        <div class="wrapper">
            <h3 class="section__title">Admin Settings</h3>

            <!-- Number of article in DB -->
            <div class="lined_item login-box">
                <form>
                    <div class="user-box">
                        <h2>Number of article kept in DB</h2>
                    </div>
                    <div class="user-box">
                        <input type="text" name="" required="">
                        <label>Number</label>
                    </div>
                    <a>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <input type="submit" value="Save">
                    </a>
                </form>
            </div>

            <!--
            <div class="lined_item">
                <div class="lined_meta">
                    <h4 class="lined_title">v0.5</h4>
                    <small class="changelog__date">5/10/2017</small>
                </div>
                <div class="lined_detail">
                    <ul>
                        <li>Save default md file in new folders</li>
                        <li>Ability to quick search on existing notes</li>
                    </ul>
                </div>
            </div>
            -->

        </div>
    </div>
</div>
<footer class="footer">RSS News Site created by <a href="https://github.com/romain325">Romain OLIVIER</a> and <a href="#">Augustin LABORIE</a></footer>
</body>
</html>