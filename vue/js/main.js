jQuery(document).ready(function($){

	// Masque la barre internet sur mobile
	window.scrollTo(0, 1);

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
				http.open("POST", "http://www.coteauto.net/ajax/popup/smile", true);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function() {
					if(http.readyState == 4 && http.status == 200) {
						if (http.responseText != ""){
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
					http.open("POST", "http://www.coteauto.net/ajax/popup/sad", true);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function() {
						if(http.readyState == 4 && http.status == 200) {
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

	setTimeout(function(){
		document.getElementById("popupJs").style.visibility = "visible";
		 }, 3000);



});
