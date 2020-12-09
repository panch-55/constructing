$("nav#navbarSupportedContent ul li a").click(function(e){

	e.preventDefault();
	var href = $(this).attr("href");

	$(href).animatescroll({
		scrollSpeed:2000,
		easing:"easeOutBounce"
	});

});

$.scrollUp({

	scrollText:"",
	scrollSpeed: 1500,
	easingType: "easeOutBounce"

});