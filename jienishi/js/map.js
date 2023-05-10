(function(){
			
		
			window.onload = function() {
				carouselImg("img", "img-nav");
			}

			function carouselImg(main, nav) {
				var img = document.getElementById(main);
				var con = img.getElementsByTagName("p");
				var nav = document.getElementById(nav);
				var li = nav.getElementsByTagName("li");
			
				var index;
				var geste;
				var time = 5000;
				initialize(); //初始化
				function initialize() {
					con[0].style.opacity = "1";
					con[0].style.filter = "alpha(opacity=100)";
					li[0].className = "on";
					li[0].style.background = "rgba(229, 139, 12,0.7)";
					var text = con[0].getAttribute("alt");
					
				}

				function getIndex() { //获取索引
					for (var i = 0; i < li.length; i++) {
						if (li[i].className == "on") {
							index = i;
						}
					}
				}
				for (var i = 0; i < li.length; i++) {
					li[i].onmouseover = function() {
						for (var j = 0; j < con.length; j++) {
							con[j].style.opacity = "0";
							con[j].style.filter = "alpha(opacity=0)";
							li[j].className = "";
							li[j].style.background = "rgba(17,114,166,0.7)"
						}
						this.style.background = "rgba(229, 139, 12,0.7)";
						this.className = "on";
						getIndex();
						con[index].style.opacity = "1";
						con[index].style.filter = "alpha(opacity=100)";
						var text = con[index].getAttribute("alt");
						
					}
				}

				function timing() {
					getIndex();
					index++;
					if (index < li.length) {
						for (var j = 0; j < con.length; j++) {
							li[j].className = "";
							li[j].style.background = "rgba(17,114,166,0.7)";
							con[j].style.opacity = "0";
							con[j].style.filter = "alpha(opacity=0)";
						}
						li[index].className = "on";
						li[index].style.background = "rgba(229, 139, 12,0.7)";
						con[index].style.opacity = "1";
						con[index].style.filter = "alpha(opacity=100)";
						var text = con[index].getAttribute("alt");
						
					} else {
						index = 0;
						for (var j = 0; j < con.length; j++) {
							li[j].className = "";
							li[j].style.background = "rgba(17,114,166,0.7)";
							con[j].style.opacity = "0";
							con[j].style.filter = "alpha(opacity=0)";
						}
						li[0].className = "on";
						li[0].style.background = "rgba(229, 139, 12,0.7)";
						con[0].style.opacity = "1";
						con[0].style.filter = "alpha(opacity=100)";
						var text = con[0].getAttribute("alt");
						
					}
				}
				geste = setInterval(timing, time)
				img.onmouseover = function() {
					clearInterval(geste);
				}
				img.onmouseout = function() {
					geste = setInterval(timing, time);
				}
			}
			})()
			

