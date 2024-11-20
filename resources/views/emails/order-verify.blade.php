<div style="width:800px; margin:auto; padding: 10px; background-color: lightgreen">
<h4>
    Xin Chào: {{$account->name}}
</h4>
<p>Email dưới đây là thông tin đơn hàng quý khách đã thực hiện giao dịch tại cửa hàng chúng tôi</p>
<p>Quý Khách kiểm tra thông tin và xác nhận lại đơn hàng bằng cách nhấn vào nút <b>Xác nhận đơn hàng phía dưới</b></p>
<h4>Thông tin đơn hàng</h4>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <td>Mã ĐH</td>
        <td>Ngày Đặt</td>
        <td>Tổng Tiền</td>
        <td>Trạng Thái</td>
        <td width="100px"></td>
    </tr>
    <tr>
        <td>#{{ $order->id }}</td>
        <td>{{ $order->created_at->format('d/m/y h:i:s') }}</td>
        <td>{{ number_format($order->total) }}đ</td>
        <td>chờ xác nhận của quý khách</td>
        <td>
            <a href="{{ route('order.verify', $order->token) }}" style="display: inline-block; text-decoration: none; color: #fff; font-weight: bold; padding: 5px 15px; background-color: green;">Xác Nhận</a>
        </td>
    </tr>
</table>

<h4>Chi tiết đơn hàng</h4>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <td>Stt</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Thành tiền</td>
    </tr>
    @foreach ($order->detail as $dt)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $dt->product->name }}</td>
        <td>{{ $dt->quantity }}</td>
        <td>{{ number_format($dt->price) }}đ</td>
        <td>{{ number_format($dt->quantity *  $dt->price) }}đ</td>
    </tr>
    @endforeach
</table>
</div>