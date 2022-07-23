@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					{{-- <div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Forms</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Form-Layouts</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->


				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">


					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">


								<div class="row">
									<div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
										<div class="card card-body pd-20 pd-md-40 border shadow-none">
											<h5 class="card-title mg-b-20">pay with</h5>
                                            <form action="/makeOrder/{{ $book->id }}" method="POST" >
                                                @csrf
											<div class="form-group">
												<label class="main-content-label tx-11 tx-medium tx-gray-600">Name on Card</label> <input class="form-control" required="" type="text">
											</div>
											<div class="form-group">
												<label class="main-content-label tx-11 tx-medium tx-gray-600">Card Number</label>
												<div class="pos-relative">
													<input class="form-control pd-r-80" required="" type="text">
													<div class="d-flex pos-absolute t-5 r-10"><img alt="" class="wd-30 mg-r-5" src="{{URL::asset('assets/img/visa.png')}}"> <img alt="" class="wd-30" src="{{URL::asset('assets/img/mastercard.png')}}"></div>
												</div>
											</div>
											<div class="form-group">
												<div class="row row-sm">
													<div class="col-sm-9">
														<label class="main-content-label tx-11 tx-medium tx-gray-600">Expiration Date</label>
														<div class="row row-sm">
															<div class="col-sm-7">
																<select class="form-control select2-no-search">
																	<option label="Choose one">
																	</option>
																	<option value="January">
																		January
																	</option>
																	<option value="February">
																		February
																	</option>
																	<option value="March">
																		March
																	</option>
																	<option value="April">
																		April
																	</option>
																	<option value="May">
																		May
																	</option>
																</select>
															</div>
															<div class="col-sm-5 mg-t-10 mg-sm-t-0">
																<select class="form-control select2-no-search">
																	<option label="Choose one">
																	</option>
																	<option value="2018">
																		2018
																	</option>
																	<option value="2019">
																		2019
																	</option>
																	<option value="2020">
																		2020
																	</option>
																	<option value="2021">
																		2021
																	</option>
																	<option value="2022">
																		2022
																	</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-3 mg-t-20 mg-sm-t-0">
														<label class="main-content-label tx-11 tx-medium tx-gray-600">CVC</label> <input class="form-control" required="" type="text">
													</div>
												</div>
											</div>
											<div class="form-group mg-b-20">
												<label class="ckbox"><input checked type="checkbox"><span class="tx-13">Save my card for future purchases</span></label>
											</div>
											<button type="submit" class="btn btn-main-primary btn-block">Complete Payment</button>
                                        </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('assets/js/form-layouts.js')}}"></script>
@endsection
