
var myApp = angular.module('myApp', ['ngRoute', 'angularUtils.directives.dirPagination']);
myApp.config(function ($routeProvider) {
    $routeProvider.
        when('/', { templateUrl: 'Views/Home/Index.html', controller: 'HomeController' }).
        when('/home', { templateUrl: 'Views/Home/Index.html', controller: 'HomeController' }).
        when('/login', { templateUrl: 'Views/User/login.html', controller: 'loginController' }).
        when('/signup', { templateUrl: 'Views/User/signup.html', controller: 'loginController' }).
        when('/detailProduct/:MaSach', { templateUrl: 'Views/Product/Detail.html', controller: 'detailProductController' }).
    //    when('/detail', { templateUrl: 'Views/detail.html', controller: 'DetailController' }).
    //    when('/add', { templateUrl: 'Views/add.html', controller: 'AddController' }).
    //otherwise({ redirectTo: '/index' });
    otherwise({ redirectTo: '/' });

});

myApp.service("DataSharing", function () {
    this.studentID = 0;
    this.student = '';
    this.infoToken = {
        expires: '',
        issued: '',
        access_token: '',
        expires_in: '',
        token_type: '',
        userName: ''
    };
});

myApp.factory("SinhVienService", function ($http, DataSharing) {

    this.signup = function (username, password, confirmPassword) {
        var _data = {
            "UserName": username,
            "Password": password,
            "ConfirmPassword": confirmPassword
        };

        var request = $http({
            method: "post",
            url: "http://localhost:17146/api/Account/Register/",
            data: _data
        });
        return request;
    };
    this.logout = function () {
        var request = $http({
            method: "post",
            url: "http://localhost:17146/api/Account/Logout/",
            headers: { 'Authorization': 'Bearer ' + DataSharing.infoToken.access_token },
        });
        return request;
    }
    return this;
});

myApp.controller('HomeController', function ($scope, $http) {
    $scope.currentPage = 1;
    $scope.pageSize = 9;
    //alert('fdfaf');
    $http({
        method: 'GET',
        url: 'http://localhost:17146/api/home/all'
    })
    .success(function (data, status) {
        $scope.products = data;
    })
    .error(function (data, status) {
        alert(status);
    });

}
);

myApp.controller('ChuDeController', function ($scope, $http) {
    $http({
        method: 'GET',
        url: 'http://localhost:17146/api/home/allchude'

    })
            .success(function (data, status) {

                $scope.chudes = data;
            })
            .error(function (data, status) {
                alert(status);
            });

}
);

myApp.controller('NhaXuatBanController', function ($scope, $http) {
    $http({
        method: 'GET',
        url: 'http://localhost:17146/api/home/allnhaxuatban'

    })
            .success(function (data, status) {

                $scope.nhaxuatbans = data;
            })
            .error(function (data, status) {
                alert(status);
            });

}
);

myApp.controller('TacGiaController', function ($scope, $http) {
    $http({
        method: 'GET',
        url: 'http://localhost:17146/api/home/alltacgia'

    })
            .success(function (data, status) {

                $scope.tacgias = data;
            })
            .error(function (data, status) {
                alert(status);
            });

}
);

//myApp.factory('Service', ['$http',
//    function ($http) {
//        var service = {};

//        service.GetUsers = function (pagingInfo) {
//            return $http.get('/api/users', { params: pagingInfo });
//        };

//        return service;
//    }]);
//myApp.controller('Users.HomeController',
//    ['$scope', 'Service',
//    function ($scope, Service) {
//        $scope.pagingInfo = {
//            page: 1,
//            itemsPerPage: 30,
//            //sortBy: 'FirstName',
//            //reverse: false,
//            //search: '',
//            totalItems: 0
//        };

//        $scope.search = function () {
//            $scope.pagingInfo.page = 1;
//            loadUsers();
//        };

//        $scope.sort = function (sortBy) {
//            if (sortBy === $scope.pagingInfo.sortBy) {
//                $scope.pagingInfo.reverse = !$scope.pagingInfo.reverse;
//            } else {
//                $scope.pagingInfo.sortBy = sortBy;
//                $scope.pagingInfo.reverse = false;
//            }
//            $scope.pagingInfo.page = 1;
//            loadUsers();
//        };

//        $scope.selectPage = function (page) {
//            $scope.pagingInfo.page = page;
//            loadUsers();
//        };

//        function loadUsers() {
//            $scope.users = null;
//            Service.GetUsers($scope.pagingInfo).success(function (data) {
//                $scope.users = data.data;
//                $scope.pagingInfo.totalItems = data.count;
//            });
//        }

//        // initial table load
//        loadUsers();
//    }]);
//myApp.controller('HomeController', HomeController);
