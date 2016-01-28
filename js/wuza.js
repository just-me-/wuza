// *** G L O B A L   V A R S *** //
var keyword = new Object();
var foundTheTroll = 0; 


// *** O N L O A D   E V E N T S *** //

// hide "js is required"-infobox via js
$('.test-js').ready(function() {
    $('.test-js').hide();
});


$(document).ready(function(){
    
    // set "js is active" for directly hidding "js is required"-infobox
    if(!($('#js').val())) {
        $.post("api.php", {"js": "1", "action": "setJS"});
        $('#js').val("1");
    }
    
    // activate animated img slider
    $('.bxslider').bxSlider({
        auto: true,
        autoControls: false,
        autoHover: true,
        speed: 500,
        captions: true
    });
    
});


// for ... hmm ... what could that be..? ;-)
$( "html" ).keydown(function( event ) {
    // trol[l]
    if ( event.which == 84 || event.which == 82 || event.which == 79 || event.which == 76) {
        keyword[event.which] = 1;
    } else {
        keyword = {}; 
    }
    
    if (keyword[84] == 1 && keyword[82] == 1 && keyword[79] == 1 && keyword[76] == 1 && foundTheTroll == 0) {
		
		var $div = $('<div />').prependTo(".container");
		$div.attr('id', 'falling_titles');
		
		var $div = $('<div />').prependTo(".container");
		$div.attr('class', 'easter_egg_warning warningdiv small-padding');
		$div.html('<b>Yay!</b> - you found me! Move your mouse now... You can spin around some objects! :-)');
		
		var elements = "h1, h2, h3, .has_gravity";
		
		$( elements ).each(function() {
			
			$( this ).fadeOut(function() {
				$( this ).detach().appendTo('#falling_titles');//.show();	
			});
			
		});
		
		$( ".container" ).css( "max-height", "600px" ).css( "overflow", "hidden" );
		$( elements ).css( "padding", "0" ).css( "margin", "0" );
		
		$( elements ).promise().done(function() {
			$("p").hide("slow", function() {
				$(elements).show("slow", function() {
					$('body').jGravity({
						target: elements,
						ignoreClass: 'no_gravity',
						weight: 20,
						depth: 2,
						drag: true
					});
				});
			});
		});
		
		keyword = {};
		foundTheTroll = 1;
	}
});



// *** G E N E R A L   B I N D S *** //

// disable "blocked" links => no pagejumping
$('a.blocked').bind('click', function(){
	return false;
});



// *** F U N C T I O N S *** //

// shows/hide hints for quotes 
function changeQuoteVisibility(quote_id) {
    $('#quote_' + quote_id + '_help').slideToggle("slow");
}
