@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory List</h1>
		<a href="{{route('subcategories.create')}}" class="btn btn-info">Add New</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Category_id</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php
					$i=1;
					@endphp
					@foreach ($subcategories as $subcategory)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$subcategory->name}}</td>
						<td>{{$subcategory->category_id}}</td>
						<td>
						<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
						<a href="" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection
