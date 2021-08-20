<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        $carts=Cart::content();
        $total=Cart::total();
        $subtotal=Cart::subtotal();

        return view('front.checkout.index',compact('carts','total','subtotal'));
    }
    public function addOrder(Request $request){
        //        01.Them don hang
        $order = Order::create($request->all());

//        02.Them chi tiet don hang
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];

            OrderDetail::create($data);
        }

        if ($request->payment_type =='pay_later') {
//            03.Gui email
            $total=Cart::total();
            $subtotal=Cart::subtotal();

            $this->sendEmail($order,$total,$subtotal);

//        04.Xoa gio hang
            Cart::destroy();

//        05.Tra ve ket qua
            return redirect('checkout/result')
                ->with('notification','Success! You will pay on delivery.Please check your email.');
        }
        if ($request->payment_type =='online_payment') {
//            01.Lay URL thanh toan VNPay
            $data_url=VNPay::vnpay_create_payment([
               'vnp_TxnRef'=>$order->id,//ID don hang
                'vnp_OrderInfo'=>'Mô tả đơn hàng ở đây...',
                'vnp_Amount'=>Cart::total(0,'','') * 23075,//Nhan voi ti gia tien
            ]);
//            02.Chuyen huong toi URL lay duoc
            return redirect()->to($data_url);
        }
        else{
            return "Online payment method is not supported";
        }
    }

    public function vnPayCheck(Request $request){
//        01.Lay data tu URL (do VNPay gui ve qua $vn_Returnurl)
        $vnp_ResponseCode=$request->get('vnp_ResponseCode');//Ma phan hoi ket qua thanh toan.  00= thanh cong
        $vnp_TxnRef=$request->get('vnp_TxnRef');//ticket_id
        $vnp_Amount=$request->get('vnp_Amount');//Tong tien thanh toan.

//        02.Kiem tra ket qua giao dich tra ve tu VNPay
        if ($vnp_ResponseCode!=null){
            //Neu thanh cong
            if ($vnp_ResponseCode==00){
                //Gui email
                $order=Order::find($vnp_TxnRef);
                $total=Cart::total();
                $subtotal=Cart::subtotal();
                $this->sendEmail($order,$this,$subtotal);

                //Xoa gio hang
                Cart::destroy($order);

                //Thong bao ket qua thanh cong
                return redirect('checkout/result')
                    ->with('notification','Success! You will pay on delivery.Please check your email.');
            }else{
                //neu khong thanh cong
                //Xoa don hang da them vao database
                Order::find($vnp_TxnRef)->delete();

                //Tra ve thong bao loi
                return redirect('checkout/result')
                    ->with('notification','ERROR:  Payment failed or canceled.');
            }
        }

    }

    public function result(){
        $notification=session('notification');
        return view('front.checkout.result',compact('notification'));
    }

    private function sendEmail($order,$total,$subtotal){
        $email_to=$order->email;

        Mail::send('front.checkout.email',compact('order','total','subtotal'),function ($message) use($email_to){
            $message->form('codelean@gmail.com','CodeLean eCommerce');
            $message->to($email_to,$email_to);
            $message->subject('Order Notification');
        });
    }

}
