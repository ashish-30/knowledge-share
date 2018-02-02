jQuery(document).ready(function($){
  $(window).resize(function(){
	if ($(window).width() < 480 && $(".wdm-mobile-menu").children("#secondary").length < 1) {
	    var widgetContent=$("#left-panel .wdm-sidebar").html();
		$(".wdm-mobile-menu").append(widgetContent);
      }  
 });
  
  // var searchImg=$("#lessons_list .list-img");
  // if(){

  // }
  $('#lessons_list .list-img').each(function() {
  	if($(this).find('.wp-post-image').length > 0){
  		$(this).parent().addClass("hasImage");
  	}

  });


});