<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, user-scalable=no" >
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="transparent" />

        <!-- Icons pack -->
        <link rel="apple-touch-icon" sizes="57x57" href="vue/img/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="vue/img/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="vue/img/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="vue/img/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="vue/img/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="vue/img/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="vue/img/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="vue/img/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="vue/img/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="vue/img/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="vue/img/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="vue/img/icons/favicon-16x16.png">

        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="vue/img/icons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>Visit by Best Western Admin</title>

        <!-- Vendor CSS -->
        <link href="vue/backoffice/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="vue/backoffice/css/app.min.1.css" rel="stylesheet">
        <link href="vue/backoffice/css/app.min.2.css" rel="stylesheet">

    </head>
    <body>
        <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="">Visit by Best Western Admin</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a data-toggle="dropdown" href=""><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="hidden-xs">
                                    <a data-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Se déconnecter</a>
                                </li>
                                <li>
                                    <a data-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> Besoin d'aide</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>


            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                    <input type="text">
                </div>
            </div>
        </header>

        <section id="main" data-layout="layout-1">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="">
                        <div class="profile-pic">
                            <img src="vue/backoffice/img/profile-pics/1.jpg" alt="">
                        </div>

                        <div class="profile-info">
                            <?php echo $_SESSION['nomUtilisateur']; ?>

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="http://www.coteauto.net/backoffice/profil"><i class="zmdi zmdi-account"></i> Mes informations</a>
                        </li>
                        <li>
                            <a href="http://www.coteauto.net/logout"><i class="zmdi zmdi-time-restore"></i> Deconnexion</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li <?php if ($_SERVER['REQUEST_URI'] == "/backoffice/index") echo "class=\"active\""; ?>>
                        <a href="http://www.coteauto.net/backoffice/index"><i class="zmdi zmdi-home"></i> Accueil</a>
                    </li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == "/backoffice/notification") echo "class=\"active\""; ?>><a href="http://www.coteauto.net/backoffice/notification"><i class="zmdi zmdi-format-underlined"></i> Notification</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == "/backoffice/map") echo "class=\"active\""; ?>><a href="http://www.coteauto.net/backoffice/map"><i class="zmdi zmdi-format-underlined"></i> Carte des Utilisateurs</a></li>
                </ul>
            </aside>

            <?php
			include("vue/".$controller."/".$action.".php");
			?>

        <footer id="footer">
            Copyright &copy; 2016 Best Western BackOffice

            <ul class="f-menu">
                <li><a href="http://www.coteauto.net/backoffice/index">Accueil</a></li>
                <li><a href="http://www.coteauto.net/backoffice/notification">Notifications</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Chargement...</p>
            </div>
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
                                <img src="vue/backoffice/img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="vue/backoffice/img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="vue/backoffice/img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="vue/backoffice/img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="vue/backoffice/img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->

		  <!-- Javascript Libraries -->
        <script src="vue/backoffice/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vue/backoffice/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="vue/backoffice/vendors/bootgrid/jquery.bootgrid.updated.js"></script>

        <script src="vue/backoffice/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="vue/backoffice/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="vue/backoffice/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="vue/backoffice/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="vue/backoffice/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="vue/backoffice/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vue/backoffice/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vue/backoffice/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="vue/backoffice/js/flot-charts/curved-line-chart.js"></script>
        <script src="vue/backoffice/js/flot-charts/line-chart.js"></script>
        <script src="vue/backoffice/js/charts.js"></script>

        <script src="vue/backoffice/js/charts.js"></script>
        <script src="vue/backoffice/js/functions.js"></script>
        <script src="vue/backoffice/js/demo.js" class="<?php echo $_SESSION['nomUtilisateur']; ?>" id="ouehr"></script>
<script type="text/javascript">
            $(document).ready(function(){
				<?php foreach($tableau as $key => $value): ?>
					$('#boutton_<?php echo $value["id"]; ?>').click(function(){
						swal({ html:true, title:'Activite Piscine', text:'zefzef'});
					});
				<?php endforeach; ?>
				
                //Basic Example
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                });

                //Selection
                $("#data-table-selection").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    selection: true,
                    multiSelect: true,
                    rowSelect: true,
                    keepSelection: true
                });

                //Command Buttons
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    }
                    }
                });
            });
			
        </script>

    </body>
  </html>
