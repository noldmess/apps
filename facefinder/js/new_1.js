$(document).ready(function() {
   $.getJSON(OC.linkTo('facefinder', 'ajax/new_1.php'), function(data) {
	   		//Create the year divs 
	   		$.each(data,function(index_year,data){
	   		  $("#new_1").append('<div class="year"></div>');
	   		 $("div.year:eq("+index_year+")").append('<div class="head_line"><h1>'+data.year+'</h1><div class="ico_inline"></div></div>');
	   		$("#new_1 div.year:eq("+index_year+")  div.head_line").click(function() {
	  			if( $(this).parent().children("div.month").is(":visible")){
	  				$(this).children("div.ico_inline").removeClass().addClass("ico_down");
	  				$(this).parent().children("div.month").slideUp(500);
	  			}else{
	  				$(this).children("div.ico_down").removeClass().addClass("ico_inline");
	  				$(this).parent().children("div.month").slideDown(500);
	  			}
	  	});
	   		$.each(data.month,function(index_month,data){
	   			$("#new_1 div.year:eq("+index_year+")").append('<div class="month"></div>');
	   			$("#new_1 div.year:eq("+index_year+") div.month:eq("+index_month+")").append('<div class="head_line"><h1>'+data.month+'</h1><div class="ico_inline"></div></div>');
        	  	$("#new_1 div.year:eq("+index_year+") div.month:eq("+index_month+") div.head_line").click(function() {
        	  			if( $(this).parent().children("div.day").is(":visible")){
        	  				$(this).children("div.ico_inline").removeClass().addClass("ico_down");
        	  				$(this).parent().children("div.day").slideUp(500);
        	  			}else{
        	  				$(this).children("div.ico_down").removeClass().addClass("ico_inline");
        	  				$(this).parent().children("div.day").slideDown(500);
        	  			}
        	  	});
	      $.each(data.days,function(index_day,days){
	    	   $("#new_1 div.year:eq("+index_year+") div.month:eq("+index_month+")").append('<div class="day"><h1>'+days.day+'</h1></div>');
	    	   $.each(days.imags,function(index,image){
	    		   	$("#new_1 div.year:eq("+index_year+") div.month:eq("+index_month+") div.day:eq("+index_day+")").append('<img src="'+image+'"  alt="Tanzb&auml;r">');
	    	   });
	       });
	        });
	   		});;
        });
   });
