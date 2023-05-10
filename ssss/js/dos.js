$(function() {
	var pie = $("#nav li");
	pie.hover(function() {
		$(this).find(".hidd").show();
		$(this).find(".hidd").find("a").slideDown(100);
	}, function() {
		$(this).find(".hidd").hide();
		$(this).find(".hidd").find("a").slideUp(100);

	})
	
	$(".hidd div").hover(function() {	
		$(this).find(".hidd-z").slideDown(100);

	}, function() {
		$(this).find(".hidd-z").slideUp(100);

	})


	mainnav(); //轮播图
	function mainnav() {
		var time=2000;
		var num;
		$(".mainnav").width($(".mainnav li").length * $(".mainnav li").width() + "px");
		$(".mainnav-title li").eq(5).css("border-right", "none");
		starmover();

		function starmover() {
			$(".mainnav-title li").click(function() {
				$(".mainnav").animate({
					left: -$(".mainnav li").width() * $(this).index() + "px"
				});
				$(".mainnav-title li").removeClass("mainnav-title-on");
				$(this).addClass("mainnav-title-on");
				num = $(this).index();

			})
		}

		var setH = setInterval(function() {
				setCut();
		}, time);

		$("#baer").hover(function() {
			clearInterval(setH);
		}, function() {
			setH = setInterval(function() {
				setCut();
			}, time);
		});
		function setCut(){
			if (num < $(".mainnav li").length - 1) {
					num++;
					$(".mainnav").animate({
						left: -$(".mainnav li").width() * num + "px"
					});
					$(".mainnav-title li").removeClass("mainnav-title-on");
					$(".mainnav-title li").eq(num).addClass("mainnav-title-on");
				} else {
					num = 0;
					$(".mainnav").animate({
						left: -$(".mainnav li").width() * num + "px"
					});
					$(".mainnav-title li").removeClass("mainnav-title-on");
					$(".mainnav-title li").eq(num).addClass("mainnav-title-on");
				}
		}

	}
	
	backCom();
	
	function backCom(){
		for(var i=1;i<$(".com-right li").length;i++){
			$(".com-right li").eq(2*i-1).css({
			background:"#eeeeee"
		})
		}
		
	}
})