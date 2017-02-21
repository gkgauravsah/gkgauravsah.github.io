/*!
 * File Name: accountJS.js
 * Author: gaaybhais.com
 * Description: This is account js file to control the app
 */



var gbApp = angular.module('gbApp', []);

gbApp.controller('mainController', function($scope, $http, $filter, $sce) {
    $('.loader').show();

    $scope.today = $filter('date')(new Date(), 'dd/MM/yyyy');
    $http.get('../../include/productsList.php',  {cache: true}).then(function(response) {
        $scope.products = response.data;
    }).catch(function(e) {
        console.log('Error: ', e);
        throw e;
    }).finally(function() {
        $('.loader').hide();
    });


    $http.get('../include/volunteerList.php', { cache: true}).then(function(response) {
        $scope.vlists = response.data;
    }).catch(function(e) {
        console.log('Error: ', e);
        throw e;
    }).finally(function() {
        $('.loader').hide();
    });


});
