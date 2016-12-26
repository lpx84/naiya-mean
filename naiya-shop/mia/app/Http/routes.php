<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','Home\HomeIndexController@index');
//管理员路由
//=============================================
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('login','BaseController@login');
    Route::post('dologin','BaseController@doLogin');
    Route::get('captcha/{tmp}', 'BaseController@captcha');
});

Route::resource('admin/index', 'Admin\IndexController', ['only' => ['index']]);
Route::resource('admin/user', 'Admin\UserController');
Route::resource('admin/cate', 'Admin\CateController', ['except' => ['show']]);
Route::resource('admin/article', 'Admin\ArticleController');
Route::resource('admin/attr', 'Admin\AttrController', ['except' => ['show']]);
Route::resource('admin/manager','Admin\ManagerController', ['except' => ['show']]);
Route::resource('admin/merchant','Admin\MerchantController');
Route::resource('admin/messages', 'Admin\MessagesController');
Route::resource('admin/brand', 'Admin\BrandController');
Route::resource('admin/order', 'Admin\OrderController',['only' => ['index','show','update']]);
Route::get('admin/order/edit/{oid}/{gid}/{uid}','Admin\OrderController@edit');
Route::get('admin/order/alipayRefund/{oid}/{gid}/{uid}/{mid}','Admin\OrderController@alipayRefund');
Route::resource('admin/goods', 'Admin\GoodsController',['except' => ['create','store']]);
Route::resource('admin/comment','Admin\CommentController',['except' => ['create','store']]);
Route::resource('admin/help','Admin\HelpController');
Route::resource('admin/helpcate','Admin\HelpCateController',['except' => 'show']);
Route::get('help/{id?}','Home\HomeHelpController@help');
Route::get('index','Home\HomeIndexController@index');
Route::get('app','Home\HomeIndexController@app');
Route::get('guarantee','Home\HomeIndexController@guarantee');
Route::get('admin/loginout','Admin\BaseController@loginout');

//商户路由
//=============================================
Route::group(['prefix' => 'merchant', 'namespace' => 'Merchant'], function(){
    Route::get('/','BaseController@login');
    Route::get('login','BaseController@login');
    Route::get('forgetpassword','BaseController@forgetPassword');
    Route::post('dogetpassword','BaseController@doGetPassword');
    Route::get('resetpassword/id/{id}/token/{token}','BaseController@resetPassword');
    Route::post('doresetpassword','BaseController@doResetPassword');
    Route::post('dologin','BaseController@doLogin');
    Route::get('register','BaseController@register');
    Route::post('doregister','BaseController@doRegister');
    Route::get('logout','BaseController@logout');
    Route::get('active/id/{id}/token/{token}','BaseController@active');
    // Route::get('test','BaseController@test');//测试
    Route::get('captcha/{tmp}', 'BaseController@captcha');
    
    Route::get('goods/createsteptwo', 'GoodsController@createStepTwo');
    Route::post('goods/brand/{cid}', 'GoodsController@brand');
    Route::post('goods/line/{stu}', 'GoodsController@line');
    Route::post('goods/getdata', 'GoodsController@getData');
    Route::post('goods/uploads', 'GoodsController@uploads');
    Route::post('goods/deluploads', 'GoodsController@delUploads');
    Route::post('goods/updateuploads/{id}', 'GoodsController@updateUploads');
    Route::post('goods/insertextattr', 'GoodsController@insertExtAttr');
    Route::post('goods/updatefield/{id}', 'GoodsController@updateField');
    
    Route::get('logistics/add/oid/{oid}/mid/{mid}/order_no/{order_no}', 'LogisticsController@add');
    
    //确认退货
    Route::get('goodsback/dogoodsback/id/{id}/uid/{uid}/oid/{oid}/gid/{gid}', 'GoodsBackController@doGoodsBack');
});

Route::resource('merchant/index', 'Merchant\IndexController', ['only' => ['index']]);
//Route::resource('merchant/user', 'Merchant\UserController', ['except' => ['show']]);
//Route::resource('merchant/cate', 'Merchant\CateController', ['except' => ['show']]);
//Route::resource('merchant/article', 'Merchant\ArticleController');
//Route::resource('merchant/attr', 'Merchant\AttrController', ['except' => ['show']]);
Route::resource('merchant/goods', 'Merchant\GoodsController');
Route::resource('merchant/order', 'Merchant\OrderController');
Route::resource('merchant/comment', 'Merchant\CommentController');
Route::resource('merchant/logistics', 'Merchant\LogisticsController', ['except' => ['create']]);
Route::resource('merchant/goodsback', 'Merchant\GoodsBackController', ['only' => ['index']]);


//详情页
Route::get('goods/{id}','Home\GoodsinfoController@info');
Route::post('goods/add','Home\GoodsinfoController@add');
//用户路由
//=============================================
//用户注册
Route::get('user/register','User\BaseController@register');
Route::post('user/sendemail','User\BaseController@sendEmail');
Route::post('user/doregister','User\BaseController@doRegister');
Route::get('user/captcha/{tmp}','User\BaseController@captcha');

//用户登录
Route::get('user/login','User\BaseController@login');
Route::post('user/dologin','User\BaseController@doLogin');

//登录后首页
Route::get('user/index','User\IndexController@index');
//注销登录
Route::get('user/logout','User\IndexController@logout');

//品牌列表
Route::get('brand/list','User\MybrandController@brandlist');
Route::get('brand/list/store/{id}','User\MybrandController@liststore');
Route::get('brand/list/off/{id}','User\MybrandController@listoff');
//我的品牌收藏
Route::resource('user/mybrand','User\MybrandController');
//我的商品收藏
Route::resource('user/mygoods','User\MygoodsController');
Route::get('user/mygoods/insert/{id}','User\MygoodsController@insert');
Route::get('user/mygoods/add/{id}','User\MygoodsController@add');
//商品口碑
Route::resource('user/comment','User\CommentController');
Route::get('user/comment/publish/{id}','User\CommentController@publish');
//积分管理
Route::resource('user/score','User\ScoreController');

//我的账户信息
Route::resource('user/prefile','User\PrefileController',['only' => ['index','update']]);
//我的账户-修改头像
Route::resource('user/prefile/photo','User\PrefilePhotoController',['only' => ['index','update']]);
//我的账户-修改密码
Route::resource('user/prefile/password','User\PasswordController',['only' => ['index','update']]);
//我的账户-地址管理
Route::resource('user/prefile/ress','User\RessController');
Route::get('user/prefile/tolerant/{id}','User\RessController@tolerant');
//我的账户-奶牙消息
Route::resource('user/prefile/messages','User\MessagesController',['only' => ['index']]);

//我的订单
Route::resource('user/order','User\OrderController',['only' => ['index']]);
//订单详情
Route::get('user/details/{id}','User\OrderController@details');
//全部订单中的取消订单
Route::get('user/update/{id}','User\OrderController@editUpdate');
//payment待付款
Route::resource('user/order/payment','User\PaymentController',['only' => ['index']]);
//待付款中的取消订单
Route::get('user/updatePayment/{id}','User\PaymentController@editUpdate');
//shipments待发货
Route::resource('user/order/shipments','User\ShipmentsController',['only' => ['index']]);
//待付款中的取消订单
Route::get('user/updateShipments/{id}','User\ShipmentsController@editUpdate');
//已发货
Route::resource('user/order/doshipments','User\DoShipmentsController',['only' => ['index','store']]);
//退货换货
Route::get('user/return/list','User\DoShipmentsController@relist');
Route::get('user/return/add/{id}','User\DoShipmentsController@add');
Route::get('user/return/reshow/{id}/{gid}','User\DoShipmentsController@reshow');

//购物车
Route::group(['prefix' => 'user', 'namespace' => 'User'], function(){
    Route::get('cart', 'CartController@index');
    Route::post('cart/changeSelect', 'CartController@changeSelect');
    Route::post('cart/getTotal', 'CartController@getTotal');
    Route::post('cart/addToCart', 'CartController@addToCart');
    Route::post('cart/getCartContents', 'CartController@getCartContents');
    Route::post('cart/removeItems', 'CartController@removeItems');
    Route::post('cart/saveCartContents', 'CartController@saveCartContents');
    
    //购物车转订单
    Route::get('cartOrder/oid/{oid}', 'CartOrderController@index');
    Route::get('cartOrder/changeAddr/{id}', 'CartOrderController@changeAddr');
    Route::post('cartOrder/getAddressInfo', 'CartOrderController@getAddressInfo');
    Route::post('cartOrder/saveAddress', 'CartOrderController@saveAddress');
    Route::post('cartOrder/removeAddress', 'CartOrderController@removeAddress');
    Route::post('cartOrder/makeOrder', 'CartOrderController@makeOrder');
    Route::get('cartOrder/pay/oid/{oid}', 'CartOrderController@pay');
    Route::post('cartOrder/selectPayway', 'CartOrderController@selectPayway');
    
    //订单退回购物车
    Route::get('cartOrder/backcart/{oid}', 'CartOrderController@backCart');
    
    //支付接口
    //支付宝支付处理
    Route::get('cartOrder/alipay/oid/{oid}', 'CartOrderController@alipay');
    //支付后跳转页面
    Route::get('cartOrder/alipayResult', 'CartOrderController@alipayResult');
    //异步通知地址
    Route::post('cartOrder/alipayNotify', 'CartOrderController@alipayNotify');
});

Route::get('/s', 'Home\SearchController@search');
Route::get('/s/k/{k?}', 'Home\SearchController@search');
Route::get('/s/ajaxProductWordName', 'Home\SearchController@ajaxProductWordName');