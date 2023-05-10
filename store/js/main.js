
require.config({
　　　　paths: {
		"LAreaData1": "../adt/LAreaData1",
		"LAreaData2": "../adt/LAreaData2",
		"LArea": "../adt/LArea",
		"pult": "pult"
　　　　}
　　});
　require(['LAreaData1','LAreaData2','LArea'], function (){    //地址插件
		var area2 = new LArea();
			area2.init({
				'trigger': '#demo2',
				'valueTo': '#value2',
				'keys': {
					id: 'value',
					name: 'text'
				},
				'type': 2,
				'data': [provs_data, citys_data, dists_data]
			});
});
　require(['pult'], function (){
	headerZbox();
});