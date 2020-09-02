@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Items Edit From</h1>
	</div>
</div>
<form class="col-md-6" action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">Codeno</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" readonly="readonly" name="codeno" value="{{$item->codeno}}">
			@error('codeno')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="name" value="{{$item->name}}">
			@error('name')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Photo</label>
		<div class="col-sm-10">
			<input type="file" name="photo" class="form-control">
			<img src="{{asset($item->photo)}}" class="img-fluid w-25">
			<input type="hidden" name="oldphoto" value="{{$item->photo}}">
			@error('photo')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="price" value="{{$item->price}}">
			@error('price')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Discount</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="discount" value="{{$item->discount}}">
			@error('discount')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
		<div class="col-sm-10">
			<textarea class="form-control" name="description" >{{$item->description}}</textarea>
			@error('description')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Brand</label>
		<div class="col-sm-10">
			<select class="form-control form-control-md" id="inpurBrand" name="brand" >
				@foreach ($brands as $brand)
				@if(old('brand')==$brand->id)
				<option value="{{ $brand->id }}" selected>{{$brand->name}}</option>
				@else
				<option value="{{ $brand->id }}" selected>{{$brand->name}}</option>
				@endif
				@endforeach
			</select>
			@error('brand')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror

		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Subcatgry</label>
		<div class="col-sm-10">
			<select class="form-control form-control-md" id="inpurBrand" name="subcategory">
				@foreach ($subcategories as $subcategory)
				@if(old('brand')==$brand->id)
				<option value="{{ $subcategory->id }}" selected>{{$subcategory->name}}</option>
				@else
				<option value="{{ $subcategory->id }}">{{$subcategory->name}}</option>
				@endif
				@endforeach
			</select>
			@error('subcategory')
			<div class="alert alert-danger">{{$message}}</div>
			@enderror

		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
			<input type="submit" class="btn btn-primary" value="Update" name="btn_submit">
		</div>
	</div>
</form>
@endsection
