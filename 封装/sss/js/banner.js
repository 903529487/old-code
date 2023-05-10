(function() {
	var mun = 0;
	
	var banner = function(obj) {
		this.id = obj.id;
		this.controlSwitch = obj.controlSwitch;
		this.times = obj.times; //切换时间间隔
		this.animateTime = obj.animateTime; //切换动画时间

		this.init(); //初始化
		this.animetas(); //点击切换
		this.dstime(); //定时切换			
		this.leriCut(); //左右切换
		
	}
	
	banner.prototype.init = function() {
		var inID = this.id;
		inID.find(".banner-img").width($(window).width() * inID.find(".banner-img li").length);
		inID.find(".banner-img li").width($(window).width());
		inID.find(".banner-minImg li").eq(0).addClass("minbanner-on");
		window.onresize = function() {
			inID.find(".banner-img").width($(window).width() * inID.find(".banner-img li").length);
			inID.find(".banner-img li").width($(window).width());
		}
	}

	banner.prototype.animetas = function() { //点击切换
		var inID = this.id;
		var anTime = this.animateTime;
		inID.find(".banner-minImg li").click(function() {
			inID.find(".banner-minImg li").removeClass("minbanner-on");
			$(this).addClass("minbanner-on");
			mun = inID.find(".minbanner-on").index();
			inID.find(".banner-img").animate({
				left: -$(window).width() * mun + "px"
			}, anTime);
		});
	
	}
	banner.prototype.dstime = function() {
		var time = this.times;
		var Img = this.id;
		var anTime = this.animateTime;
		

		var dtime = setInterval(function() {
			setIntime(Img, anTime); //自动执行
		}, time);

		this.id.hover(function() {
			
			clearInterval(dtime);
			
			Img.find(".jt-left").css({
				opacity: "1",
				filter: "alpha(opacity=100)"
			});
			Img.find(".jt-right").css({
				opacity: "1",
				filter: "alpha(opacity=100)"
			});
		}, function() {
			dtime = setInterval(function() {
				setIntime(Img, anTime);
			}, time);
			Img.find(".jt-left").css({
				opacity: "0",
				filter: "alpha(opacity=0)"
			});
			Img.find(".jt-right").css({
				opacity: "0",
				filter: "alpha(opacity=0)"
			});
		})
	}

	function setIntime(id, anTime) {


		var Imgs = id.find(".banner-img");
		var minIMG = id.find(".banner-minImg li");
		if(mun >= Imgs.find("li").length - 1) {
			mun = 0;
			minIMG.removeClass("minbanner-on");
			minIMG.eq(mun).addClass("minbanner-on");
			Imgs.animate({
				left: "0px"
			}, anTime);
		} else {
			mun++;
			minIMG.removeClass("minbanner-on");
			minIMG.eq(mun).addClass("minbanner-on");
			Imgs.animate({
				left: -$(window).width() * mun + "px"
			}, anTime);
		}
	}

	banner.prototype.leriCut = function() {
		
		if(this.controlSwitch) {
			var Img = this.id;
			var anTime = this.animateTime;
			var Imgs = Img.find(".banner-img");
			var minIMG = Img.find(".banner-minImg li");
			this.id.find(".jt-right").click(function() {
				setIntime(Img, anTime);
			});
			this.id.find(".jt-left").click(function() {
				if(mun <= 0) {
					mun = Imgs.find("li").length - 1;
					minIMG.removeClass("minbanner-on");
					minIMG.eq(mun).addClass("minbanner-on");
					Imgs.animate({
						left: -$(window).width() * mun + "px"
					}, anTime);
				} else {
					mun--;
					minIMG.removeClass("minbanner-on");
					minIMG.eq(mun).addClass("minbanner-on");
					Imgs.animate({
						left: -$(window).width() * mun + "px"
					}, anTime);
				}
			})
		}else{
			this.id.find(".jt-left").remove();
			this.id.find(".jt-right").remove();
		}

	}

	window.banner = banner;
})()