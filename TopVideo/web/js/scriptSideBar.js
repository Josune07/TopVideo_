$(document).ready(function() {



$("a").hover(
		function () {
		        $(this).css("color",  " #1abc9c" );
		}, 
		function () {
			$(this).css("color", " #610B38");
		}
	);


$(".navigation>li>a").hover(
		function () {
		        $(this).css("color",  "#fadbd8" );
		}, 
		function () {
			$(this).css("color", " #610B38");
		}
	);


});