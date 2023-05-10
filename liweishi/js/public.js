$(function() {

		//侧栏客服搜缩
		$(".topjt").click(function() {
			if($(this).next(".hidee-box").css("display") == "none") {
				$(this).css({
					webkitTransform: "rotate(180deg)",
					mozTransform: "rotate(180deg)",
					msTransform: "rotaFte(180deg)",
					oTransform: "rotate(180deg)",
					transform: "rotate(180deg)"
				});
				$(this).next(".hidee-box").slideDown(100);
			} else {
				$(this).css({
					webkitTransform: "rotate(0deg)",
					mozTransform: "rotate(0deg)",
					msTransform: "rotate(0deg)",
					oTransform: "rotate(0deg)",
					transform: "rotate(0deg)"
				});
				$(this).next(".hidee-box").slideUp();
			}
		});
		//投诉start
		$(".suggest-but").click(function() {
			$(".suggest-box").show()
		})
		$(".close").click(function() {
			$(".suggest-box").hide()
		});
		$(".sugg-n").click(function() {
			$(".suggest-box").hide()
		});

		//投诉tab选项卡
		$(".sugg-tab-page i").click(function() {
				var ins = $(this).parent().index();
				$(".sugg-tab-page i").removeClass("sugg-tab-page-on");
				$(this).addClass("sugg-tab-page-on");
				$(".sugg-sbox").hide();
				$(".sugg-sbox").eq(ins).show();
			})
			//投诉end

	})
	//			显示苹果验证弹窗start
function showIphine() {
	if($(".iphone-box").css("display") == "none") {
		$(".iphone-box").show();
	} else {
		$(".iphone-box").hide();
	}
}
$(document).bind("click", function(e) {
		var target = $(e.target);
		if(target.closest(".iphone-box,.iphone-but").length == 0) {
			$(".iphone-box").hide();
		};
		e.stopPropagation();
	})
	//			显示苹果验证弹窗end

//分类搜索框
$(".search-title-dwon span").click(function() {
	if($(this).next(".search-hidee").css("display") == "none") {
		$(this).next(".search-hidee").slideDown(100);
	} else {
		$(this).next(".search-hidee").slideUp();
	}
});
$(".search-hidee li").click(function() {
	var te = $(this).text();
	$(this).parent().parent().find("span").text(te);
	$(this).parent().slideUp();
})
$(document).bind("click", function(e) {
	var target = $(e.target);
	if(target.closest(".search-hidee,.search-title-dwon").length == 0) {
		$(".search-hidee").slideUp();
	};
	e.stopPropagation();
})