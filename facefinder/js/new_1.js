$(document).ready(function() {
	$('#photoview').hide();
   $.getJSON(OC.linkTo('facefinder', 'ajax/new_1.php'), function(data) {
	   		//Create the year divs 
	   		$.each(data,function(index_year,data){
	   		  $("#new_1").append('<div class="year"></div>');
	   		 $("div.year:eq("+index_year+")").append('<div class="head_line"><div class="title_head">'+data.year+'</div><div class="ico_inline"></div></div>');
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
	   			$("#new_1 div.year:eq("+index_year+") div.month:eq("+index_month+")").append('<div class="head_line"><div class="title_head">'+data.month+'</div><div class="ico_inline"></div></div>');
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
	    	   $.each(days.imags,function(index,image){//<a  ><a href="/owncloud/?app=gallery&getfile=ajax%2FviewImage.php?img=%252F'+image+'" title="'+image+'" rel="images"></a>
	    		   	$("#new_1 div.year:eq("+index_year+") div.month:eq("+index_month+") div.day:eq("+index_day+")").append('<a><img src="'+image.imagstmp+'"  alt="'+image.imagsname+'"></a>');
	    	   });
	       });
	        });
	   		});;
        });
   






$('div.day a img ').click(function(event){
	
	 //event.preventDefault(); 
	//alert('sdfsdf');				$('#photoview img').hide();
			//$('#new_2 img').attr("src", 'http://localhost/owncloud/?app=gallery&getfile=ajax%2FviewImage.php?img=CSC_0733.JPG');//+this.alt);
			$('#photoview img').hide();
			$('#photoview img').attr("src", 'http://localhost/owncloud/?app=gallery&getfile=ajax%2FviewImage.php?img='+this.alt);
			/*$('#photoview img').load(function(){
				$('#photo').append('<p>dsfsdfsdfsd</p>');
			});*/
			
			$('#photoview img').ready(function(){
				$('#photo p').remove(":contains('dsfsdfsdfsd')");
				$('#photoview img').show();
			});
			$('#new_1').hide();
			$('#photoview').show();
			
			
		

});
$('div.tool_title').click(function(){
	if( $(this).parent().children("div.tool_items").is(":visible")){
		$(this).parent().children("div.tool_items").slideUp(500);
	}else{
		$(this).parent().children("div.tool_items").slideDown(500);
	}
});

$(document).keypress(function(e) { 
$('#photoview').hide();
$('#new_1').show();
});
   });
