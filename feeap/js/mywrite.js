$(function() {
	nav();

	function nav() { //导航
		var index = $(".nav-on").index();
		init();
		over();

		function init() { //初始化

			$("#nav-on-tom").css({
				left: index * 110 + 22 + "px"
			});
		}

		function over() { //鼠标事件
			$("#nav li").mouseover(function() {
				$("#nav-on-tom").animate({
					left: $(this).index() * 110 + 22 + "px"
				}, 100);
			});
			$("#nav ul").mouseleave(function() {
				$("#nav-on-tom").animate({
					left: index * 110 + 22 + "px"
				}, 300);
			})
		}
	}

	

	navPro(".pro-box-minbox");
	navPro(".pro-box-minbox2");

	function navPro(id) { //产品导航分页
		var leg = $(id + " div").length;
		$(id).width(leg * 220 + "px");
		var num = Math.ceil(leg / 5); //向上取整
		var kk = 1;
		$(id).parent().parent().find(".nav-right").click(function() {
			if (kk < num) {
				$(id).animate({
					left: -1000 * kk + "px"
				}, 100);
				kk++;
			}
		})
		$(id).parent().parent().find(".nav-left").click(function() {
			if (kk > 1) {
				kk--;
				$(id).animate({
					left: -1000 * (kk - 1) + "px"
				}, 100);
			}
		});
		//显示子菜单
		$("#nav li").hover(function() {
			$(this).find(".pro-box").show(100);
		}, function() {
			$(this).find(".pro-box").hide(100);
		})
	}
	Control();
	function Control() {//控制流程动画
		$(".sol-sec-1").ready(function() {
			$(".xp").addClass("xpanimate");
		});
	}

})