
	$(".navigation-cong").click(function(){
		if($(this).next(".navigation-left-con-hidee").css("display")=="none"){
			$(this).next(".navigation-left-con-hidee").slideDown()
		}else{
			$(this).next(".navigation-left-con-hidee").slideUp()
		}
	})
	

