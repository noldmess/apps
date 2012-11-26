$(document).ready(function() {

  
   $.getJSON(OC.linkTo('facefinder', 'ajax/new_1.php'), function(data) {
           $.each(data,function(index_month,data){
	      $("#new_1").append('<div class="month"></div>');
	      $("div.month:eq("+index_month+")").append('<div class="head_line"><h1>'+data.month+'</h1><div class="ico_inline"></div></div>');
	        $("#new_1 div.month:eq("+index_month+") div.head_line").click(function() {
		  if( $(this).parent().children("div.day").is(":visible")){
		    $(this).children("div.ico_inline").removeClass().addClass("ico_down");
		    $(this).parent().children("div.day").slideUp(1000);
		  }else{
		    $(this).children("div.ico_down").removeClass().addClass("ico_inline");
		      $(this).parent().children("div.day").slideDown(1000);
		  }
		});
	       $.each(data.days,function(index_day,days){
		  $("div.month:eq("+index_month+")").append('<div class="day"><h1>'+days.day+'</h1></div>');
		  $.each(days.imags,function(index,image){
 		     $("div.month:eq("+index_month+") div.day:eq("+index_day+")").append('<img src="'+image+'"  alt="Tanzb&auml;r">');
		  });
	       });
	        });
        });

});