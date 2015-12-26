myApp.controller('detailProductController', function ($scope, $http) {
    $scope.detailProduct = function () {
        $http({
            method: 'GET',
            url: '../api/product/detail?MaSach=' + $scope.product.MaSach

        })
                .success(function (data, status) {

                    $scope.detailproduct = data;
                })
                .error(function (data, status) {
                    alert(status);
                    $scope.detailproduct = null;
                });
    };

});