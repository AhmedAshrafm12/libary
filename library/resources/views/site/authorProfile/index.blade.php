@extends('site.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit-Profile</span>
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
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
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
										<h6>Bio</h6>
										<div class="main-profile-bio">
											<p class="m-b-5">{{ $user->about->about }}</p>
											<div class="m-t-30">
									
													<p><b>{{ $user->registrationDate }}</b></p>
								
												</div>
										</div>
								
										<div class="row">
											<div class="col-md-4 col mb20">
												<h5>{{ count($user->followers) }}</h5>
												<h6 class="text-small text-muted mb-0">Followers</h6>

											</div>
											<div class="col-md-4 col mb20">
												<h5>{{ count($user->books) }}</h5>
												<h6 class="text-small text-muted mb-0">books</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>{{ count($user->articles) }}</h5>
												<h6 class="text-small text-muted mb-0">article</h6>
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
									
												<div class="media-body">
													@if($user->id !=Auth::user()->id)
													@if(!$follow)
												  <a  class="btn btn-info-gradient" href="/follow/{{ $user->id }}">follow</a>
                                                    @else
												  <a  class="btn btn-danger-gradient" href="/follow/{{ $user->id }}">unfollow</a>
												  @endif
													@endif

												</div>
											</div>
									
										</div>
										<hr class="mg-y-30">
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
				
						<div class="card">
							<div class="card-body">
				
									<div class="tab-pane" id="profile">
										<h3>latest books</h3>
										<div class="row">
											@foreach ($latest_books as  $book)
											<div class="col-sm-3">
												<div class="border p-1 card thumb">
													<a href="#" 
													class="image-popup" title="Screenshot-2"> <img src="/storage/{{$book->image}}" class="thumb-img img-responsive" style="width: 230px ; height:150px" alt="work-thumbnail"> </a>
													<h4 class="text-center tx-14 mt-3 mb-0"><a href="/book/{{ $book->id }}">{{ $book->name }}</a></h4>
													<div class="ga-border"></div>
													<p class="text-muted text-center"><small>{{ $book->category->name }}</small></p>
												</div>
											</div>
											@endforeach
								
										</div>
										<h3>latest articles</h3>
										<div class="row">
											@foreach ($latest_articles as  $article)
											<div class="col-sm-3">
												<div class="border p-1 card thumb">
													<a href="#" 
													class="image-popup" title="Screenshot-2"> <img src="/storage/{{$article->cover}}" class="thumb-img img-responsive" style="width: 230px ; height:150px" alt="work-thumbnail"> </a>
													<h4 class="text-center tx-14 mt-3 mb-0"><a href="/author/article/{{ $article->id }}">{{ $article->subject }}</a></h4>
													<div class="ga-border"></div>
													<p class="text-muted text-center"><small>{{ $article->category->name }}</small></p>
												</div>
											</div>
											@endforeach
								
										</div>
									</div>
									{{-- <div class="tab-pane" id="settings">
										<form role="form">
											<div class="form-group">
												<label for="FullName">Full Name</label>
												<input type="text" value="John Doe" id="FullName" class="form-control">
											</div>
											<div class="form-group">
												<label for="Email">Email</label>
												<input type="email" value="first.last@example.com" id="Email" class="form-control">
											</div>
											<div class="form-group">
												<label for="Username">Username</label>
												<input type="text" value="john" id="Username" class="form-control">
											</div>
											<div class="form-group">
												<label for="Password">Password</label>
												<input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
											</div>
											<div class="form-group">
												<label for="RePassword">Re-Password</label>
												<input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
											</div>
											<div class="form-group">
												<label for="AboutMe">About Me</label>
												<textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
										</form>
									</div> --}}
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