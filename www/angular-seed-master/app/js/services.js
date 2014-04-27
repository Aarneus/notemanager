'use strict';

/* Services */



var quotesServices = angular.module('quotesApp.services', ['ngResource']);


quotesServices.factory('Quotes', ['$resource',
           function($resource){
			return $resource('index.php?app=quotesajax&view=quotes&ajax=1', {}, {
				query: {method:'GET', params:{}, isArray:true,transformResponse: function(data, headersGetter) {
					//console.log(data);
					var _data = angular.fromJson(data);
					//console.log(_data);
					return _data.payload;
				}}
				
			});
	
	/**
	return function() {
		return [
		    	{"id":"3","thequote":"quote A text","bywhom":"asdf","whenyear":"year 1"},
		    	{"id":"5","thequote":"quote B text","bywhom":"sadf sad f","whenyear":"year 201"}
		    	];
	};
	*/
	
	
}]);

quotesServices.factory('QuoteRead', ['$resource',
function($resource){
	
	return function($quoteId) {
		return {"id":$quoteId,"thequote":"quote A text","bywhom":"asdf","whenyear":"year 1"};
	};
	
}]);

quotesServices.factory('QuoteSave', ['$resource',
         function($resource){
         	
         	return $resource("index.php?app=quotesajax&view=update&rest=1", {}, {
         		
         		save: {
         				method:'POST', 
         				params:{},
         				isArray:false,
         				transformRequest: function(data,headers) {
         					if (data === undefined) {
         			            return data;
         			        }
         					
         			        return $.param(data);
         				},
         				headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
         		}
         	
         	}
         	);
		}
         	
]);


quotesServices.value('version','0.1');