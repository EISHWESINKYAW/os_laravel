@extends('backendtemplate')
@section('mainsection')
<div class="container">
	{{-- page heading --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory Edit From</h1>
	</div>
</div>
<form class="col-md-6" action="{{route('subcategories.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-md-12">
					<label>Subcategory Name</label>
					<input type="text" name="name" class="form-control" value="{{$subcategory->name}}">
					@error('name')
		  <div class="alert alert-danger">{{$message}}</div>
		@enderror
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label>Category_id</label>
					<select class="form-control form-control-md" id="inpurBrand" name="category">
				@foreach ($categories as $category)
				@if (old('category')== $category->id)
				<option value="{{ $category->id }}" selected>{{$category->name}}</option>
				@else
				<option value="{{ $category->id }}" selected>{{$category->name}}</option>
				@endif
				@endforeach
			</select>
			@error('category')
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
