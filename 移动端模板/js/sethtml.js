	function setHtml() {
			var html = window.document.documentElement;
			var w = document.documentElement.clientWidth / 10;
			if(w>75){
				html.style.fontSize ='75px';
			}else{
				html.style.fontSize = w + 'px';
			}
			
		}
			setHtml();
		window.onresize = function() {
			setHtml();
		}