<?php
//
use App\Helper\Token;

$app->get('/', function () use ($app) {
    return 'Hi';
});

//Other
$app->group(['namespace' => 'App\Http\Controllers\v2', 'prefix' => 'v2'], function($app)
{

    $app->get('article.{id:[0-9]+}', 'ArticleController@show');

    $app->get('notice.{id:[0-9]+}', 'NoticeController@show');

    $app->post('order.notify.{code}', 'OrderController@notify');

    $app->get('product.intro.{id:[0-9]+}', 'GoodsController@intro');
    
    $app->get('product.share.{id:[0-9]+}', 'GoodsController@share');

    $app->get('sdtapi.auth.web', 'UserController@webOauth');

    $app->get('sdtapi.auth.web.callback/{vendor:[0-9]+}', 'UserController@webCallback');

});

//Guest
$app->group(['namespace' => 'App\Http\Controllers\v2','prefix' => 'v2', 'middleware' => ['xss']], function($app)
{
    $app->post('sdtapi.access.dns', 'AccessController@dns');
    
    $app->post('sdtapi.access.batch', 'AccessController@batch');

    $app->post('sdtapi.category.list', 'GoodsController@category');

    $app->post('sdtapi.product.list', 'GoodsController@index');
    
    $app->post('sdtapi.home.product.list', 'GoodsController@home');

    $app->post('sdtapi.search.product.list', 'GoodsController@search');

    $app->post('sdtapi.review.product.list', 'GoodsController@review');

    $app->post('sdtapi.review.product.subtotal', 'GoodsController@subtotal');

    $app->post('sdtapi.recommend.product.list', 'GoodsController@recommendList');

    $app->post('sdtapi.product.accessory.list', 'GoodsController@accessoryList');

    $app->post('sdtapi.product.get', 'GoodsController@info');

    $app->post('sdtapi.auth.signin', 'UserController@signin');

    $app->post('sdtapi.auth.social', 'UserController@auth');

    $app->post('sdtapi.auth.default.signup', 'UserController@signupByEmail');

    $app->post('sdtapi.auth.mobile.signup', 'UserController@signupByMobile');

    $app->post('sdtapi.user.profile.fields', 'UserController@fields');

    $app->post('sdtapi.auth.mobile.verify', 'UserController@verifyMobile');

    $app->post('sdtapi.auth.mobile.send', 'UserController@sendCode');

    $app->post('sdtapi.auth.mobile.reset', 'UserController@resetPasswordByMobile');

    $app->post('sdtapi.auth.default.reset', 'UserController@resetPasswordByEmail');

    $app->post('sdtapi.cardpage.get', 'CardPageController@view');

    $app->post('sdtapi.cardpage.preview', 'CardPageController@preview');

    $app->post('sdtapi.config.get', 'ConfigController@index');

    $app->post('sdtapi.article.list', 'ArticleController@index');

    $app->post('sdtapi.brand.list', 'BrandController@index');

    $app->post('sdtapi.search.keyword.list', 'SearchController@index');

    $app->post('sdtapi.region.list', 'RegionController@index');

    $app->post('sdtapi.invoice.type.list', 'InvoiceController@type');

    $app->post('sdtapi.invoice.content.list', 'InvoiceController@content');

    $app->post('sdtapi.invoice.status.get', 'InvoiceController@status');

    $app->post('sdtapi.notice.list', 'NoticeController@index');

    $app->post('sdtapi.banner.list', 'BannerController@index');

    $app->post('sdtapi.version.check', 'VersionController@check');

    $app->post('sdtapi.recommend.brand.list', 'BrandController@recommend');

    $app->post('sdtapi.message.system.list', 'MessageController@system');

    $app->post('sdtapi.message.count', 'MessageController@unread');

    $app->post('sdtapi.site.get', 'SiteController@index');

    $app->post('sdtapi.splash.list', 'SplashController@index');

    $app->post('sdtapi.splash.preview', 'SplashController@view');

    $app->post('sdtapi.theme.list', 'ThemeController@index');

    $app->post('sdtapi.theme.preview', 'ThemeController@view');

    $app->post('sdtapi.search.category.list', 'GoodsController@categorySearch');

    $app->post('sdtapi.order.reason.list', 'OrderController@reasonList');

    $app->post('sdtapi.search.shop.list', 'ShopController@search');

    $app->post('sdtapi.recommend.shop.list', 'ShopController@recommand');

    $app->post('sdtapi.shop.list', 'ShopController@index');

    $app->post('sdtapi.shop.get', 'ShopController@info');

    $app->post('sdtapi.areacode.list', 'AreaCodeController@index');


});

//Authorization
$app->group(['prefix' => 'v2', 'namespace' => 'App\Http\Controllers\v2', 'middleware' => ['token', 'xss']], function($app)
{
    $app->post('sdtapi.user.profile.get', 'UserController@profile');

    $app->post('sdtapi.user.profile.update', 'UserController@updateProfile');

    $app->post('sdtapi.user.password.update', 'UserController@updatePassword');

    $app->post('sdtapi.order.list', 'OrderController@index');

    $app->post('sdtapi.order.get', 'OrderController@view');

    $app->post('sdtapi.order.confirm', 'OrderController@confirm');

    $app->post('sdtapi.order.cancel', 'OrderController@cancel');

    $app->post('sdtapi.order.price', 'OrderController@price');

    $app->post('sdtapi.product.like', 'GoodsController@setLike');

    $app->post('sdtapi.product.unlike', 'GoodsController@setUnlike');

    $app->post('sdtapi.product.liked.list', 'GoodsController@likedList');

    $app->post('sdtapi.order.review', 'OrderController@review');

    $app->post('sdtapi.order.subtotal', 'OrderController@subtotal');

    $app->post('sdtapi.payment.types.list', 'OrderController@paymentList');

    $app->post('sdtapi.payment.pay', 'OrderController@pay');

    $app->post('sdtapi.shipping.vendor.list', 'ShippingController@index');

    $app->post('sdtapi.shipping.status.get', 'ShippingController@info');

    $app->post('sdtapi.consignee.list', 'ConsigneeController@index');

    $app->post('sdtapi.consignee.update', 'ConsigneeController@modify');

    $app->post('sdtapi.consignee.add', 'ConsigneeController@add');

    $app->post('sdtapi.consignee.delete', 'ConsigneeController@remove');

    $app->post('sdtapi.consignee.setDefault', 'ConsigneeController@setDefault');

    $app->post('sdtapi.score.get', 'ScoreController@view');

    $app->post('sdtapi.score.history.list', 'ScoreController@history');

    $app->post('sdtapi.cashgift.list', 'CashGiftController@index');

    $app->post('sdtapi.cashgift.available', 'CashGiftController@available');

    $app->post('sdtapi.push.update', 'MessageController@updateDeviceId');
    //cart
    $app->post('sdtapi.cart.add', 'CartController@add');

    $app->post('sdtapi.cart.clear', 'CartController@clear');

    $app->post('sdtapi.cart.delete', 'CartController@delete');

    $app->post('sdtapi.cart.get', 'CartController@index');

    $app->post('sdtapi.cart.update', 'CartController@update');

    $app->post('sdtapi.cart.checkout', 'CartController@checkout');

    $app->post('sdtapi.cart.promos', 'CartController@promos');

    $app->post('sdtapi.product.purchase', 'GoodsController@purchase');

    $app->post('sdtapi.product.validate', 'GoodsController@checkProduct');

    $app->post('sdtapi.message.order.list', 'MessageController@order');

    $app->post('sdtapi.shop.watch', 'ShopController@watch');

    $app->post('sdtapi.shop.unwatch', 'ShopController@unwatch');

    $app->post('sdtapi.shop.watching.list', 'ShopController@watchingList');

    $app->post('sdtapi.coupon.list', 'CouponController@index');

    $app->post('sdtapi.coupon.available', 'CouponController@available');

    $app->post('sdtapi.recommend.bonus.list', 'AffiliateController@index');
    $app->post('sdtapi.recommend.bonus.info', 'AffiliateController@info');

    $app->post('sdtapi.withdraw.submit', 'AccountController@submit');
    $app->post('sdtapi.withdraw.cancel', 'AccountController@cancel');
    $app->post('sdtapi.withdraw.list', 'AccountController@index');
    $app->post('sdtapi.withdraw.info', 'AccountController@getDetail');

    $app->post('sdtapi.balance.get', 'AccountController@surplus');
    $app->post('sdtapi.balance.list', 'AccountController@accountDetail');
});
