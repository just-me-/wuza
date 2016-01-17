$('.test-js').ready(function() {
    $('.test-js').hide();
});

$(document).ready(function(){
    
    if(!($('#js').val())) {
        $.post("api.php", {"js": "1", "action": "setJS"});
        $('#js').val("1");
    }
    
    $('.bxslider').bxSlider({
        auto: true,
        autoControls: false,
        speed: 500,
        captions: true
    });
});


function changeQuoteVisibility(quote_id) {
    $('#quote_' + quote_id + '_help').slideToggle("slow");
}
