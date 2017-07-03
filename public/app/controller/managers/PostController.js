app.controller('PostListController', function($scope, $http, API,$timeout){	
	var maxRecord = 20 	;
	$scope.maxRecord = maxRecord;
	$scope.sltCateId = "";

	$scope.sltUserId = "";
	$scope.sltStatus = "";
	$scope.txtKeyword = "";
	 var getTotalPosts = function(){
	 	$http.get(API + 'managersites/post/ajax/total').then(function successCallback (response){
	
		$scope.total = response.data /maxRecord +1 ;
		console.log(response.data);
		//return response.data;
		
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	 }
	var getListPosts = function (max, page){
		var url=API + 'managersites/post/ajax/list/'+max+'/'+page+"?cateid="+$scope.sltCateId+"&userid="+$scope.sltUserId+"&key="+$scope.txtKeyword+"&status="+$scope.sltStatus;
		console.log(url);
		$http.get(url).then(function successCallback (response){
		getTotalPosts();
		$scope.posts = response.data;
		$scope.page = page;
		console.log(response.data);
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		
	 };

	getListPosts(maxRecord,1);

	$scope.changePage = function(page){
		getListPosts(maxRecord,page);
		$scope.page= page;
	}
	$scope.changeCate = function(){
		getListPosts(maxRecord,1);
	}
	$scope.changeSystem = function(){
		getListPosts(maxRecord,1);
	}
	$scope.changeUser = function(){
		getListPosts(maxRecord,1);
	}
	$scope.delete = function(id){
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa bài viết này không');
		if(isConfirmDelete){
			$http.get(API + 'managersites/post/ajax/delete/'+id).then(function successCallback (response){
			console.log(response);
			console.log($scope.page);
			getListPosts(maxRecord,$scope.page);
		//	alert(response.data);
			}  , function errorCallback(response) {
			console.log(response);

			}) ;
		}else{
			return false;
		}
	}


	$scope.changeKey = function(){
		getListPosts(maxRecord,1);
	}
	$scope.changeStatus = function() {
		getListPosts(maxRecord,1);
	}
	$scope.setStatus = function(id,status){
		var url=API + "managersites/post/ajax/setstatus/"+id+"/"+status;
		console.log(url);
		$http.get(url).then(function successCallback (response){
			getListPosts(maxRecord,$scope.page);
			console.log(response.data);
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		
	}


});