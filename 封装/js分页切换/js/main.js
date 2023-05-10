require.config({
	paths:{
		jq:"jquery-1.7.2.min",
		ww:"ww"
	},
	prioity:["jq"]     //先加载
});
require(["jq","ww"],function(){
	
		new xfen();	
	
	
});



