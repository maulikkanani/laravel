<html ng-app='usersService'>
<head>
	<title>Users</title>
	<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
	<?php echo HTML::script('js/lib/angular.min.js') ?>
	<?php echo HTML::script('js/lib/angular-resource.min.js') ?>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
</script>
</head>
<body ng-controller="mainCtrl">
	<center>
		<table>
			<tr>
				<td>Id</td>
				<td>Name</td>
				<td>email</td>
				<td>Action</td>
			</tr>
			@{{JSON.stringify(userlist)}}

			<tr ng-repeat="userd in paginate.data">
				<td>{{ userd.id }}</td>
				<td>{{ userd.name }}</td>
				<td>{{ userd.email }}</td>
				<td><a href="#" ng-click="deleteUser(userd.id)">delete {{userd.id}}</a>  || <a href="#" ng-click="editUser($index)">Edit {{$index+"---"+userd.id}}</a></td>
			</tr>
			
		</table>
		<hr>
		<center>
			<div class="pagination">
				<span ng-repeat="n in [] | pageRange:paginate.last_page"  >
					<a href="#" ng-class="paginate.current_page==n ? 'current_page' : 'sd' " ng-click="get(n)" > [{{n}}] </a>
				</span>
			</div>
			
		</center>
		
		<hr>

	</center>

	<form name="userForm"  ng-submit="addUser(userForm.$valid)" novalidate> 
		name:<input type="text" name="name" ng-model='userData.name' required >
		<p ng-show="userForm.name.$invalid " class="help-block">You name is required.</p>
		

		<br>Email:<input type="email" name="email" ng-model='userData.email'> 
		<p ng-show="userForm.email.$error.email " class="help-block">email valid.</p>
		<br>
		<input 
		type="submit" 
		value="Add" 
		ng-disabled="userForm.$invalid"
		>
		<hr>
	</form>
		<div ng-show="showEditForm">
			<form ng-submit="updateUser(userForm2.$valid)" name="userForm2">
				name:<input type="text" name="name" ng-model='editFrom.name' required >
				<p ng-show="userForm2.name.$invalid " class="help-block">You name is required.</p>
				
				<input type="hidden" ng-model="editFrom.id">
				<br>Email:<input type="email" name="email" ng-model='editFrom.email'> 
				<p ng-show="userForm2.email.$error.email " class="help-block">email valid.</p>
				<br>
				<input 
				type="submit" 
				value="Update" 
				>
			</form>
		</div>
		<div id="jsondiv">
			<pre>
				{{ userData }}
				{{ editFrom }}
				{{ userForm2.email.$invalid }}
			</pre>
		</div>
	</body>
	<script type="text/javascript">
	angular.module('usersService',[])
	.filter('pageRange', function() {
		return function(input, total) {
			total = parseInt(total);
			for (var i=1; i<=total; i++)
				input.push(i);
			return input;
		};
	})
	.factory('Users',function($http){
		return {
			get:function(page){
				return $http.get('users/index?page='+page);
			},
			create:function(userData){

				return $http({
					method	: "POST",
					url	: "users/create",
				//because laravel accept json response
				//headers	: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data	:userData
				});
			},
			delete:function(id){
				return $http.delete("users/delete/"+id);
			},
			update:function(editData){
				return $http({
					method	: "POST",
					url	: "users/update",
				//because laravel accept json response
				//headers	: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data	:editData
				});	
			}
		};
		//$http.get('users/index');
	})
	.controller('mainCtrl',function($scope,$http,Users){
		//Users.success(function(data){
		//$scope.userlist = data;	
		//});
		//console.log(Users);
		$scope.showError =false;
		$userData = {};
		$scope.userlist = {};	
		$scope.paginate = {};	
		$scope.editFrom = {};
		$scope.get = function (page){
			Users.get(page).success(function(data){
				$scope.paginate = data;	
								//$scope.paginate.total = data.data;	
							});
		};

		$scope.get(1);
		
		$scope.addUser = function(isValid){
			//$scope.showError =true;
			if(isValid){
				Users.create($scope.userData).success(function(data){
				//console.log($.param($scope.userData));
				$scope.userData = {};
				console.log(data);
				if(data.success==true){
					//alert("data added");
					$scope.get($scope.paginate.current_page);
				}
			}).error(function(data) {
				console.log(data);
			});
		}else{
			alert("error...");
		}
	};

	$scope.deleteUser = function(id){
		alert(id);
		Users.delete(id).success(function(data){
				//console.log(data);
				$scope.get($scope.paginate.current_page);
			});
	}

	$scope.editUser = function(index){
		$scope.showEditForm = true;
		//console.log($scope.paginate.data[index]);
		$scope.editFrom.id = $scope.paginate.data[index].id;
		$scope.editFrom.name = $scope.paginate.data[index].name;
		$scope.editFrom.email = $scope.paginate.data[index].email;
		//console.log($scope.editFrom);
		//$scope.editFrom.email = paginate.data[index].email;
		//$scope.editFrom.id = paginate.data[index].id;
	}

	$scope.updateUser = function(isValid){
		if(isValid){
			Users.update($scope.editFrom).success(function(data){
				$scope.editFrom = {};
				if(data.success){
					$scope.get($scope.paginate.current_page);
				}
				$scope.showEditForm = false;
			});

		}else{

			alert("error..");
		}
	}

})
</script>
<style type="text/css">
.current_page{
	background-color: green !important;
	font-color:red;
}
.pagination div{
	width:50px;
	float: left;
}
</style>
</html>