

head();
function head(){
	$("#sel").click(function() {
				$(".select-box").show(10);
				$(this).hide(1000)
			});
			$(document).bind("click", function(e) {
				var target = $(e.target);
				if (target.closest(".select-box,#sel").length == 0) {
					$(".select-box").hide(10);
					$("#sel").show(1000)
				};
				e.stopPropagation();
			});
			$("#nav-tit").click(function() {
				if($(".nav-zi").css("display")=="none"){
					$(".nav-zi").show();
				}else{
					$(".nav-zi").hide();
				}
				
			});
			$(document).bind("click", function(e) {
				var target = $(e.target);
				if (target.closest(".nav-zi,#nav-tit").length == 0) {
					$(".nav-zi").hide();

				};
				e.stopPropagation();
			});
}
