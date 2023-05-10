	//头部菜单弹出
			
			headerZbox();
			function headerZbox() {
				var gb = document.querySelector(".gd");
				var zimeta = document.querySelector(".zi-meta");
				var bgd = document.querySelector(".bgd");
				gb.addEventListener('touchstart', function(e) {
					e.preventDefault();
						zimeta.style.display = "block";
						bgd.style.display = "block";
						document.body.style.overflow = "hidden";
				})
					bgd.addEventListener('touchstart', function(e) {
						e.preventDefault();
						zimeta.style.display = "none";
					bgd.style.display = "none";
					document.body.style.overflow = "auto";
				})
			}
			
			
			//end