;(function(){
	function pop(obj){
		this.butID=obj.butID;
		this.winID=obj.winID;	
//		found();
		this.init();
		this.control();
//		var bg=document.getElementById("shade");
//		function found(){  //创建遮罩
//			var foundDiv=document.createElement("div");
//			foundDiv.setAttribute("id","shade");
//			foundDiv.style.cssText="position:fixed;left: 0;top: 0;background:#000;background:rgba(0,0,0,0.5);width:100%;height: 100%;z-index:9;display: none ;";
//			document.getElementsByTagName("body")[0].appendChild(foundDiv);
//		}
		
		
		
	}
	pop.prototype.init = function(){
		this.butID.style.display="none";
		this.butID.style.zIndex="10";
	};
//	pop.prototype.control=function(){
//		var bg=document.getElementById("shade");
//		var ss=this.butID;
//		this.butID.onclick=function(){			
//			this.style.display="block";
//			bg.style.display="block";
//		}
//		bg.onclick=function(){
//			ss.style.display="none";
//			this.style.display="none";
//		}
//	};
	
	window.pop=pop;
})(window,document)
