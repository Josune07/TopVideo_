$(document).ready(function() {

  $(".single-item").slick({
  dots: true
});

  $('h4>.cat').each(function()
  {

    href = $(this).attr('href');
    href = href.replace("cat", "cat_ajax");
   
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