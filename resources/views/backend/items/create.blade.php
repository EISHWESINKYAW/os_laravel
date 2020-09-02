@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Items Create From</h1>
	</div>
</div>
<form class="col-md-6" action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group row">
		@error('codeno')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror

		<label for="staticEmail" class="col-sm-2 col-form-label">Codeno</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="codeno">


		</div>
	</div>
	<div class="form-group row">
		@error('name')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="name">
		</div>
	</div>
	<div class="form-group row">
		@error('photo')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Photo</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" name="photo">
		</div>
	</div>
	<div class="form-group row">
		@error('name')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="price">
		</div>
	</div>
	<div class="form-group row">
		@error('discount')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Discount</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="discount" value="0">
		</div>
	</div>
	<div class="form-group row">
		@error('description')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
		<div class="col-sm-10">
			<textarea class="form-control" name="description"></textarea>
		</div>
	</div>
	<div class="form-group row">
		@error('brand')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Brand</label>
		<div class="col-sm-10">
			<select class="form-control form-control-md" id="inpurBrand" name="brand">
				@foreach ($brands as $brand)
				<option value="{{ $brand->id }}">{{$brand->name}}</option>
				@endforeach
			</select>

		</div>
	</div>
	<div class="form-group row">
		@error('subcategory')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<label for="inputPassword" class="col-sm-2 col-form-label">Subcatgry</label>
		<div class="col-sm-10">
			<select class="form-control form-control-md" id="inpurBrand" name="subcategory">
				@foreach ($subcategories as $subcategory)
				<option value="{{ $subcategory->id }}">{{$subcategory->name}}</option>
				@endforeach
			</select>

		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
			<input type="submit" class="btn btn-primary" value="Create" name="btn_submit">
		</div>
	</div>
</form>
@endsection
