app.controller('PostController', function($scope, $http, API,$timeout){	
console.log('asas');
	
	
	$scope.maxPostsWithCate = 15;
	$scope.getListPostsWithCate = function (page,cateid){
		console.log('asas');
		$scope.cateid = cateid;
		//$scope.order= order;
		$scope.pageListSoftwaresWithCate = page;
		var url = API + 'api/post/list-posts/'+$scope.maxPostsWithCate+'/'+page+'?cateid='+$scope.cateid;

		console.log(url);
			$http.get(url).then(function successCallback (response){		
			$scope.listPostWithCate = response.data.posts;
			$scope.totalPostWithCate = response.data.total  /$scope.maxPostsWithCate +1;
			//console.log(response.data);
			// var timeout = setTimeout(function() {
			// 	$("img.lazy").lazyload();
			// }, 100);
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		
	 };
	 

});
