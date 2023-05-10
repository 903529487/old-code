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
	
	
	$(".pro-nav button").click(function() {
				var ins = $(this).parent().index();
				$(".pro-nav-box").hide();
				$(".pro-nav-box").eq(ins).show();
				$(".pro-nav span").removeClass("pro-nav-on");
				$(this).parent().addClass("pro-nav-on");
	})
	
})
