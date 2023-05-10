setH();
		function setH(){
			var h=document.documentElement.clientHeight;		
			if(h<=600){
				$(".silder").height(600-150);
				$(".main").height(600-150);
				$(".main-box").height(600-150);
			}else{
				$(".silder").height(h-150);
				$(".main").height(h-150);
				$(".main-box").height(h-150);
			}					
		}

		window.onresize=function(){			
			setH();
		}
		


$(".derive-but").click(function(){
	$(".derive-pop").show();
})
