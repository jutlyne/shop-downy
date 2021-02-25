<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');
Route::group(['namespace' => 'shoes'], function(){
  Route::get('', [
    'uses' => 'IndexController@index',
    'as' => 'shoes.index.index'
  ]);
  Route::get('about',[
    'uses' => 'NewController@index',
    'as' => 'shoes.shop.index'
  ]);

  Route::get('checkout',[
    'uses' => 'NewController@checkout',
    'as' => 'shoes.check.index'
  ]);

  Route::post('check/cart',[
    'uses' => 'NewController@postcheckout',
    'as' => 'shoes.checkout.index'
  ]);



  Route::post('check/cart/submit',[
    'uses' => 'NewController@addOrder',
    'as' => 'shoes.check.addorder'
  ]);

  Route::get('payment',[
    'uses' => 'NewController@payment',
    'as' => 'shoes.check.payment'
  ]);

  Route::post('payment',[
    'uses' => 'NewController@postpayment',
    'as' => 'shoes.check.payment'
  ]);


  Route::get('about',[
    'uses' => 'NewController@about',
    'as' => 'shoes.shop.about'
  ]);

  Route::get('contact',[
    'uses' => 'ContactController@contact',
    'as' => 'shoes.contact.contact'
  ]);
  Route::post('contact',[
    'uses' => 'ContactController@postContact',
    'as' => 'shoes.contact.contact'
  ]);
  Route::get('cat',[
    'uses' => 'NewController@cat',
    'as' => 'shoes.shop.cat'
  ]);

  Route::get('user',[
    'uses' => 'UserController@index',
    'as' => 'shoes.user.index'
  ]);

  Route::get('search/{key}',[
    'uses' => 'NewController@search',
    'as' => 'shoes.search'
  ]);

  Route::get('cat/{id}',[
    'uses' => 'CatController@cat',
    'as' => 'shoes.cat.cat'
  ]);
  Route::get('detail/{id}',[
    'uses' => 'NewController@detail',
    'as' => 'shoes.shop.detail'
  ]);
  Route::get('star/{id}',[
    'uses' => 'NewController@star',
    'as' => 'star'
  ]);
  Route::get('cart',[
    'uses' => 'CartController@index',
    'as' => 'cart'
  ]);
  Route::get('language/{language}', [
    'uses' => 'LanguageController@index',
    'as' => 'language.index'
  ]);
});
// , 'middleware' => 'auth'
Route::group(['prefix' => 'admin' , 'middleware' => 'auth', 'namespace' => 'Admin'], function(){
  Route::get('/index',[
    'uses' => 'IndexController@index',
    'as' => 'admin.index.index'
  ]);
  Route::group(['prefix' => 'product'], function(){
    Route::get('',[
      'uses' => 'ProductController@index',
      'as' => 'admin.product.index'
    ]);
    Route::get('add',[
      'uses' => 'ProductController@add',
      'as' => 'admin.product.add'
    ]);
    Route::post('add',[
      'uses' => 'ProductController@postAdd',
      'as' => 'admin.product.add'
    ]);
    Route::get('edit/{id}',[
      'uses' => 'ProductController@edit',
      'as' => 'admin.product.edit'
    ]);
    Route::post('edit/{id}',[
      'uses' => 'ProductController@postEdit',
      'as' => 'admin.product.edit'
    ]);
    Route::get('remove/{id}',[
      'uses' => 'ProductController@remove',
      'as' => 'admin.product.remove'
    ]);
    Route::get('delete/{id}',[
      'uses' => 'ProductController@delete',
      'as' => 'admin.product.delete'
    ])->middleware('role:admin');
    Route::get('search/{key}',[
      'uses' => 'ProductController@search',
      'as' => 'admin.product.search'
    ]);
  });

  Route::group(['prefix' => 'typeproduct'], function(){
    Route::get('',[
      'uses' => 'TypeProductController@index',
      'as' => 'admin.typeproduct.index'
    ]);
    Route::get('add',[
      'uses' => 'TypeProductController@add',
      'as' => 'admin.typeproduct.add'
    ]);
    Route::post('add',[
      'uses' => 'TypeProductController@postAdd',
      'as' => 'admin.typeproduct.add'
    ]);
    Route::get('edit/{id}',[
      'uses' => 'TypeProductController@edit',
      'as' => 'admin.typeproduct.edit'
    ]);
    Route::post('edit/{id}',[
      'uses' => 'TypeProductController@postEdit',
      'as' => 'admin.typeproduct.edit'
    ]);
    Route::get('change/{id}',[
      'uses' => 'TypeProductController@change',
      'as' => 'admin.typeproduct.change'
    ])->middleware('role:admin');
  });

  Route::group(['prefix' => 'user'], function(){
    Route::get('',[
      'uses' => 'UserController@index',
      'as' => 'admin.user.index'
    ]);
    Route::get('add',[
      'uses' => 'UserController@add',
      'as' => 'admin.user.add'
    ])->middleware('role:admin');
    Route::post('add',[
      'uses' => 'UserController@postAdd',
      'as' => 'admin.user.add'
    ])->middleware('role:admin');
    Route::get('edit/{id}',[
      'uses' => 'UserController@edit',
      'as' => 'admin.user.edit'
    ]);
    Route::post('edit/{id}',[
      'uses' => 'UserController@postEdit',
      'as' => 'admin.user.edit'
    ]);
    Route::get('delete/{id}',[
      'uses' => 'UserController@delete',
      'as' => 'admin.user.delete'
    ])->middleware('role:admin');
  });

  Route::group(['prefix' => 'contact'], function(){
    Route::get('',[
      'uses' => 'ContactController@index',
      'as' => 'admin.contact.index'
    ]);
    Route::get('reply/{id}',[
      'uses' => 'ContactController@reply',
      'as' => 'admin.contact.change'
    ])->middleware('role:admin|vinaenter');
    Route::post('reply/{id}',[
      'uses' => 'ContactController@replyEmail',
      'as' => 'admin.contact.change'
    ])->middleware('role:admin|vinaenter');


  });

  Route::group(['prefix' => 'order'], function(){
    Route::get('',[
      'uses' => 'OrderController@index',
      'as' => 'admin.order.index'
    ]);
    Route::get('show/{id}',[
      'uses' => 'OrderController@show',
      'as' => 'admin.order.show'
    ]);
    Route::get('delivery/{id}',[
      'uses' => 'OrderController@delivery',
      'as' => 'admin.order.delivery'
    ]);

    Route::get('change/{id}',[
      'uses' => 'OrderController@changeIcon',
      'as' => 'admin.order.change'
    ]);

  });

  Route::group(['prefix' => 'comment'], function(){
    Route::get('',[
      'uses' => 'CommentController@index',
      'as' => 'admin.comment.index'
    ]);
    Route::get('delete/{id}',[
      'uses' => 'CommentController@delete',
      'as' => 'admin.comment.delete'
    ]);
  });

});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){
  Route::get('/login',[
    'uses' => 'AuthController@login',
    'as' => 'auth.auth.login'
  ]);
  Route::post('/login',[
    'uses' => 'AuthController@postLogin',
    'as' => 'auth.auth.login'
  ]);
  Route::get('/regis',[
    'uses' => 'AuthController@regis',
    'as' => 'auth.auth.regis'
  ]);
  Route::post('/regis',[
    'uses' => 'AuthController@postregis',
    'as' => 'auth.auth.regis'
  ]);
  Route::get('/logout',[
    'uses' => 'AuthController@logout',
    'as' => 'auth.auth.logout'
  ]);
});

Route::get('/pass', function(){
  return bcrypt('123123');
});

Route::get('error',function(){
  return "Bạn không có quyền";
});

Route::post('post-comment',[
  'uses' => 'Shoes\NewController@postAdd',
  'as' => 'shoes.detail.post-comment'
]);

Route::get('sendmail',[
  'uses' => 'Admin\OrderController@delivery',
  'as' => 'vendor.mail.index'
]);

Route::get('header-slide',[
  'uses' => 'Shoes\IndexController@header-slide',
  'as' => 'template.shoes.header-slidebar'
]);



Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
