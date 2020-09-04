@extends('backendtemplate')
@section('mainsection')
<div class="container">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 text-center">Order List</h1>
		{{-- <a href="" class="btn btn-info"></a> --}}
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h1 style="color: blue;" class="h3 mb-0 text-gray-800">Voucherno:{{$order->voucherno}}</h1>
			{{-- <h1 style="color: blue;" class="h3 mb-0 text-gray-800">Voucherno:{{$order->voucherno}}</h1> --}}
			<h1 style="color: blue;" class="h3 mb-0 text-gray-800">Orderdate:{{$order->orderdate}}</h1>
		</div>
	</div>
</div>
<form class="col-md-6" action="{{-- {{'orders.show',$order->id}} --}}" method="post">
	@csrf
	@method('PUT')
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr class="bg-dark text-light">
					<th>No</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@php
				$i=1;$total=0;
				@endphp
				
				@foreach ($order->items as $item)
				@php
				$subtotal=$item->price*$item->pivot->qty;
				$total+=$subtotal;
				@endphp
				<tr>
					<td>{{$i++}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->price}}</td>
					<td>{{$item->pivot->qty}}</td>
					<td>{{$subtotal}}</td>
				</tr>
			@endforeach
			<tr class="bg-dark text-white">
				<td colspan="4">Total:</td>
				<td>{{$total}}MMK</td>
			</tr>
			
		</tbody>
	</table>
</div>
</div>
</form>
@endsection