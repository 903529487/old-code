(function() {
				var su = 0;
				var num;
				var xfen = function() {
					this.init();
					this.animetas();
					
				}
				xfen.prototype.init = function() {

					num = Math.ceil($(".ana-control-box li").length / 4); //向上取整
					$(".ana-control-box ul").width(920 * num);
					$(".ana-control-left").css("background","#dcdcdc")
					
				}
				xfen.prototype.animetas = function() {
					colo();
					$(".ana-control-right").click(function() {

						if(su < (num - 1)) {
							su++;
							$(".ana-control-box ul").animate({
								left: -920 * su + "px"
							});
						}
						 colo();
					});

					$(".ana-control-left").click(function() {
						if(su > 0) {
							su--;
							$(".ana-control-box ul").animate({
								left: -920 * su + "px"
							});
						}
						colo();
					});
					
					
					
					function colo(){
					if(su == 0){
						
							$(".ana-control-left").css("background","#dcdcdc");
							
							
					}else{
						$(".ana-control-left").css("background","#0373C8");
					}
					if(su == (num - 1)){
						$(".ana-control-right").css("background","#dcdcdc");
					}else{
						$(".ana-control-right").css("background","#0373C8");
					}
					if($(".ana-control-box li").length<5){
						
						$(".ana-control-right").css("background","#dcdcdc");
					}
					
				}	
				}
				
					
				window.xfen = xfen;
			})()

jQuery(function(){
	$(".sub-meta li").click(function(){
		if($(this).find(".hidden-meta").css("display")=="none"){
				$(this).find(".hidden-meta").slideDown();
		}else{
				$(this).find(".hidden-meta").slideUp();
		}
			
	})
})
			
