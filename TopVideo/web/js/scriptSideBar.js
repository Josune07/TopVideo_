$(document).ready(function() {

$(".ventanas>h3>span").hover(
		function () {
		        $(this).css("background-color",  "#fadbd8" );
		}, 
		function () {
			$(this).css("background-color", "white");
		}
	);
});