@extends('master')
@section('mainsection')
<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Promotion Item</h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">


		<div class="row">
		<div class="col-12">
			<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
				<div class="MultiCarousel-inner">
					@foreach($items as $item)
					  @if(!$item->discount==0)
					<div class="item">
						<div class="pad15">
							<img src="{{ asset($item->photo)}}" width="120" height="100">
							<p class="text-truncate">{{$item->name}}</p>
							<p class="item-price">
								<span class="d-block">{{$item->price}}</span>
								<span class="d-block">Discount : {{$item->discount}}%</span>
							</p>

							<div class="star-rating">
								<ul class="list-inline">
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
									<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
								</ul>
							</div>

							<a href="#"
								class="addtocartBtn text-decoration-none add_to_cart"
							data-id="{{$item->id}}"
							data-name="{{$item->name}}"
							data-price="{{$item->price}}"
							data-photo="{{$item->photo}}"
							data-discount="{{$item->discount}}"
							>
							Add To Cart</a>

						</div>
					</div>
                    @endif
					@endforeach
				</div>
				<button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
			</div>		
		</div>
	</div>

	</div>
@endsection


