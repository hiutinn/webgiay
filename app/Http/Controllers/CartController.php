<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Order;
use App\OrderDetail;

class CartController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Lấy danh sách sản phẩm trong giỏ
        $listProducts = Cart::content();

        // Lấy tổng giá
        $totalPrice = Cart::subtotal(0,",",".");

        return view('frontend.cart.index',
            [
                'cart' => $listProducts,
                'totalPrice' => $totalPrice,
            ]);
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Thông tin sẽ lưu vào giỏ
        $cartInfo = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty = 1,
            'price' => $product->sale,

            'options' => [
                'image' => $product->image,
            ]
        ];

        // Gọi đến thư viện thêm sản phẩm  vào giỏ hàng
        Cart::add($cartInfo);

        // Thêm tổng số sản phẩm vào một session
        session(['totalProduct' => Cart::count()]);

        return redirect()->route('home.cart');
    }

    // XÓa sản phẩm khỏi giỏ hàng
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);

        // Lấy danh sách sản phẩm trong giỏ
        $listProducts = Cart::content();

        // Lấy tổng giá
        $totalPrice = Cart::total(0, ",", ".");

        return view('frontend.cart.index',
            [
                'cart' => $listProducts,
                'totalPrice' => $totalPrice,
            ]);
    }

    // Cập nhật số lượng sản phẩm
    public function updateProduct(Request $request)
    {
        $rowId = $request->input('rowId');
        $qty = (int)$request->input('qty');

        // cập nhật lại số lương
        Cart::update($rowId, ['qty' => $qty]);

        $listProducts = Cart::content(); // lấy toàn sản phẩm trong giỏ

        $totalPrice = Cart::total(0, ",", "."); // lấy tổng giá của sản phẩm

        return view('frontend.components.cart', [
            'cart' => $listProducts,
            'totalPrice' => $totalPrice
        ]);
    }

    // Hủy đơn hàng
    public function destroy(Request $request)
    {
        // remove session to cart plugin
        Cart::destroy();

        // xóa lượng đã lưu từ bước thêm sản phẩm vào giỏ
        session(['totalItem' => 0]);

        return redirect('/');
    }

    // Tiến hành đặt hàng
    public function order()
    {
        $totalCount = Cart::count(); // Đếm tổng số lượng sản phẩm trong giỏ

        if ($totalCount <= 0) {
            return back()->with('msg', 'Không có sản phẩm nào trong giỏ thì đặt cái gì ? Hả ?!!!');
        }

        return view('frontend.cart.order');
    }

    // Lưu đơn hàng
    public function postOrder(Request $request)
    {
        // Kiểm tr tính đúng đắn của thông tin nhập vào form
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        // Lưu vào bảng orders
        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order->total = Cart::total(0, "", ""); // lấy tổng giá của tất sản phẩm trong giỏ
        $order->order_status_id = 1; // 1 = mới, 2 = đang xu ly , 3= hoàn thanh , 4 = hủy
        $order->save();

        // Tạo mã đơn hàng để gửi mail nếu cần
        $maDonHang = 'DH-' . $order->id . '-' . date('d') . date('m') . date('Y'); //ví dụ KQ: : DH-11-20052020
        $order->code = $maDonHang;
        $order->save(); // LƯU mã đơn hàng
        // gửi email kèm thông mã đơn hàng => mục truy vết dễ
        // code email....

        // Xử lý lưu chi tiết trong bảng order_detail
        $cart = Cart::content(); // danh sản phẩm đang lưu trong giỏ

        if (count($cart) > 0) {
            foreach ($cart as $item) {
                $_detail = new OrderDetail();
                $_detail->order_id = $order->id;
                $_detail->name = $item->name;
                $_detail->image = $item->options->image;
                $_detail->product_id = $item->id;
                $_detail->qty = $item->qty;
                $_detail->price = $item->price;
                $_detail->save();

//                //xử lý trừ sản phảm trong kho ở đây
//                $objProduct = Product::find($item->id);
//                $objProduct->stock = $objProduct->stock - $item->qty;
//                $objProduct->save();
//                //end
            }
        }

        // Xóa thông tin giỏ hàng Hiện tại sau khi đặt hàng thành công
        Cart::destroy();
        // xoa luong
        session(['totalItem' => 0]);

        return redirect()->route('home.cart.completedOrder');
    }

    /**
     * Form Hiển thị hoàn tất đơn đặt hàng
     */
    public function completedOrder()
    {
        return view('frontend.cart.completed');
    }
}
