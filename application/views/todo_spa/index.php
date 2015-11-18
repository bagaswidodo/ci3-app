<!DOCTYPE html>
<html lang="en" data-ng-app="todoApp">
    <head>
        <title>Pisyek Demo Todo App with CodeIgniter + AngularJS</title>
    </head>

    <body data-ng-controller="TodoCtrl">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <script src="<?php echo base_url(); ?>assets/spa/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/spa/app.js"></script>


        <form role="form" ng-submit="addTask()" class="form-control">
            <div class="form-group col-md-10">
                <input type="text" class="form-control" name="title" ng-model="taskTitle" placeholder="Enter task title" required>
            </div>
            <button type="submit" class="btn btn-default">Add task</button>
        </form>

        <table class="table table-bordered table-hover">
            <tr data-ng-repeat="task in tasks track by $index">
                <td>{{ $index + 1 }}</td>
                <td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].title"></td>
                <td style="text-align:center"><input class="todo" type="checkbox" ng-change="updateTask(tasks[$index])"ng-model="tasks[$index].status" ng-true-value="'1'" ng-false-value="'0'"></td>
                <td style="text-align:center"><a class="btn btn-xs btn-default" ng-click="deleteTask(tasks[$index])"><span class="glyphicon glyphicon-trash"></span></a></td>

            </tr>
          </table>
    </body>
</html>
