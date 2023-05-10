

require.config({
　　　　paths: {
　　　　　　"jquery": "jquery-2.1.1.min",
		"q": "q"
　　　　}
　　});
　require(['q','jquery'], function (){
	alert($(window).width())
});

