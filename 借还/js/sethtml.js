	function setHtml() {
			var html = window.document.documentElement;
			var w = document.documentElement.clientWidth / 10;
			html.style.fontSize = w + 'px';
		}
			setHtml();
		window.onresize = function() {
			setHtml();
		}