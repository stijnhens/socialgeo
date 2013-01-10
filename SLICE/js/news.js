
  $(document).ready(function(){
  		    $('.newsitem > h2, .eventitem > h2').click(function() {
	        $('.newsitem > .newstxt, .eventitem > .eventtxt').slideUp('slow');
	        $(this).next().slideToggle('slow');
	        return false;
	    });          
  });
      
               
               