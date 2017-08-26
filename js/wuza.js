// *** G L O B A L   V A R S *** //
var keyword = new Object();
var foundTheTroll = 0; 


// *** O N L O A D   E V E N T S *** //

// hide "js is required"-infobox via js
$('.test-js').ready(function() {
    $('.test-js').hide();
});


$(document).ready(function(){
	
	// to clean on noscript if necessary
	$('body').addClass('has_js');
    
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
	
	// show cookie info
	var url = getInputValue("#url"); 
	window.cookieconsent_options = {
	  "message":"WUZA verwendet Cookies, um Deinen Besuch optimal zu gestalten. <br/>",
	  "dismiss":"Alles klar und akzeptiert!",
	  "learnMore":"Erfahre hier mehr dazu.",
	  "link":url+"view/impressum",
	  "theme":url+"css/cookieconsent.css"
	};
	
	// for intern links; just in case
	// var url = getInputValue("#url"); 
	$('a.getHard, .getHard a').each(function() {
		var href = $( this ).attr("href");
		if ((!(href.match(/^[http|#]/i))) && (typeof href != 'undefined' && href)) {
			$( this ).attr("href", url+href);
		}
	});
	
	// bubble effect
	$.each($(".bubbles"), function(){
		var bubblecount = ($(this).width()/50)*10;
		for(var i = 0; i <= bubblecount; i++) {
		   var size = ($.rnd(40,80)/10);
		   $(this).append('<span class="particle" style="top:' + $.rnd(20,80) + '%; left:' + $.rnd(0,95) + '%;width:' + size + 'px; height:' + size + 'px;animation-delay: ' + ($.rnd(0,30)/10) + 's;"></span>');
		}
	});
	
	// progress bar
	$('.skillbar').each(function(){
		$(this).find('.skillbar-bar').animate({
			width:$(this).attr('data-percent')
		},4000);
	});
	
    // ordered lists .steps => arrow animation
    var time_for_one = 1500;
    // trigger first one 
    setClassStepByStep("ol.steps li", "arrow", time_for_one);
    // add endless loop 
    setInterval(function(){
        setClassStepByStep("ol.steps li", "arrow", time_for_one);
    }, time_for_one * $("ol.steps li").length)
    
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

// checkable unordered lists
$('ul.checkable li').bind('click', function(){
	$(this).toggleClass('checked');
});


// *** F U N C T I O N S *** //

// shows/hide hints for quotes 
function changeQuoteVisibility(quote_id) {
    $('#quote_' + quote_id + '_help').slideToggle("slow");
}

// get value of a (hidden) input
function getInputValue(selector) {
	return $(selector).val();
}

// loops through elements step by step - adds and removes class
function setClassStepByStep(selector, classname, time_for_one) {
	var li_element =[];
    $(selector).each( function(index){
        li_element[index] = $(this);
        setTimeout( function () {
           li_element[index].addClass(classname).delay(time_for_one).queue(function(next) {
              li_element[index].removeClass(classname);
              next();
          });
       }, index * time_for_one);
    });
}

// position for bubble effect
jQuery.rnd = function(m,n) {
      m = parseInt(m);
      n = parseInt(n);
      return Math.floor( Math.random() * (n - m + 1) ) + m;
}


