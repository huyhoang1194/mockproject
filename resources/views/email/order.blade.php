<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>
            Cảm ơn {!!$order->customer_name!!} đã đặt hàng.</br>
            HPShop sẽ liên hệ với bạn sớm nhất.</br>
        </p>
        <div>
        	<h3>Chi tiết đơn hàng:</h3>
            <table width="100%" border="1px solid">
            	<tr>
					<th width="10%">STT</th>
					<th width="45%">Sản phẩm</th>
					<th width="15%">Size</th>
					<th width="15%">Số lượng</th>
					<th width="15%">Giá</th>
				</tr>
				<?php $count=1;?>
				@foreach($detail as $item)
				<tr>
					<td align="center">{!!$count!!}</td>
					<td align="center">{!!$item->name!!}</td>
					<td align="center">{!!$item->size!!}</td>
					<td align="center">{!!$item->quantity!!}</td>
					<td align="center">${!!$item->price_each!!}</td>
				</tr>
				<?php $count++;?>
				@endforeach
            </table>
            <h3>Ngày yêu cầu chuyển hàng: {!!$order->required_date!!}</h3>
            <h3>Tổng giá trị đơn hàng: ${!!$order->total!!}</h3>
        </div>
    </body>
</html>