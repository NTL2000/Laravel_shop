<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use DB;
use Illuminate\Pagination\Paginator;
use App\Models\ProductType;
use App\Models\Cart;
use Session;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getIndex()
    {
    	$slide=Slide::all();
    	$new_product=Product::where('state','1')->paginate(4);
    	$top_product=DB::table('products')->wherecolumn('promotion_price','<','unit_price')->paginate(8);
    	return view('page.index',compact('slide','new_product','top_product'));
    }
    public function getProduct_Type($type){
        $sp_theoloai=Product::where('id_type',$type)->get();
        $sp_khac=product::where('id_type','<>',$type)->paginate(3);
        $type_left=ProductType::all();
        $type_product=ProductType::where('id',$type)->first();
    	return view('page.product_type',compact('sp_theoloai','sp_khac','type_left','type_product'));
    }
    public function getProduct(Request $r){
        $sanpham=Product::where('id',$r->id)->first();
        $sanpham_tuongtu=Product::where('id_type',$sanpham->id_type)->paginate(3);
    	return view('page.product',compact('sanpham','sanpham_tuongtu'));
    }
    public function getAbout(){
    	return view('page.about');
    }
    public function getContact(){
    	return view('page.contact');
    }
    public function getAddToCart(Request $r,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $r->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function delItemCart($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckOut(){
        if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                return view('page.check_out',compact('cart'));
            }
        return view('page.check_out');
    }
    public function record_CO(Request $r){
        $cart=Session('cart')?Session::get('cart'):null;
        $customer=new Customer;
        $customer->name=$r->name;
        $customer->gender=$r->gender;
        $customer->email=$r->email;
        $customer->address=$r->address;
        $customer->phone_number=$r->phone;
        $customer->note=$r->note;
        $customer->save();

        $bill=new Bill;
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$r->payment;
        $bill->note=$r->note;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $billDetail=new BillDetail;
            $billDetail->id_bill=$bill->id;
            $billDetail->id_product =$key;
            $billDetail->quantity=$value['qty'];
            $billDetail->unit_price=$value['price']/$value['qty'];
            $billDetail->save();
        }
        Session::forget('cart');
        $r->Session()->put('thongbao','Đặt hàng thành công');
        return redirect()->back();
    }
    public function getLogin(){
        return view('page.login');
    }
    public function getSignin(){
        return view('page.signin');
    }
    public function record_US(Request $r){
        $this->validate($r,[
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            're_password'=>'required|same:password'
        ],[
            'email.required'=>'Vui lòng đăng nhập email',
            'email.email'=>'email không đúng định dạng',
            'email.unique'=>'email đã có người sử dụng',
            'password.required'=>'vui lòng nhập mật khẩu',
            're_password.same'=>'mật khẩu không giống nhau',
            'password.min'=>'mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'mật khẩu không quá 20 ký tự'
        ]);
        $user=new User;
        $user->full_name=$r->name;
        $user->email =$r->email;
        $user->password=Hash::make($r->password);
        $r->Session()->put('thanhcong','Đăng ký thành công');
        $user->save();
        return redirect()->back();
    }
    public function enter_login(Request $r){
        $this->validate($r,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng đăng nhập email',
            'email.email'=>'email không đúng định dạng',
            'password.required'=>'vui lòng nhập mật khẩu',
            'password.min'=>'mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'mật khẩu không quá 20 ký tự'
        ]);
        $cridentials=array('email' =>$r->email , 'password'=>$r->password);
        if(Auth::attempt($cridentials)){
            return redirect()->route('trang-chu');
        }
        else{
            $r->Session()->put(['flag'=>'danger','notify_login'=>'Đăng nhập không thành công']);
            return redirect()->back();
        }
    }
    public function log_out(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->route('trang-chu');
        }
    }
    public function search(Request $r){
        $product=Product::where('name','like','%'.$r->key.'%')->orWhere('promotion_price',$r->key)->get();
        return view('page.search',compact('product'));
    }
}
