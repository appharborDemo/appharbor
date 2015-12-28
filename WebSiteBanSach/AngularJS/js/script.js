
var myApp = angular.module('myApp', ['ngRoute']);
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

//myApp.controller('HomeController', HomeController);
