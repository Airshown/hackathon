var script_tag = document.getElementById("ouehr")
var search_term = script_tag.getAttribute("class");

$(window).load(function(){
    //Welcome Message (not for login page)
    function notify(message, type){
        $.growl({
            message: message
        },{
            type: type,
            allow_dismiss: false,
            label: 'Annuler',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'top',
                align: 'right'
            },
            delay: 2500,
            animate: {
                    enter: 'animated fadeIn',
                    exit: 'animated fadeOut'
            },
            offset: {
                x: 20,
                y: 85
            }
        });
    };
    
    if (!$('.login-content')[0]) {
        notify('Bienvenue '+search_term, 'inverse');
    } 
});