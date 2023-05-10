(function(){
var strmobox = document.querySelector(".strmo-box");
new slider({
	dom: document.getElementById("str-slider"),
	strmobox: strmobox,


})
function slider(opts) {
	var an = false;
	var box = opts.dom;
	

	var last = { //按下时的位置
		x: 0,
		y: 0
	}
	var next = { //移动时的位置
		x: 0,
		y: 0
	}
	var poor;
	var boxWIDTH = $(".strmo-box").width();  //外框宽度
	var domwid=$("#str-slider").width();  //滑块宽度
	
	var differ=boxWIDTH-domwid;  //相差
	//手指按下的处理事件
	var startHandler = function(e) {
		//			e.preventDefault();

		if(poor >= differ-10) {
			an = false;
		} else {
			an = true;
			poor = 0;
		}
	};
	//手指移动的处理事件
	var moveHandler = function(e) {
		e.preventDefault();
		box.style.webkitTransition = "none";
		$(".min-strmo-box").css({
			webkitTransform: "none"
		})
		if(an) {
			next = windowTOcanvas(e.touches[0].pageX, e.touches[0].pageY);
			poor = next.x - (domwid/2);
			if(poor >= differ-10) {
				box.style.webkitTransform = "translate("+differ+"px,0)";   
				$(".min-strmo-box").width(boxWIDTH);
				
			
					
			} else {
				box.style.webkitTransform = "translate(" + poor + "px,0)";
				$(".min-strmo-box").width(next.x + (domwid/2));
			}
			if(poor<0){
				box.style.webkitTransform = "translate(0px,0)";
				$(".min-strmo-box").width(0);
			}

		}
	};
	//手指抬起的处理事件
	var endHandler = function(e) {
		an = false;
		//		e.preventDefault();
		if(poor <=  differ-10) {			
			box.style.webkitTransition = "all 0.2s";
			box.style.webkitTransform = "translate(0px,0)";
			$(".min-strmo-box").css("webkitTransform", "all 0.2s")
			$(".min-strmo-box").width(0);
		} else {
			box.style.webkitTransform = "translate("+differ+"px,0)";   //验证成功
			$(".min-strmo-box").width(boxWIDTH);
			$(".min-strmo-box").html('<span class="animation">验证成功</span>');
			
			
			
		}

	};
	//绑定事件
	box.addEventListener('touchstart', startHandler);
	box.addEventListener('touchmove', moveHandler);
	box.addEventListener('touchend', endHandler);
}

function windowTOcanvas(x, y) {
	var bbox = strmobox.getBoundingClientRect();
	return {
		x: Math.round(x - bbox.left),
		y: Math.round(y - bbox.top)
	}
}
})()
