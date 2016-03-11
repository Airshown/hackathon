  <link rel="stylesheet" media="all" href="vue/backoffice/jquery-jvectormap.css"/>
   <link href="vue/backoffice/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
		
		
  <script src="vue/backoffice/assets/jquery-1.8.2.js"></script>
  <script src="vue/backoffice/jquery-jvectormap.js"></script>
  <script src="vue/backoffice/lib/jquery-mousewheel.js"></script>

  <script src="vue/backoffice/src/jvectormap.js"></script>

  <script src="vue/backoffice/src/abstract-element.js"></script>
  <script src="vue/backoffice/src/abstract-canvas-element.js"></script>
  <script src="vue/backoffice/src/abstract-shape-element.js"></script>

  <script src="vue/backoffice/src/svg-element.js"></script>
  <script src="vue/backoffice/src/svg-group-element.js"></script>
  <script src="vue/backoffice/src/svg-canvas-element.js"></script>
  <script src="vue/backoffice/src/svg-shape-element.js"></script>
  <script src="vue/backoffice/src/svg-path-element.js"></script>
  <script src="vue/backoffice/src/svg-circle-element.js"></script>
  <script src="vue/backoffice/src/svg-image-element.js"></script>
  <script src="vue/backoffice/src/svg-text-element.js"></script>

  <script src="vue/backoffice/src/vml-element.js"></script>
  <script src="vue/backoffice/src/vml-group-element.js"></script>
  <script src="vue/backoffice/src/vml-canvas-element.js"></script>
  <script src="vue/backoffice/src/vml-shape-element.js"></script>
  <script src="vue/backoffice/src/vml-path-element.js"></script>
  <script src="vue/backoffice/src/vml-circle-element.js"></script>
  <script src="vue/backoffice/src/vml-image-element.js"></script>

  <script src="vue/backoffice/src/map-object.js"></script>
  <script src="vue/backoffice/src/region.js"></script>
  <script src="vue/backoffice/src/marker.js"></script>

  <script src="vue/backoffice/src/vector-canvas.js"></script>
  <script src="vue/backoffice/src/simple-scale.js"></script>
  <script src="vue/backoffice/src/ordinal-scale.js"></script>
  <script src="vue/backoffice/src/numeric-scale.js"></script>
  <script src="vue/backoffice/src/color-scale.js"></script>
  <script src="vue/backoffice/src/legend.js"></script>
  <script src="vue/backoffice/src/data-series.js"></script>
  <script src="vue/backoffice/src/proj.js"></script>
  <script src="vue/backoffice/src/map.js"></script>

	  	<script src="vue/backoffice/assets/mymap.js"></script>
		<script src="vue/backoffice/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vue/backoffice/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.js"></script>
		
		
  <script>
    $(function(){
		
 	$('#cerclePiscine').click(function(){
		swal({ html:true, title:'Activite Piscine', text:'Nombre d\'utilisateurs : <?php echo $tauxPiscine[0]["tauxpositif"]; ?>\nPourcentage d\'utilisateurs satisfaits : <?php echo round($tauxPiscineSatisfait[0]["tauxpositif"]*100); ?>'});
	});
	
	$('#cercleRestaurant').click(function(){
		swal({ html:true, title:'Activite Restaurant', text:'Nombre d\'utilisateurs : <?php echo $tauxRestaurant[0]["tauxpositif"]; ?>\nPourcentage d\'utilisateurs satisfaits : <?php echo round($tauxRestaurantSatisfait[0]["tauxpositif"]*100); ?>'});
	});
	
	$('#cerclePetitDejeuner').click(function(){
		swal({ html:true, title:'Activite Petit Dejeuner', text:'Nombre d\'utilisateurs : <?php echo $tauxPetitDejeuner[0]["tauxpositif"]; ?>\nPourcentage d\'utilisateurs satisfaits : <?php echo round($tauxPetitDejeunerSatisfait[0]["tauxpositif"]*100); ?>'});
	});
	
	$('#cercleReveil').click(function(){
		swal({ html:true, title:'Activite Reveil', text:'Nombre d\'utilisateurs : <?php echo $tauxReveil[0]["tauxpositif"]; ?>\nPourcentage d\'utilisateurs satisfaits : <?php echo round($tauxReveilSatisfait[0]["tauxpositif"]*100); ?>'});
	});
	
	$('#cercleSoutenance').click(function(){
		swal({ html:true, title:'Activite Soutenance', text:'Nombre d\'utilisateurs : <?php echo $tauxSoutenance[0]["tauxpositif"]; ?>\nPourcentage d\'utilisateurs satisfaits : <?php echo round($tauxSoutenanceSatisfait[0]["tauxpositif"]*100); ?>'});
	});

      var map = new jvm.Map({
        container: $('.map'),
        map: 'map',

       
        onViewportChange: function(e, scale, transX, transY){
            console.log('viewportChange', scale, transX, transY);
        }
      });
     
    });
		
			
  </script>
  <style>
    ul {
      padding: 0;
      list-style: none;
    }

    .jvectormap-legend .jvectormap-legend-tick-sample {
      height: 26px;
    }

    .jvectormap-legend-icons {
      background: white;
      border: black 1px solid;
    }

    .jvectormap-legend-icons {
      color: black;
    }
	
	#cerclePiscine{
		z-index:10;
		position: absolute;
		width:40px;
		height: 40px;
		margin-top: -200px;
		margin-left: 580px;
		background-image:url('vue/backoffice/img/pastille-lieu.png');
		background-size: 40px 40px;
	}
	
	#cerclePiscine span {
		<?php if ($tauxPiscine[0]["tauxpositif"] < 9): ?>margin-left: 17px;<?php else: ?>margin-left: 15px;<?php endif; ?>
		margin-top: 10px;
		position: absolute;
		color: #FAFAFA;
		font-weight: 700;
	}
	
	#cercleRestaurant{
		z-index:10;
		position: absolute;
		width:40px;
		height: 40px;
		margin-top: -200px;
		margin-left: 440px;
		background-image:url('vue/backoffice/img/pastille-lieu.png');
		background-size: 40px 40px;
	}
	
	#cercleRestaurant span {
		<?php if ($tauxRestaurant[0]["tauxpositif"] < 9): ?>margin-left: 17px;<?php else: ?>margin-left: 15px;<?php endif; ?>
		margin-top: 10px;
		position: absolute;
		color: #FAFAFA;
		font-weight: 700;
	}
	
	#cerclePetitDejeuner{
		z-index:10;
		position: absolute;
		width:40px;
		height: 40px;
		margin-top: -205px;
		margin-left: 65px;
		background-image:url('vue/backoffice/img/pastille-lieu.png');
		background-size: 40px 40px;
	}
	
	#cerclePetitDejeuner span {
		<?php if ($tauxPetitDejeuner[0]["tauxpositif"] < 9): ?>margin-left: 17px;<?php else: ?>margin-left: 15px;<?php endif; ?>
		margin-top: 10px;
		position: absolute;
		color: #FAFAFA;
		font-weight: 700;
	}
	
	#cercleReveil{
		z-index:10;
		position: absolute;
		width:40px;
		height: 40px;
		margin-top: -400px;
		margin-left: 500px;
		background-image:url('vue/backoffice/img/pastille-lieu.png');
		background-size: 40px 40px;
	}
	
	#cercleReveil span {
		<?php if ($tauxReveil[0]["tauxpositif"] < 9): ?>margin-left: 17px;<?php else: ?>margin-left: 15px;<?php endif; ?>
		margin-top: 10px;
		position: absolute;
		color: #FAFAFA;
		font-weight: 700;
	}
	
	#cercleSoutenance{
		z-index:10;
		position: absolute;
		width:40px;
		height: 40px;
		margin-top: -435px;
		background-image:url('vue/backoffice/img/pastille-lieu.png');
		background-size: 40px 40px;
	}
	
	#cercleSoutenance span {
		<?php if ($tauxSoutenance[0]["tauxpositif"] < 9): ?>margin-left: 17px;<?php else: ?>margin-left: 15px;<?php endif; ?>
		margin-top: 10px;
		position: absolute;
		color: #FAFAFA;
		font-weight: 700;
	}
	a {
		text-decoration: none;
		color: #FAFAFA;
	}
	
  </style>
  <section id="content">
                <div class="container">
 <div class="map" style="width: 800px; height: 500px"></div>
		<?php if ($tauxPiscine[0]["tauxpositif"] != "" && $tauxPiscine[0]["tauxpositif"] != 0): ?>
 		<div id="cerclePiscine">
			<span><a href="#" id="sa-cerclePiscine"><?php echo round($tauxPiscine[0]["tauxpositif"]); ?></a></span>
		</div>
		<?php endif; ?>
		<?php if ($tauxRestaurant[0]["tauxpositif"] != "" && $tauxRestaurant[0]["tauxpositif"] != 0): ?>
		<div id="cercleRestaurant">
			<span><a href="#" id="sa-cerclePiscine"><?php echo round($tauxRestaurant[0]["tauxpositif"]); ?></a></span>
		</div>
		<?php endif; ?>
		<?php if ($tauxPetitDejeuner[0]["tauxpositif"] != "" && $tauxPetitDejeuner[0]["tauxpositif"] != 0): ?>
		<div id="cerclePetitDejeuner">
			<span><a href="#" id="sa-cerclePiscine"><?php echo round($tauxPetitDejeuner[0]["tauxpositif"]); ?></a></span>
		</div>
		<?php endif; ?>
		<?php if ($tauxReveil[0]["tauxpositif"] != "" && $tauxReveil[0]["tauxpositif"] != 0): ?>
		<div id="cercleReveil">
			<span><a href="#" id="sa-cerclePiscine"><?php echo round($tauxReveil[0]["tauxpositif"]); ?></a></span>
		</div>
		<?php endif; ?>
		<?php if ($tauxSoutenance[0]["tauxpositif"] != "" && $tauxSoutenance[0]["tauxpositif"] != 0): ?>
		<div id="cercleSoutenance">
			<span><a href="#" id="sa-cerclePiscine"><?php echo round($tauxSoutenance[0]["tauxpositif"]); ?></a></span>
		</div>
		<?php endif; ?>
</section>

 
  
  