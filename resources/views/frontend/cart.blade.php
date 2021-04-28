@extends('frontend.layouts.main')

@section('content')
    <div class="register_account">
        <div class="wrap">
            <h2 style="text-align: center;margin: 2rem"><u>Thông Tin Giỏ Hàng</u></h2>
            <form>
                <div class="row">

                    {{--Thông Tin Cá Nhân--}}
                    <div class="col-md-6">
                        <h4 class="title">Thông tin cá nhân</h4>
                        <div>
                            <input type="text" value="Tên" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Tên';}">
                        </div>

                        <div>
                            <input type="text" value="E-Mail" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'E-Mail';}">
                        </div>

                        <div>
                            <input type="text" value="Số điện thoại" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Số điện thoại';}">
                        </div>

                        <div>
                            <input type="text" value="Size" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Size';}">
                        </div>

                        <div>
                            <input type="text" value="Địa chỉ nhận hàng" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Địa chỉ nhận hàng';}">
                        </div>

                        <div>
                            <textarea name="" id="" cols="78" rows="5" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>

                    {{-- Thông Tin Sản Phẩm --}}
                    <div class="col-md-6">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Thành Tiền: </b></td>
                                <td><b>.... VNĐ</b></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <button class="grey" style="float: left;background-color: red">Hủy Đơn Hàng</button>
                <button type="submit" class="grey" style="background-color: green; float: right">Đặt hàng</button>
            </form>
        </div>
        <div class="clear"></div>

    </div>
    </div>
@endsection
