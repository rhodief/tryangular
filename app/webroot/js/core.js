
var articles = angular.module('Articles', ['ngRoute', 'ngResource']);

//configuração das rotas
articles.config(['$routeProvider',function($routeProvider) {
	$routeProvider
	.when('/artigos',{
		templateUrl: 'articles',
		controller: 'ArticlesController'
	})
	.when('/novo-artigo',{
		templateUrl: 'articles/add',
		controller: 'ArticlesController'	
	})
	.when('/teor/:id', {
		templateUrl: function(params){
			return 'articles/view/'+ params.id;
		},
		controller: 'ArticlesController'
	})
	.when('/editar/:id',{
		templateUrl: function(params){
			return 'articles/edit/' + params.id
		},
		controller: 'ArticlesController'
	});
}]);


articles.directive('tbBtn', function(){
	return {
		restrict:'A',
		link: function($scope, elm, attr){
			elm.addClass('btn btn-'+attr.tbBtn);
		}
	}
});

articles.directive('tbForm', function(){
	return {
		restrict:'A',
		link: function($scope, elm, attr){
			elm.find('input[type=text]').addClass('form-control');
			elm.find('input[type=password]').addClass('form-control');
			elm.find('input[type=email]').addClass('form-control');
			elm.find('textarea').addClass('form-control');
		}
	}
});


articles.factory('ArticleModel', ['$resource', function($resource){
	return $resource(
		'http://localhost/cake3/app/articles/:id.json', 
		null,
		{
			'update':{
				method: 'PUT'
			},
			'query':{
				method: 'GET',
				isArray: false
			}
		}

		);
}]);


articles.controller('ArticlesController', ['$scope', 'ArticleModel', '$routeParams', '$location', function($scope, ArticleModel, $routeParams, $location){
	$scope.articles = ArticleModel.query();

	$scope.novo = function(){
		ArticleModel.save(
			$scope.Article,
			function(data){
				alert(data.msg);
				$location.path('/artigos');
			},
			function(data, status){
				alert('Ops:' +status);
			}
		);
	}

	$scope.salvar = function(){
		ArticleModel.update(
			{id:$routeParams.id},
			$scope.Article,
			function(data){
				alert('ok');
			},
			function(data, status){
				alert('no');
			}
		);
	}

	$scope.ver = function(){
		$scope.Article = ArticleModel.get({id:$routeParams.id});
	}


}])