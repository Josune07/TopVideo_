 // var $jQuery = $.noConflict(true);
jQuery(document).ready(function() {



  jQuery('h2>.titulo').each(function()
  {

    href = jQuery(this).attr('href');
    href = href.replace("show", "show_ajax");
   
    jQuery(this).qtip(

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

