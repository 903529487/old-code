moucn();

function moucn() {
	$(".in-moun li").hover(function() {
		for(var i = 0; i < $(".in-moun li").length; i++) {
			$(".in-moun img").eq(i).attr("src", "images/wq-" + parseInt(i + 1) + ".jpg");
		}
		$(this).find("img").attr("src", "images/wh-" + parseInt($(this).index() + 1) + ".jpg");

	}, function() {
		for(var i = 0; i < $(".in-moun li").length; i++) {
			$(".in-moun img").eq(i).attr("src", "images/wq-" + parseInt(i + 1) + ".jpg");
		}
	})
}

$(".flexslider").flexslider({
	slideshowSpeed: 6000, //展示时间间隔ms
	animationSpeed: 400, //滚动时间ms
	touch: false,
});