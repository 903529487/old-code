
	
	//首页产品切换
	var  porTabCut=function(){
		var navA=$(".por-navigation a");
		var porBox=$(".por-box");
		porBox.eq(0).show();
		navA.mousemove(function(){
			navA.removeClass("por-navigation-on");
			$(this).addClass("por-navigation-on");
			porBox.hide();
			porBox.eq($(this).index()).show();
		})
	}
	
	
var  salesShow=function(){     //商品类别预览样式
		var salesLi=$(".sales-box li");	
		salesLi.eq(0).find(".sales-box-hide").show();
		salesLi.eq(0).find(".sales-box-tit").hide();
		var zt;
		salesLi.hover(function(){
				salesLi.find(".sales-box-hide").hide();
				salesLi.find(".sales-box-tit").show();
				$(this).find(".sales-box-tit").hide();
				
				$(this).find(".sales-box-hide").show();
		
		},function(){
			
		})
}
	
var count=function(){    //商品详情计算
	var minus=$(".det-goods-minus");
	
	var add=$(".det-goods-add");
	
	add.click(function(){
		var v=$(this).siblings(".det-goods-text").val();
		v++;
		$(this).siblings(".det-goods-text").val(v);
	});
	minus.click(function(){
		var v=$(this).siblings(".det-goods-text").val();
		if(v<=0){
			$(this).siblings(".det-goods-text").val("0");
		}else{
			v--;
			$(this).siblings(".det-goods-text").val(v);
		}
		
	});
}
