'use strict';

/* Controllers */



var quotesControllers = angular.module('quotesApp.controllers', []);

quotesControllers.controller('QuotesListCtrl', ['$scope', 'Quotes', function($scope, Quotes) {
	Quotes.query(function(data) {
		$scope.quotes = data;
		console.log("scope");
		console.log($scope.quotes);
	});
	
}]);
	 
quotesControllers.controller('QuotesReadCtrl', ['$scope', '$routeParams', 'QuoteRead', function($scope, $routeParams, QuoteRead) {
	
	$scope.quote = QuoteRead($routeParams['quoteId']);

}]);

quotesControllers.controller('QuotesEditCtrl', ['$scope', '$routeParams', 'QuoteRead', function($scope, $routeParams, QuoteRead) {
	
	$scope.quote = QuoteRead($routeParams['quoteId']);

}]);


quotesControllers.controller('QuotesSaveCtrl', 
		['$scope', '$routeParams', 'QuoteSave', '$location', function($scope, $routeParams, QuoteSave, $location) {
	
	$scope.master = {};
	$scope.update = function(quote) {
		console.log("save...");
		console.log($scope);
		console.log(quote);
		QuoteSave.save(quote);
		$location.path('/quoteslist');
	};
	$scope.reset = function() {
		$scope.quote = angular.copy($scope.master);
	};
	
	
	// $scope.quote = QuoteSave.save($scope);

}]);