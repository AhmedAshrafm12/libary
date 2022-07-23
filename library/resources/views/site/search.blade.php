@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">search</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ </span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card" id="basic-alert">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">around {{ count($books) + count($users) +count($articles)  }} results found</h6>
							
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-1">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">books</a></li>
														<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">articles</a></li>
														<li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">users</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab1">
														<div class="row row-sm">
															@foreach ($books as $book)
															<div class="col-md-2 col-lg-2 col-xl-2  col-sm-2">
																<div class="card">
																	<div class="card-body">
																		<div class="pro-img-box">
																			<div class="d-flex product-sale">
																				<div class="badge bg-success"><a href="/profile/{{ $book->user->id }}">{{ $book->user->userName }}</a></div>
																				<a href="/addToFavourites/{{ $book->id }}">
																				<i class="mdi  	{{ favourite($book->id) == 0  ?" mdi-heart-outline " : "mdi-heart text-danger"  }}
																					ml-auto wishlist"></i></a>
																			</div>
																			<img class="w-100" style="max-height: 200px" src="/storage/{{$book->image}}" alt="book-image">
																			@if($book->user_id ==  Auth::user()->id)
																			<a href="/storage/{{ $book->file }}" class="adtocart"> <i class="far fa-check-circle "></i>
																			</a>
																			@elseIf(!saved($book->id))
																		  <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-arrow-alt-circle-down "></i>
																		  </a>
																		  @else
																		  <a href="/storage/{{ $book->file }}" class="adtocart"> <i class="far fa-check-circle "></i>
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
															@endforeach
															</div>
								
								
														</div>
													
													<div class="tab-pane" id="tab2">
														@foreach ($articles as $article )
														<div class="col-md-2 col-lg-2 col-xl-2  col-sm-2">
															<div class="card custom-card">
																<a href="/favouriteArticle/{{ $article->id }}">
																	<i class="mdi  	{{ favouriteArticle($article->id) == 0  ?" mdi-heart-outline " : "mdi-heart text-danger"  }}
																		ml-auto wishlist"></i></a>
																<img style="height: 200px !important" class="card-img-top w-100 bg-danger-transparent" src="/storage/{{$article->cover}}"   alt="">
																<div class="card-body">
							
																	<h4 class="card-title">{{ $article->subject }}</h4>
																	<p class="card-text">{{ $article->description }} </p>
																	<a class="" href="/article/{{ $article->id }}">Read More<i class="fe fe-arrow-right ml-1"></i></a>
																</div>
															 </div>
														</div>
														@endforeach
													</div>
													<div class="tab-pane" id="tab3">
													@foreach ($users as $user )
													<div class="listgroup-example2">
														<ul class="list-group">
															@if($user->id != Auth::user()->id)
															<li><a href="/profile/{{ $user->id }}">{{ $user->userName }}</a></li>
															@endif
														
														
														</ul>
													</div>													
													@endforeach
													</div>
												</div>
											</div>
										</div>
									</div>
						
<!-- Prism Code -->

<!-- End Prism Precode -->
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
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
@endsection