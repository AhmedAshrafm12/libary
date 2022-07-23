@extends('site.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-8">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="/storage/{{$user->avatar}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{ $user->userName }}</h5>
											</div>
										</div>


										<div class="row">
											<div class="col-md- col mb20">
												<h5>{{ count($user->following) }}</h5>
												<h6 class="text-small text-muted mb-0">following</h6>

											</div>

										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">contacts</label>
										<div class="main-profile-social-list">
											<div class="media">
												{{-- <div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-Gmail"></i>
												</div> --}}
												<div class="media-body">
													<span>email</span> <a href="">{{ $user->email }}</a>
												</div>
											</div>
											<div class="media">
												{{-- <div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div> --}}
												<div class="media-body">
													<span>mobile</span> <a href="">{{ $user->mobile }}</a>
												</div>
											</div>
											<div class="media">
												{{-- <div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div> --}}
											
											</div>
											<div class="media">

												<div class="media-body">
													{{--  @if($user->id !=Auth::user()->id)
													@if(!$follow)
												  <a  class="btn btn-info-gradient" href="/follow/{{ $user->id }}">follow</a>
                                                    @else
												  <a  class="btn btn-danger-gradient" href="/follow/{{ $user->id }}">unfollow</a>
												  @endif
													@endif  --}}

												</div>
											</div>

										</div>
										<hr class="mg-y-30">
									</div><!-- main-profile-overview -->
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
@endsection
