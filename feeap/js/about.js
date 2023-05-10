flexsliderFontInit();

function flexsliderFontInit() { //初始化文字
	$(".flexslider-font li").width($(window).width())
	$(".flexslider-font ul").width($(window).width() * $(".flexslider-font li").length);
}

function anmei(i) {
	var wi = $(".flexslider-font li").width();
	$(".flexslider-font ul").animate({
		left: -wi * i + "px"
	}, 300)
}
var ins = 0;
var zt = true;
$(".flexslider").flexslider({
	slideshow: true,
	pauseOnHover: true,
	slideshowSpeed: 5000, //展示时间间隔ms
	animationSpeed: 600, //滚动时间ms
	touch: false,
	before: function() {
		if (zt) {
			if (ins < $(".flexslider-font li").length - 1) {
				ins++;
			} else {
				ins = 0;
			}
		} else {
			zt = true;
		}

		anmei(ins);
		if ($(".flex-active-slide").index() == 0) {
			tecInit();

		}
		if ($(".flex-active-slide").index() == 2) {
			$(".ab-wifi-1").css({
				left: "600px",
				bottom: "150px"
			});
		}

	},
	after: function() {
		if ($(".flex-active-slide").index() == 0) {
			tecAfter()
		} else if ($(".flex-active-slide").index() == 1) {

		} else if ($(".flex-active-slide").index() == 2) {
			$(".ab-wifi-1").animate({
				left: "542px",
				bottom: "98px"
			}, 500);
		}

	}
});

$(".flex-control-paging li").click(function() {
	ins = $(this).index();
	zt = false;
});

tecAfter();

function tecAfter() { //banner1样式
	for (var i = 1; i < 13; i++) {
		$(".banner1-" + i).css({
			transform: "translate(0,0)",
			webkitTransform: "translate(0,0)",
			mozTransform: "translate(0,0)",
			otransform: "translate(0,0)",
			opacity: "1 ",
			filter: "alpha(opacity=100)"
		});
	}
}

function tecInit() { //banner1还原样式
	$(".banner1-1").css({
		transform: "translate(-200px,-200px)",
		webkitTransform: "translate(-200px,-200px)",
		mozTransform: "translate(-200px,-200px)",
		otransform: "translate(-200px,-200px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-2").css({
		transform: "translate(200px,-200px)",
		webkitTransform: "translate(200px,-200px)",
		mozTransform: "translate(200px,-200px)",
		otransform: "translate(200px,-200px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-3").css({
		transform: "translate(2000px,0)",
		webkitTransform: "translate(2000px,0)",
		mozTransform: "translate(2000px,0)",
		otransform: "translate(2000px,0)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-4").css({
		transform: "translate(200px,0)",
		webkitTransform: "translate(200px,0)",
		mozTransform: "translate(200px,0)",
		otransform: "translate(200px,0)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-5").css({
		transform: "translate(200px,200px)",
		webkitTransform: "translate(200px,200px)",
		mozTransform: "translate(200px,200px)",
		otransform: "translate(200px,200px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-6").css({
		transform: "translate(200px,400px)",
		webkitTransform: "translate(200px,400px)",
		mozTransform: "translate(200px,400px)",
		otransform: "translate(200px,400px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-7").css({
		transform: "translate(50px,800px)",
		webkitTransform: "translate(50px,800px)",
		mozTransform: "translate(50px,800px)",
		otransform: "translate(50px,800px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-8").css({
		transform: "translate(-200px,200px)",
		webkitTransform: "translate(-200px,200px)",
		mozTransform: "translate(-200px,200px)",
		otransform: "translate(-200px,200px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-9").css({
		transform: "translate(-200px,200px)",
		webkitTransform: "translate(-200px,200px)",
		mozTransform: "translate(-200px,200px)",
		otransform: "translate(-200px,200px)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-10").css({
		transform: "translate(-400px,0)",
		webkitTransform: "translate(-400px,0)",
		mozTransform: "translate(-400px,0)",
		otransform: "translate(-400px,0)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
	$(".banner1-11").css({
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	});
}

function banner3Init() {
	$(".ab3-img-box-title").css({
		transform: "translate(400px,0)",
		webkitTransform: "translate(400px,0)",
		mozTransform: "translate(400px,0)",
		otransform: "translate(400px,0)",
		opacity: "0 ",
		filter: "alpha(opacity=0)"
	})
}

function banner3con() {
	$(".ab3-img-box-title").css({
		transform: "translate(0,0)",
		webkitTransform: "translate(0,0)",
		mozTransform: "translate(0,0)",
		otransform: "translate(0,0)",
		opacity: "1 ",
		filter: "alpha(opacity=100)"
	})
}

$(function() {
	$('#ad-nav').onePageNav();
});
scroll();

function scroll() {
	$(window).scroll(function() {

		if ($(window).scrollTop() >= 850) {
			$(".ab-main-left").css({
				position: "fixed",
				top: "80px"

			})
		} else {
			$(".ab-main-left").css({
				position: "absolute",
				top: "0px"

			})
		}
	})
}