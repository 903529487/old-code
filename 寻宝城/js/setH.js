setH();
$(window).resize(function() {
	setH();
});

function setH() {
	var h = $(window).height();
	var w = document.documentElement.clientWidth / 10;
	$(".tre-box").height(h - w * 1.5);
}



window.onload = function() {
	spark();

};

function spark(){  //闪光
	var zt = true;
	var dtime = setInterval(function() {
		skd();
	}, 300);

	function skd() {
		if(zt) {
			zt = false;
			hImg();
		} else {
			zt = true;
			qImh();
		}

		setTimeout(function() {
			clearInterval(dtime);
			qImh();
		}, 800);
	}
}

function hImg() { //发光图片
	for(var i = 0; i < $(".wp").length; i++) {
		$(".wp").eq(i).attr("src", "img/wp-h-" + (i + 1) + ".png");
	}
}

function qImh() { //不发光图片
	for(var i = 0; i < $(".wp").length; i++) {
		$(".wp").eq(i).attr("src", "img/wp-q-" + (i + 1) + ".png");
	}
}

function clicksound(i) {
	var ad = document.querySelectorAll("audio"); //音乐
	ad[i].currentTime = 0;
	ad[i].play();

	$(".wp").eq(i).attr("src", "img/wp-h-" + (i + 1) + ".png"); //点击发光

	$(".pop").show();
	$(".bas").show()
	$(".Winning").show();
}

$(".collect").click(function() { //收藏
	$(".Winning").hide();
	$(".Winning2").show();
})
$(".sell").click(function() { //出售
	$(".Winning").hide();
	$(".Winning3").show();
})
$(".close").click(function() { //返回按钮
	$(".Winning").hide();
	$(".Winning2").hide();
	$(".Winning2-1").hide();
	$(".Winning3").hide();
	$(".Winning4").hide();
	$(".Winning5").hide();
	$(".Winning6").hide();
	$(".pop").hide();
	$(".bas").hide();

	qImh();
})


$(".equip").click(function(){

	if($(".equip-box").css("display")=="none"){
		$(".equip-box").show();
		$(".bas").show();
	}else{
		$(".equip-box").hide();
		$(".bas").hide();
	}
	$(".equip-box-uls").width($(".equip-box-uls li").width() * $(".equip-box-uls li").length + 10); //装备宽度
})


$(".done").click(function(){  //购买装备按钮
	$(this).hide()
	$(this).next(".Purchased").show()
})


$("#buy").click(function(){
	$(".pop").show();
	$(".Winning6").show();
	$(".equip-box").hide();
})
