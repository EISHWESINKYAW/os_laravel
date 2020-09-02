@extends('backendtemplate')
@section('mainsection')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 text-center">Order List</h1>
		<a href="" class="btn btn-info"></a>
	</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr class="bg-dark text-light">
						<th>No</th>
						<th>VoucherNO</th>
						<th>User</th>
						<th>Order Date</th>
						<th>Total</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="tbody">
					@php
					$i=1;
					@endphp
					@foreach ($orders as $order)
					<tr>
						<td>{{$i++}}</td>
						<td><a href="">{{$order->voucherno}}</a></td>
						<td>{{$order->user->name}}
							{{-- @foreach ($users as $user)
							{{$user->name}}
							@endforeach --}}
					     </td>
						<td>{{$order->orderdate}}</td>
						
						<td>{{$order->total}}</td>

						<td>
						<a href="{{route('orders.show',$order->id)}}" class="btn btn-info">Detail</a>
						{{-- <a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a> --}}
						{{-- <a href="" class="btn btn-danger">Delete</a> --}}
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection