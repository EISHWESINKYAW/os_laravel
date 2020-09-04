@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 text-center">Item List</h1>
		<a href="{{route('items.create')}}" class="btn btn-info">Add New</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr class="bg-dark text-light">
						<th>No</th>
						<th>Codeno</th>
						<th>Name</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
					$i=1;
					@endphp
					@foreach ($items as $item)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$item->codeno}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->price}}MMK</td>
						<td>
						<a href="" class="btn btn-info">Detail</a>
						<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
						<form method="post" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are You Sure?')">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
