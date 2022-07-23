@extends('site.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div class="main-dashboard-header-right">

							{{-- <div>
								<label class="tx-13">Offline Sales</label>
								<h5>783,675</h5>
							</div> --}}
						</div>
					</div>

				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="latest-books">
					<h3>{{ $category->name }}</h3>
				<div class="row row-sm">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="row row-sm">
							@foreach ($category->books as $book)
                            @if($book->status == 1)
                            <div class="col-md-2 col-lg-2 col-xl-2  col-sm-2">
								<div class="card">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-pink"><a href="#">New</a></div>
												<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
											</div>
											<img class="w-100" style="max-height: 200px" src="/storage/{{$book->image}}" alt="book-image">
										    @if($book->user_id ==  Auth::user()->id)
                                            <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-check-circle "></i>
                                            </a>
                                            @elseIf(!saved($book->id))
										  <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-arrow-alt-circle-down "></i>
										  </a>
										  @else
										  <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-check-circle "></i>
										  </a>
										  @endif


										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase"> <a href="/book/{{ $book->id }}">{{ $book->name }}</a>
											</h3>
											<span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">{{ $book->paid ==  0 ? 'free' : $book->price }}</h4>
										</div>
									</div>
								</div>
							</div>
                            @endif

							@endforeach

							</div>


						</div>
					</div>
				</div>


				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
