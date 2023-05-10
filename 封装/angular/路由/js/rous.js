var ang=angular.module("app",["ui.router"]);
ang.config(function($stateProvider,$urlRouterProvider){
	$urlRouterProvider.otherwise('/home'); 
	$stateProvider
	.state("cons",{
		 url: '/home',
         templateUrl: 'tpl/context.html'
	})
//	.state("list",{
//		url:"/list",
//		views:{
//			'ss@list':{
//				 templateUrl: 'tpl/list.html'
//				
//			}
//		}
//	})
	.state("list",{
		url:"/list",
		
		templateUrl: 'tpl/list.html'
				
			
	})
	
})
