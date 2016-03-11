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
        <script src="vue/backoffice/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
		
		
  <script>
    $(function(){
		
 	$('#cerclePiscine').click(function(){
		swal("Piscine");
	});
	
	$('#cercleRestaurant').click(function(){
		swal("Restaurant");
	});
	
	$('#cerclePetitDejeuner').click(function(){
		swal("PetitDejeuner");
	});
	
	$('#cercleReveil').click(function(){
		swal("Reveil");
	});
	
	$('#cercleSoutenance').click(function(){
		swal("Soutenance");
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
		margin-left: 17px;
		margin-top: 10px;
		position: absolute;
		color: #9C9DFF;
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
		margin-left: 17px;
		margin-top: 10px;
		position: absolute;
		color: #9C9DFF;
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
		margin-left: 17px;
		margin-top: 10px;
		position: absolute;
		color: #9C9DFF;
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
		margin-left: 17px;
		margin-top: 10px;
		position: absolute;
		color: #9C9DFF;
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
		margin-left: 17px;
		margin-top: 10px;
		position: absolute;
		color: #9C9DFF;
		font-weight: 700;
	}
	
  </style>
  <section id="content">
                <div class="container">
 <div class="map" style="width: 800px; height: 500px"></div>
 
 		<div id="cerclePiscine">
			<span><a href="#" id="sa-cerclePiscine">3</a></span>
		</div>
		
		<div id="cercleRestaurant">
			<span><a href="#" id="sa-cerclePiscine">3</a></span>
		</div>
		
		<div id="cerclePetitDejeuner">
			<span><a href="#" id="sa-cerclePiscine">3</a></span>
		</div>
		
		<div id="cercleReveil">
			<span><a href="#" id="sa-cerclePiscine">3</a></span>
		</div>
		
		<div id="cercleSoutenance">
			<span><a href="#" id="sa-cerclePiscine">3</a></span>
		</div>
		
		
		
</section>

 
  
  