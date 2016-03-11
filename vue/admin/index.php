   <link href="vue/backoffice/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">   
  <script src="vue/backoffice/assets/jquery-1.8.2.js"></script>
		<script src="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vue/backoffice/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.js"></script>

  
  
		  
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
					$sql = new bdd;			
					$resultat = $sql->requete("SELECT AVG(REPLACE(type,'smile', '1')) as tauxpositif FROM feeling where feeling.user = '".$value["id"]."'");
					$resultat2 = $sql->requete("SELECT COUNT(*) as tauxpositif FROM feeling where feeling.user = '".$value["id"]."'");

?>
                               <tr>
                                    <td><?php echo $value["id"]; ?></td>
                                    <td><?php echo $value["nom"] ?> <?php echo $value["prenom"]; ?></td>
                                    <td><?php echo $date_debut ?> au <?php echo $date_fin; ?></td>
									<td><button type="button" class="btn btn-icon command-edit waves-effect waves-circle" id="boutton_<?php echo $value["id"]; ?>" onclick="swal({ html:true, title:'<?php echo $value["nom"]." ".$value["prenom"]; ?>', text:'Taux de satisfaction : <?php echo count($resultat[0]["tauxpositif"]*100); ?>\nNombre d\'avis : <?php echo $resultat2[0]["tauxpositif"]; ?>'});"><span class="zmdi zmdi-edit"></span></button></td>
                                </tr>
								<?php 
								unset($sql);
								unset($resultat);
								unset($resultat2);
								endforeach; ?>
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