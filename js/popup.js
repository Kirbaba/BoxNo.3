var pu = $('#popup');
var bgpu = $('#bgpopup');

var pr = $('#prod');
var bgpr = $('#bgprod');

$(document).ready(function(){
	$("#writeus").click(function(){
		pu.fadeIn("slow");
		bgpu.fadeIn("slow");
		event.stopPropagation();
	});
	$(document).click( function(event){
		if( $(event.target).closest(pu).length ) 
	        return;
	      pu.fadeOut("slow");
	      bgpu.fadeOut("slow");
	      event.stopPropagation();
		});


    $("#zprod").click(function(){
        pr.fadeIn("slow");
        bgpr.fadeIn("slow");
        event.stopPropagation();
    });

    $(document).click( function(event){
        if( $(event.target).closest(pr).length )
            return;
        pr.fadeOut("slow");
        bgpr.fadeOut("slow");
        event.stopPropagation();
    });
});