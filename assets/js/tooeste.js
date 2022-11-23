function loadDimension(){
    $(".proportion-3x4").each(function(){
        $(this).height($(this).width()/4*3);
    });
    $(".proportion-16x9").each(function(){
        $(this).height($(this).width()/16*9);
    });
    $(".proportion-21x9").each(function(){
        $(this).height($(this).width()/21*9);
    });
    $(".proportion-3x1").each(function(){
        $(this).height($(this).width()/3*1);
    });
    $(".proportion-4x1").each(function(){
        $(this).height($(this).width()/4*1);
    });
    $(".proportion-5x1").each(function(){
        $(this).height($(this).width()/5*1);
    });
    $(".proportion-10x1").each(function(){
        $(this).height($(this).width()/10*1);
    });
    $(".square").each(function(){
        $(this).height($(this).width());
    });
    $(".height-parent").each(function(){
        $(this).height($(this).parent().height());
    });
    setTimeout(loadDimension,1000);
}
setTimeout(loadDimension);


    if ($( window ).width()<1000){
    	$("#navbarNavDropdown").hide();	
    	$("#anuncio_eventos").hide();	
    	$("#form_mobile").removeClass("d-none");	
    	$("#form_desktop").addClass("d-none");	
    }
    
    //abrir_menus
    
    $("#abrir_menus").click(function(){
    	$("#navbarNavDropdown").toggle();	
    });
    
    
    $('.carousel').each(function (){
    	$(this).carousel({
    		interval: 2000,
    		cycle: true
    	}); 
    });
    var lightbox = new SimpleLightbox({
        $items: $('.galleryItem')
    });
	




jQuery(function ($) {
    $.fn.hScroll = function (amount) {
        amount = amount || 120;
        $(this).bind("DOMMouseScroll mousewheel", function (event) {
            var oEvent = event.originalEvent, 
                direction = oEvent.detail ? oEvent.detail * -amount : oEvent.wheelDelta, 
                position = $(this).scrollLeft();
            position += direction > 0 ? -amount : amount;
			if(direction > 0){
				$(this).attr("direct","right");
			}
			else
				$(this).attr("direct","left");
            $(this).scrollLeft(position);
            event.preventDefault();
			console.log($(this).scrollLeft());
        })
    };
});



$(document).ready(function() {
    $(".box_scroll").each(function(){
        $(this).hScroll(60); // You can pass (optionally) scrolling amount
    });
});
function moveScrollBox(){
    var time=1; 
	$(".box_scroll").each(function(){
        var box_scroll=$(this);
    	var position = box_scroll.scrollLeft();
    	
    	
    	
    	if(box_scroll.attr("direct")=="left"){
    		var time=(position/20);
    		if(position >= 250){
    			position = 5;
    			box_scroll.scrollLeft(position); 
    			time=2000;
    			var first=box_scroll.find(".item").first().clone();
    			box_scroll.append( first);
    			box_scroll.find(".item").first().remove();
    		}
    		box_scroll.scrollLeft(position+(1));
    	}
    	else {
    		var time=((250-position)/20);
    		if(position == 0){
    			position = 245;
    			box_scroll.scrollLeft(position); 
    			time=2000;
    			var last=box_scroll.find(".item").last().clone();
    			box_scroll.prepend( last);
    			box_scroll.find(".item").last().remove();
    		}
    		box_scroll.scrollLeft(position-(1));
    	}
    	
	});
	setTimeout(moveScrollBox,time);
}
moveScrollBox();

