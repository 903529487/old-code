$(function(){
	$(".nav-but").click(function(){
				$("#sidebar").css({
					transform: "translateX(5rem)",
   					webkitTransform: "translateX(5rem)"	
				});
				$("#main").css({
					transform: "translateX(5rem)",
   					webkitTransform: "translateX(5rem)"	
				});
				$(".bas").show();
				$("body").css("overflow","hidden");
			});
			$(".bas").click(function(){
				$("#sidebar").css({
					transform: "translateX(0rem)",
   					webkitTransform: "translateX(0rem)"	
				});
				$("#main").css({
					transform: "translateX(0rem)",
   					webkitTransform: "translateX(0rem)"	
				});
				$(".bas").hide();
				$("body").css("overflow","auto");
	});
	

	
	
})
