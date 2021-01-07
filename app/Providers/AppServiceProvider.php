<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use Session;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //view share loai san pham
        view()->composer('page.header',function($view){
            $loai_sanpham=ProductType::all();
            $view->with('loai_sp',$loai_sanpham);
        });
        view()->composer('page.header',function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                $view->with(['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
                // $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
