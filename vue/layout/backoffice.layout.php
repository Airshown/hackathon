<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                            Benjamin Button

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="index.html"><i class="zmdi zmdi-home"></i> Home</a>
                    </li>
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-view-compact"></i> Headers</a>

                        <ul>
                            <li><a href="textual-menu.html">Textual menu</a></li>
                            <li><a href="image-logo.html">Image logo</a></li>
                            <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                        </ul>
                    </li>
                    <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>
                </ul>
            </aside>
            
            <aside id="chat" class="sidebar c-overflow">
            
                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>

                <div class="listview">
                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="vue/backoffice/img/profile-pics/1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">David Belle</div>
                                <small class="lv-small">Last seen 3 hours ago</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="vue/backoffice/img/profile-pics/3.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                <small class="lv-small">Availble</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="vue/backoffice/img/profile-pics/4.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Glenn Jecobs</div>
                                <small class="lv-small">Availble</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="vue/backoffice/img/profile-pics/5.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Bill Phillips</div>
                                <small class="lv-small">Last seen 3 days ago</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="vue/backoffice/img/profile-pics/6.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Wendy Mitchell</div>
                                <small class="lv-small">Last seen 2 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="vue/backoffice/img/profile-pics/7.jpg" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Teena Bell Ann</div>
                                <small class="lv-small">Busy</small>
                            </div>
                        </div>
                    </a>
                </div>
            </aside>
            
            
            <section id="content">
                <div class="container">
					<div class="row">
					<div class="col-lg-8">
                     <div class="card">
                        <div class="card-header">
                            <h2>Vos clients</h2>
                        </div>
                        
                        <table id="data-table-command" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-type="numeric">ID</th>
                                    <th data-column-id="sender">Client</th>
                                    <th data-column-id="received" data-order="desc">Dates</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                                </tr>
                            </thead>
					
                            <tbody>
								<?php foreach($tableau as $key => $value): 
								sscanf($value["date_debut"], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);
								$date_debut = $jour."/".$mois."/".$an;
								sscanf($value["date_fin"], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);
								$date_fin = $jour."/".$mois."/".$an;
								


?>
                                <tr>
                                    <td><?php echo $value["id"]; ?></td>
                                    <td><?php echo $value["nom"] ?> <?php echo $value["prenom"]; ?></td>
                                    <td><?php echo $date_debut ?> au <?php echo $date_fin; ?></td>
                                </tr>
								<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
					</div>
					<div class="col-lg-4">
                            <div class="epc-item bgm-green">
                                <div class="easy-pie main-pie" data-percent="<?php echo round($tauxpositif[0]["tauxpositif"]*100); ?>">
                                    <div class="percent"><?php echo round($tauxpositif[0]["tauxpositif"]*100); ?></div>
                                    <div class="pie-title">de clients satisfaits</div>
                                </div>
                            </div>
							
							<div class="epc-item bgm-blue" style="color: white; font-size: 36px; text-align: left !important;">
                               <?php echo $nombrevisites[0]["nombre"]; ?> <span style="font-size:16px">clients sur Visit</span>
                            </div>
							
							<div class="epc-item bgm-orange" style="color: white; font-size: 24px; text-align: left !important;">
                               <i class="zmdi zmdi-pin zmdi-hc-fw"></i> <?php echo $visite[0]["name"]; ?><br><span style="font-size:16px">Lieu le plus fréquenté</span>
                            </div>
                        </div>
					</div>
                 
                </div>
            </section>
        </section>
        
        <footer id="footer">
            Copyright &copy; 2016 Administration 
            
            <ul class="f-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Contact</a></li>
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
        <script src="vue/backoffice/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>		

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
        <script src="vue/backoffice/js/demo.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
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
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            });
        </script>
        
    </body>
  </html>