'use strict';


// Declare app level module which depends on filters, and services
angular.module('quotesApp', [
  'ngRoute',
  'quotesApp.filters',
  'quotesApp.services',
  'quotesApp.directives',
  'quotesApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/quoteslist', {templateUrl: 'www/angular-seed-master/app/partials/quoteslist.html', controller: 'QuotesListCtrl'});
  $routeProvider.when('/quotesread/:quoteId', {templateUrl: 'www/angular-seed-master/app/partials/quoteread.html', controller: 'QuotesReadCtrl'});
  $routeProvider.when('/quotesedit/:quoteId', {templateUrl: 'www/angular-seed-master/app/partials/quoteform.html', controller: 'QuotesEditCtrl'});
  $routeProvider.when('/quotessave/:quoteId', {templateUrl: 'www/angular-seed-master/app/partials/quotesave.html', controller: 'QuotesSaveCtrl'});
  
  $routeProvider.otherwise({redirectTo: '/quoteslist'});
}]);
