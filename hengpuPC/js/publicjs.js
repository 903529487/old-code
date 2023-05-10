$(function() {

	$(".app").hover(function() {
		$(this).addClass("header-top-con-box-on");
		$(".header-ewm").slideDown(100)
	}, function() {
		$(this).removeClass("header-top-con-box-on");
		$(".header-ewm").slideUp()
	})

	showPass();

	function showPass() { //显示密码
		var loginPass = document.getElementById("login-pass");
		$(".showzifu").click(function() {
			if($(this).attr("checked")) {
				loginPass.setAttribute("type", "text")
			} else {
				loginPass.setAttribute("type", "password")
			}
		})
	}

	//登录框弹窗
	$(".login-but").click(function() {
		$(".log-box").slideDown()
		$(".bas").slideDown()
		

	})
	$(".close").click(function() {
		$(".log-box").slideUp();
		$(".bas").slideUp();
		
	})
})