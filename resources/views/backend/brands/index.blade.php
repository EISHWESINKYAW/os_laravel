@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brands List</h1>
		<a href="{{route('brands.create')}}" class="btn btn-info">Add New</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php
					$i=1;
					@endphp
					@foreach ($brands as $brand)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$brand->name}}</td>
						<td><img src="{{$brand->photo}}" class="img-fluid w-25"></td>
						<td>
						<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning">Edit</a>
						<form method="post" action="{{route('brands.destroy',$brand->id)}}" onsubmit="return confirm('Are You Sure?')">
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


@endsection
