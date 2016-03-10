jQuery(document).ready(function($){

	// Masque la barre internet sur mobile
	window.scrollTo(0, 1);

	var notification;

	var openPopupOne  	= $('#openPopupOne'),
			overlay     		= $('.overlay'),
			popup       		= $('.popup'),
			closePopUpOne 	= $('#closePopUpOne'),
			smile						= $('.circl-smile'),
			sad							= $('.circl-sad'),
			footerButton		= $('.footer-button');

		// first style action
    overlay.fadeIn();
    popup.show(0, function () {
      $(this).toggleClass('oneOpen');
    });

	  smile.on('click', function() {
			// $(this).addClass('selected-box');
			overlay.fadeOut();
			popup.toggleClass('oneOpen').delay(700).promise().done(function () {
				$(this).hide();
				var http = new XMLHttpRequest();
				http.open("POST", "http://www.coteauto.net/ajax/popup/smile/"+notification, true);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function() {
					if(http.readyState == 4 && http.status == 200) {

						document.body.style.overflow = "initial";
						if (http.responseText != "") {
							//var tableau = JSON.parse(http.responseText);
						}
					}
				}
				http.send("");
			});
	  });

		sad.on('click', function () {
			overlay.fadeOut();
			popup.toggleClass('oneOpen').delay(700).promise().done(function () {
					$(this).hide();
					var http = new XMLHttpRequest();
					http.open("POST", "http://www.coteauto.net/ajax/popup/sad/"+notification, true);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function() {
						if(http.readyState == 4 && http.status == 200) {

							document.body.style.overflow = "initial";
							if (http.responseText != ""){
								//var tableau = JSON.parse(http.responseText);
							}
						}
					}
				http.send("");
			});
		});

		footerButton.on('click', function() {
			$(this).parent().toggleClass('full-bottom');

			if($('.item-menu:visible').length)
				$('.item-menu').hide();
			else
				$('.item-menu').show();
		});

	var timelineBlocks = $('.cd-timeline-block'),
		offset = 0.8;

	//hide timeline blocks which are outside the viewport
	 hideBlocks(timelineBlocks, offset);

	timelineBlocks.each(function(){
		($(this).offset().top <= $(window).scrollTop()+$(window).height() * offset) && $(this).find('.cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		offset = 0.8;
		(!window.requestAnimationFrame)
			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});


	function hideBlocks(blocks, offset) {
		blocks.each(function(){
			( $(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.cd-timeline-content').addClass('is-hidden');
		});
	}

	function showBlocks(blocks, offset) {
		blocks.each(function(){
			( $(this).offset().top <= $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
		});
	}

	 $(".cd-timeline-block a").on("click", function() {
		 if($(this).parent().find('.cd-timeline-content').hasClass('is-hidden')) {
       $(this).parent().find('.cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
		 }
		 else {
       $(this).parent().find('.cd-timeline-content').removeClass('bounce-in').addClass('is-hidden');
		 }

    });

	var newInterval = setInterval(function(){
			var http = new XMLHttpRequest();
					http.open("POST", "http://www.coteauto.net/ajax/notif/", true);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function() {
						if(http.readyState == 4 && http.status == 200) {
							if (http.responseText != ""){
								var tableau = JSON.parse(http.responseText);
								if (tableau[0]){
									if (tableau[0].id != ""){
										notification = tableau[0].id;
										document.getElementById("popupJs").style.visibility = "visible";
										document.getElementById("typeActivite").innerHTML = tableau[0].name;
										var nom = "";
										var src = "";
										switch (tableau[0].name) {
											case "Restaurant":
												nom = "red";
												src = "eat";
												break;
											case "Piscine":
												nom = "blue";
												src = "swim";
												break;
											case "Petit Dejeuner":
												nom = "orange";
												src = "coffee";
												break;
											case "Reveil":
													nom = "purple";
													src = "sleep";
													break;
											case "Petit Dejeuner":
													nom = "orange";
													break;
											case "Soutenance":
													nom = "bluecyan";
													src = "book";
											default:
										}

										document.getElementById("current-activity").addAttribute("src", "vue/img/"+src+".svg");
										document.getElementById("modifyClass").className = "cd-timeline-img centered cd-"+nom;
										document.body.style.overflow = "hidden";
									}
								}
							}
						}
					}
				http.send("");
		}, 3000);



});
