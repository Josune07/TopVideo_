$(document).ready(function() {



  $('h2>.titulo').each(function()
  {

    href = $(this).attr('href');
    href = href.replace("show", "show_ajax");
   
    $(this).qtip(

    {
		 content: { 
      			 	   url:href,
      			       method: 'GET'
		           },

      style: {name: 'dark', tip: true},
      show: 'mouseover',
      hide: 'mouseout'});

});





});

