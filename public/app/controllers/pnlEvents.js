app.controller('eventsController', function ($scope, $http, API_URL) {
     
    $scope.save = function () {
    //    $scope.user = null;
        var url = API_URL + "addeventurl/store";
        var method = "POST";
        $http({
            method: method,
            url: url,
            data: $.param($scope.user),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (response) {
            console.log(response);
         //   location.reload();
        }), (function (error) {
        });
    }
});

