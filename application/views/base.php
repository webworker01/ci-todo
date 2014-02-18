<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">

        <script src="<?= base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url(); ?>">Todo List</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php if ($auth['is_admin']): ?><li><a href="<?= site_url('auth')?>">Auth</a></li><?php endif; ?>
            </ul>
            
            <?php if (!$auth['logged_in']): ?>
                <form method="post" action="<?= site_url('auth/login'); ?>" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control" name="identity">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            <?php else: ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= site_url('auth/logout'); ?>" class="navbar-right btn btn-danger">Logout</a></li>
                </ul>
            <?php endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="container">
      <?= $content; ?>
      <hr>

      <footer>
        <p>&copy; <?= safe_mailto('webworker@live.com'); ?> &mdash; <?= date('Y'); ?></p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= base_url(); ?>js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="<?= base_url(); ?>js/vendor/bootstrap.min.js"></script>

        <script src="<?= base_url(); ?>js/plugins.js"></script>
        <script src="<?= base_url(); ?>js/main.js"></script>

        <!--
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        -->
    </body>
</html>
