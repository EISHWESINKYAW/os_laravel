@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category List</h1>
		<a href="{{route('categories.create')}}" class="btn btn-info">Add New</a>
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
					@foreach ($categories as $category)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$category->name}}</td>
						<td><img src="{{$category->photo}}" class="img-fluid w-25"></td>
						<td>
						<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">Edit</a>
						<form method="post" action="{{route('categories.destroy',$category->id)}}" onsubmit="return confirm('Are You Sure?')">
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
