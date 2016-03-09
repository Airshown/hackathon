jQuery(document).ready(function($){
	var timelineBlocks = $('.cd-timeline-block'),
		offset = 0;

	//hide timeline blocks which are outside the viewport
	// hideBlocks(timelineBlocks, offset);

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



});
