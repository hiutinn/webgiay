@if(count($cart) > 0)
    <h4 class="title">Thông tin sản phẩm</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><b>#</b></th>
            <th scope="col"><b>Ảnh</b></th>
            <th scope="col"><b>Sản Phẩm</b></th>
            <th scope="col"><b>Giá</b></th>
            <th scope="col"><b>Số Lượng</b></th>
            <th scope="col"><b>Tổng Cộng</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $product)
            <tr>
                <td class="product-remove">
                    <a data-id="{{ $product->rowId }}" href="javascript:void(0)"
                       class="btn btn-danger cart_quantity_delete remove-to-cart" title="Xóa sản phẩm">x
                    </a>
                </td>
                <td><img src="{{asset($product->options->image)}}" width="150" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price,0,",",".")}} VNĐ</td>
                <td class="qty">
                    <input type="text" value="{{$product->qty}}" class="item-qty">
                    <br>
                    <a href="javascript:void(0)" class="btn-update"
                       style="color: orangered;text-decoration: none" data-id="{{ $product->rowId }}">Cập nhật</a>
                </td>
                <td>{{number_format($product->price*$product->qty,0,",",".")}} VNĐ</td>
            </tr>
        @endforeach
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Thành Tiền: </b></td>
            <td><b>{{$totalPrice}} VNĐ</b></td>
        </tr>
        </tbody>
    </table>
    <div class="position-relative w-100">
        <a href="{{ route('home.cart.destroy') }}" class="btn btn-danger py-2 px-2 m-l-2">
            <i class="icon-remove"></i> Hủy Đơn Hàng
        </a>

        <a href="/" class="btn btn-dark py-2 px-2 ">Tiếp tục mua hàng</a>

        <a href="{{ route('home.cart.order') }}" class="btn btn-warning py-2 px-2 "
           style="position: relative;float: right">
            <i class="icon-long-arrow-right"></i>Tiến Hành Đặt hàng
        </a>
    </div>


@section('my-js')
    <script type="text/javascript">
        $(function () {
            // Xóa sản phẩm khỏi giỏ hàng
            $(document).on("click", '.remove-to-cart', function () {
                var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?");
                if (result == true) {
                    var rowId = $(this).attr('data-id'); // 9a34a635a736b8ed53f234e3b7ad738e
                    $.ajax({
                        url: '/gio-hang/xoa-sp-khoi-gio-hang/' + rowId,
                        type: 'get',
                        data: {
                            id: rowId
                        }, // dữ liệu truyền sang nếu có
                        dataType: "HTML", // kiểu dữ liệu trả về
                        success: function (response) {
                            $('#my-cart').html(response);
                        }
                    });
                }
            })
        });

        $(document).on("click", '.btn-update', function () {
            var rowId = $(this).attr('data-id');

            var qty = $(this).parent('.qty').find('.item-qty').val();

            if (isNaN(qty) || qty < 1 ) {
                alert('Số lượng phải là số nguyên lớn hơn 1');
                return false;
            }

            $.ajax({
                url: 'gio-hang/cap-nhat-so-luong/',
                type: 'get',
                data: {
                    rowId: rowId,
                    qty: qty,
                },
                dataType: 'HTML',
                success: function (response) {
                        $('#my-cart').html(response);
                }
            })
        })

    </script>
@endsection
@else
    <div class="login">
        <div class="wrap">
            <h4 class="title">Giỏ hàng trống</h4>
            <p class="cart">Bạn chưa có sản phẩm nào trong giỏ.<br><a href="/" class="btn btn-dark" style="color: #FFFFFF;text-decoration: none">Đến
                    trang chủ</a></p>
        </div>
    </div>
@endif
