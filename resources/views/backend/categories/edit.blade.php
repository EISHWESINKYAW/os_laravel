@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category Edit From</h1>
	</div>
</div>
<form class="col-md-6" action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-md-12">
					<label>Category Name</label>
					<input type="text" name="name" class="form-control" value="{{$category->name}}">
					@error('name')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label>Category Photo</label>
					<input type="file" name="photo" class="form-control">
					<img src="{{asset($category->photo)}}" class="img-fluid w-25">
					<input type="hidden" name="oldphoto" value="{{$category->photo}}">
					@error('photo')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<br>
					<input type="submit" value="Update" class="btn btn-info">
				</div>
			</div>
		</form>


@endsection
