myApp.controller('detailProductController', function ($scope, $http, $routeParams) {
    //alert("detail");
    var MaSach = $routeParams.MaSach;
    //alert(MaSach);
    //$scope.detailProduct = function (MaSach) {
        //alert(MaSach);
        $http({
            method: 'GET',
            url: 'http://localhost:17146/api/home/detail?MaSach=' + MaSach

        })
                .success(function (data, status) {

                    $scope.detailproduct = data;
                    //alert(status);
                })
                .error(function (data, status) {
                    alert(status);
                    $scope.detailproduct = null;
                });
    //};

});