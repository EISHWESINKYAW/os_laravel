@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brands Edit From</h1>
	</div>
</div>
<form class="col-md-6" action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-md-12">
					<label>Brand Name</label>
					<input type="text" name="name" class="form-control" value="{{$brand->name}}">
					@error('name')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label>Brand Photo</label>
					<input type="file" name="photo" class="form-control">
					<img src="{{asset($brand->photo)}}" class="img-fluid w-25">
					<input type="hidden" name="oldphoto" value="{{$brand->photo}}">
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
