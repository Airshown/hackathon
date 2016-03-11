<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Visit By Best Western Admin</title>

        <!-- Vendor CSS -->
        <link href="vue/backoffice/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="vue/backoffice/css/app.min.1.css" rel="stylesheet">
        <link href="vue/backoffice/css/app.min.2.css" rel="stylesheet">
        <style type="text/css">
          /*Modifications Front login Ludo*/
          body.login-content:before {
            background: #021f65;
            background-image: url('../../img/logo-apple.png');
            background-repeat: no-repeat;
            background-position: top center;
          }
        </style>
    </head>

    <body class="login-content">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
		<form name="form1" method="post" action="http://www.coteauto.net/front/login">
		<input type="hidden" name="envoyer" value="oui">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
            </div>

            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
            </div>

            <div class="clearfix"></div>

            <a href="#" onclick="document.forms['form1'].submit();" class="btn btn-login btn-success btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>
			</form>

            <ul class="login-navigation">
                <li data-block="#l-register" class="bgm-orange">S'enregistrer</li>
            </ul>
        </div>

        <!-- Register -->
        <div class="lc-block" id="l-register">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" name="prenom" class="form-control" placeholder="Prenom">
                </div>
            </div>

			<div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                </div>
            </div>

            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                <div class="fg-line">
                    <input type="text" name="email" class="form-control" placeholder="Adresse Email">
                </div>
            </div>

            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                <div class="fg-line">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                </div>
            </div>

            <div class="clearfix"></div>



            <a href="" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">Connexion</li>
            </ul>
        </div>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->
        <script src="vue/backoffice/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="vue/backoffice/vendors/bower_components/Waves/dist/waves.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="vue/backoffice/js/functions.js"></script>

    </body>
</html>
