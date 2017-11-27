$(document).ready(function() {



	$('#megusta').hover( 
					function () 
					{
				$(this).css("height","90px");
				$(this).css("width", "90px");
				
					},

					function () 
					{
				$(this).css("height","70px");
				$(this).css("width", "70px");
			
		       
						});

	$('#megusta').qtip(

    					{
		 					content: { 
      			 	   					text:'Dale a me gusta! ;)'
      			  					  },

      						style: {name: 'dark', tip: true},
      						show: 'mouseover',
      						hide: 'mouseout'});

});