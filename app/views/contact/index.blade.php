<div class="col-sm-12" ng-app="contact">
    <div class="col-sm-12">
        <button type="button" class="btn btn-success col-md-offset-5"  ng-click="AddContact = ! AddContact"ng-model="AddContact"> <i class="glyphicon glyphicon-plus"></i> Add</button>
    </div>
    <div class="col-sm-12" ng-show="AddContact">
        <form class="form" role="form" name="contactform" ng-submit="addUser(contactform.$valid)" novalidate>
            <div class="form-group">
                <div class="col-sm-10">  
                    <label for="Name">Name</label>
                </div> 
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Name" placeholder="Enter Name" ng-model="newcontact.name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10"> 
                    <label for="email">Email</label>
                </div> 
                <div class="col-sm-12">
                    <div class="col-sm-3" style="margin: 0px 0px 0px -16px;">
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" ng-model="newcontact.email" required>
                    </div>
                    <div class="col-sm-3" ng-show="contactform.email.$dirty && contactform.email.$invalid">
                     <span class="help-block" ng-show="contactform.email.$error.email">This is not a valid email.</span>
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-sm-10"> 
                    <label for="number">Number</label>
                </div> 
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="number" placeholder="Enter Number" ng-model="newcontact.phone">
                </div>
            </div>  
            <input type="hidden" ng-model="newcontact.id" />
            <div class="col-sm-10"  style="margin: 8px 0px 12px;"> 
                <button type="submit" class="btn btn-default" ng-click="add(newcontact.id);" ng-disabled="contactform.$invalid">
                    <i class="glyphicon glyphicon-plus"></i> Add
                </button>
            </div>    
        </form>
    </div>
    <div class="table-responsive col-sm-12">
        <table class="table table-hover table-striped ">
            <thead>
                <tr>
                    <th>Name </th>
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Name </th>
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<script type="text/javascript">
	angular.module('contact',[])
        .fctory('contact',function($http){
         return {
            get:function(){
                return $http.get('contact/')
            },
            create:function(data){
                return $http({
                    methode:'POST',
                    url:'contact/create',
                    data:data
                })
            }        
         }
        })
        .controller('contact',function($scope,$http,contact){
    
        })
</script>