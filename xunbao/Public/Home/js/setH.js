var num;//使用装备的钱
var pack = {
	//设置高度
	setHs: function() {
		setH();
		$(window).resize(function() {
			setH();
		});

		function setH() {
			var h = $(window).height();
			var w = document.documentElement.clientWidth / 10;
			$(".tre-box").height(h - w * 1.5)
		};
	},
	//显示或隐藏提示窗口POP
	clickEve: function() {
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
		});

	},
	//装备
	equip:function(){
		//弹出装备窗口
		var eqLi=$(".equip-box-uls li");

		$(".equip").click(function() {
			if($(".equip-box").css("display") == "none") {
				$(".equip-box").show();
				$(".bas").show();
			} else {
				$(".equip-box").hide();
				$(".bas").hide();
			}
			$(".equip-box-uls").width($(".equip-box-uls li").width() * $(".equip-box-uls li").length + 10); //装备宽度
		});

		$(".done").click(function() { //购买装备按钮
			$(this).hide()
			$(this).next(".Purchased").show()
		});

		$("#buy").click(function() {
			$(".pop").show();
			$(".Winning6").show();
			$(".equip-box").hide();
		});

		//使用装备
		var pitchOn=$(".pitch_on");
		eqLi.click(function(){
			var srcs=$(this).find("img").attr("src");
			$(".equip-box").hide();
			$(".bas").hide();
			num=parseInt($(this).find("#eq-price-hide").val());
			pitchOn.find("img").attr("src",srcs);
			pitchOn.show();
		});
		pitchOn.click(function(){
			$(this).hide();
		})

	}
}

pack.setHs();
pack.clickEve();
pack.equip();

//点击抽奖物品strat
function clicksound(i) {
	var ad = document.querySelectorAll("audio"); //音乐
	ad[i].currentTime = 0;
	ad[i].play();
	var a = $(".wp").eq(i).attr("qh");
	$(".wp").eq(i).attr("src", a);

	$(".pop").show();
	$(".bas").show();
	$(".Winning").show();

	//抽奖计算
	if($(".pitch_on").css("display")=="none"){   //$(".pitch_on")隐藏就是没有使用装备
		num = 1;
		count(num);
	}else{
		//使用装备计算
		count(num);
		$(".pitch_on").hide();
	}
}
//点击抽奖物品end

//购买物品减钱
$(".done").click(function() {
	var a = 1;
	a = $(this).parent().parent().parent().find(".yinbi").text();
	count(a);
});

function count(a) {
	$.post(urls, {
		"bi": a
	}, function(data, status) {

		// alert("数据: \n" + data + "\n状态: " + status);
		if(status == "success") {
			b = $(".gold samp").eq(1).find('span').text();
			b = parseInt(b);
			// alert(typeof(b));
			$(".gold samp").eq(1).find('span').text(b - data);
		}
	});
}

//闪光start
window.onload = function() {
	spark();
};

function spark() {
	var zt = true;
	var dtime = setInterval(function() {
		skd();
	}, 300)

	function skd() {
		if(zt) {
			zt = false;
			hImg()
		} else {
			zt = true;
			qImh();
		}

		setTimeout(function() {
			clearInterval(dtime);
			qImh();
		}, 800)
	}
}

var qh = [];
for(var i = 0; i < $(".wp").length; i++) {
	qh.push($(".wp").eq(i).attr("src"));
}

function hImg() { //发光图片
	for(var i = 0; i < $(".wp").length; i++) {
		var a = $(".wp").eq(i).attr("qh");
		$(".wp").eq(i).attr("src", a);
	}
}

function qImh() { //不发光图片
	for(var i = 0; i < $(".wp").length; i++) {
		$(".wp").eq(i).attr("src", qh[i]);

	}
}
//闪光end



