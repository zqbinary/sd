(function () {
    'use strict';

    angular
    .module('app')
    .factory('APIOrderService', APIOrderService);

    APIOrderService.$inject = ['$http', '$q', '$timeout', 'CacheFactory', 'ENUM'];

    function APIOrderService($http, $q, $timeout, CacheFactory, ENUM) {

        var service = new APIEndpoint( $http, $q, $timeout, CacheFactory, 'APIOrderService' );
        service.get = _get;
        service.list = _list;
        service.confirm = _confirm;
        service.reasonList = _reasonList;
        service.cancel = _cancel;
        service.review = _review;
        service.subtotal = _subtotal;
        service.price = _price;
        return service;

        function _get(params) {
            return this.fetch( '/v2/sdtapi.order.get', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.order : null;
            });
        }

        function _list(params) {
            return this.fetch( '/v2/sdtapi.order.list', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.orders : null;
            });
        }

        function _confirm(params) {
            return this.fetch( '/v2/sdtapi.order.confirm', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.order : null;
            });
        }

        function _reasonList(params) {
            return this.fetch( '/v2/sdtapi.order.reason.list', params, true, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.reasons : null;
            });
        }

        function _cancel(params) {
            return this.fetch( '/v2/sdtapi.order.cancel', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.order : null;
            });
        }

        function _review(params) {
            return this.fetch( '/v2/sdtapi.order.review', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? true : false;
            });
        }

        function _subtotal(params) {
            return this.fetch( '/v2/sdtapi.order.subtotal', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.subtotal : null;
            });
        }

        function _price(params) {
            return this.fetch( '/v2/sdtapi.order.price', params, false, function(res){
                return ENUM.ERROR_CODE.OK == res.data.error_code ? res.data.order_price : null;
            });
        }
    }

})();
