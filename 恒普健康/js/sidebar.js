$(function() {

	$(".nav-but").click(function() {
		$("#sidebar").css({
			transform: "translateX(-5rem)",
			webkitTransform: "translateX(-5rem)"
		});
		$("#main").css({
			transform: "translateX(-5rem)",
			webkitTransform: "translateX(-5rem)"
		});
		$(".bas").show();
		$("body").css("overflow", "hidden");
	});
	$(".bas").click(function() {
		$("#sidebar").css({
			transform: "translateX(0rem)",
			webkitTransform: "translateX(0rem)"
		});
		$("#main").css({
			transform: "translateX(0rem)",
			webkitTransform: "translateX(0rem)"
		});
		$(".bas").hide();
		$("body").css("overflow", "auto");
	});

	//分类搜索框
	$(".search-title-dwon span").click(function() {
		if($(this).next(".search-hidee").css("display") == "none") {
			$(this).next(".search-hidee").show();
		} else {
			$(this).next(".search-hidee").hide();
		}
	});
	$(".search-hidee li").click(function() {
		var te = $(this).text();
		$(this).parent().parent().find("span").text(te);
		$(this).parent().hide();
	})
	$(document).bind("click", function(e) {
		var target = $(e.target);
		if(target.closest(".search-hidee,.search-title-dwon").length == 0) {
			$(".search-hidee").hide();
		};
		e.stopPropagation();
	})
})