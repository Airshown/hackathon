  <link rel="stylesheet" media="all" href="vue/backoffice/jquery-jvectormap.css"/>
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
  <script>
    $(function(){
 

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
	#moncercle{
		z-index:9999;
	  	width:40px;
	  	height:40px;
	}
	
  </style>
  <section id="content">
                <div class="container">
 <div class="map" style="width: 800px; height: 500px"></div>
 	
		<img src="vue/backoffice/img/pastille-lieu.png" id="moncercle">
		</div>
</section>

 
  
  