@extends('layouts.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ $book->name }}</h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-1"><img style="max-height: 400px" src="/storage/{{$book->image}}" alt="image"/></div>
										  {{-- <div class="tab-pane" id="pic-2"><img src="{{URL::asset('assets/img/ecommerce/shirt-2.png')}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-3"><img src="{{URL::asset('assets/img/ecommerce/shirt-3.png')}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-4"><img src="{{URL::asset('assets/img/ecommerce/shirt-4.png')}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-5"><img src="{{URL::asset('assets/img/ecommerce/shirt-1.png')}}" alt="image"/></div> --}}
										</div>
										{{-- <ul class="preview-thumbnail nav nav-tabs">
										  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-5.png')}}" alt="image"/></a></li>
										  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-2.png')}}" alt="image"/></a></li>
										  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-3.png')}}" alt="image"/></a></li>
										  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-4.png')}}" alt="image"/></a></li>
										  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-1.png')}}" alt="image"/></a></li>
										</ul> --}}
									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">{{ $book->name }}</h4>
										<p class="text-muted tx-13 mb-1">{{ $book->category->name }}</p>
										<div class="rating mb-1">
											<div class="stars">
												<strong> {{ round($book->rate) }} </strong><span class="fa fa-star checked"></span>
											</div>
											<span class="review-no">41 saved</span>
										</div>
										<h6 class="price">{{ $book->paid ==  0 ? 'free' : $book->price }}</p>
										<p class="vote"><strong>  <a href="/profile/{{ $book->user_id }}" class="" type="button">{{ $book->user->userName }}</a></strong></p>
										<div class="action">
                                            @if($book->user_id == Auth::user()->id)
                                            <a href="/storage/{{ $book->file }}" class="add-to-cart btn btn-info" type="button">view</a>
                                        </a>

                                            @elseIf(saved($book->id))
                                            <a href="/storage/{{ $book->file }}" class="add-to-cart btn btn-info" type="button">view</a>
                                            @else
                                            <a href="/save/{{ $book->id }}" class="add-to-cart btn btn-success" type="button">save</a>
                                            </a>
                                            @endif
										</div>
										<div class="card custom-card">
											<div class="card-body">
												<div>
													<h6 class="card-title mb-1">rate it </h6>
												</div>
												<div class="rating-stars block" id="more-rating">
													<form method="POST" action="/book/rate/">

													</form>
													<input type="number" name="rate"  readonly="readonly" class="rating-value d-none" name="more-rating-stars-value" id="more-rating-stars-value" value="2" >
													<div class="rating-stars-container">
														<div class="rating-star">
															<i class="fa fa-star rate "></i>
														</div>
														<div class="rating-star">
															<i class="fa fa-star rate"></i>
														</div>
														<div class="rating-star">
															<i class="fa fa-star rate"></i>
														</div>
														<div class="rating-star">
															<i class="fa fa-star rate"></i>
														</div>
														<div class="rating-star">
															<i class="fa fa-star rate"></i>
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</div>
						 		</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				{{-- <div class="row">
					<div class="col-lg-3">
						<div class="card item-card">
							<div class="card-body pb-0 h-100">
								<div class="text-center">
									<img src="{{URL::asset('assets/img/ecommerce/01.jpg')}}" alt="img" class="img-fluid">
								</div>
								<div class="card-body cardbody relative">
									<div class="cardtitle">
										<span>Items</span>
										<a>Sport shoes</a>
									</div>
									<div class="cardprice">
										<span class="type--strikethrough">$999</span>
										<span>$799</span>
									</div>
								</div>
							</div>
							<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
								<a href="#" class="btn btn-primary"> View More</a>
								<a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card item-card">
							<div class="card-body pb-0 h-100">
								<div class="text-center">
									<img src="{{URL::asset('assets/img/ecommerce/04.jpg')}}" alt="img" class="img-fluid">
								</div>
								<div class="card-body cardbody relative">
									<div class="cardtitle">
										<span>Fashion</span>
										<a>Mens Shoes</a>
									</div>
									<div class="cardprice">
										<span class="type--strikethrough">$999</span>
										<span>$799</span>
									</div>
								</div>
							</div>
							<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
								<a href="#" class="btn btn-primary"> View More</a>
								<a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card item-card">
							<div class="card-body pb-0 h-100">
								<div class="text-center">
									<img src="{{URL::asset('assets/img/ecommerce/07.jpg')}}" alt="img" class="img-fluid">
								</div>
								<div class="card-body cardbody relative ">
									<div class="cardtitle">
										<span>Accessories</span>
										<a>Metal Watch</a>
									</div>
									<div class="cardprice">
										<span class="type--strikethrough">$999</span>
										<span>$799</span>
									</div>
								</div>
							</div>
							<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
								<a href="#" class="btn btn-primary"> View More</a>
								<a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card item-card">
							<div class="card-body pb-0 h-100">
								<div class="text-center">
									<img src="{{URL::asset('assets/img/ecommerce/08.jpg')}}" alt="img" class="img-fluid">
								</div>
								<div class="card-body cardbody relative">
									<div class="cardtitle">
										<span>Accessories</span>
										<a>Metal Watch</a>
									</div>
									<div class="cardprice">
										<span class="type--strikethrough">$999</span>
										<span>$799</span>
									</div>
								</div>
							</div>
							<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
								<a href="#" class="btn btn-primary"> View More</a>
								<a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="feature2">
									<i class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">Free Shipping</h5>
								<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="feature2">
									<i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">Customer Support</h5>
								<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="feature2">
									<i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<div class="icon-return"></div>
								<h5 class="mb-2  tx-16">30 days money back</h5>
								<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
							</div>
						</div>
					</div>
				</div> --}}
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<script >
	$('.rate').click(function(){
		let rate  = $(".rating-value").val();
		let book = {{ $book->id }}
		// console.log(book)
		$.get("/book/rate/"+book+'/'+rate , function(data){
           window.location.reload();
		})
	})
</script>
@endsection
