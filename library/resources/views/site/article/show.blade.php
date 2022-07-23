@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ $article->category->name }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $article->user->userName}}</span>
						</div>
					</div>
			
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-9 col-md-9">
						<div class="card custom-card">
							<img class="card-img-top w-100 bg-danger-transparent" src="/storage/{{$article->cover}}"   alt="" style="max-height: 200px">
							<div class="card-body">
								<h4 class="card-title">{{ $article->subject }}</h4>
								<p class="card-text">{{ $article->description }} </p>
								<p class="card-text">{{ $article->content }} </p>
								<a class="bg-success p-2 text-light" href="/profile/{{ $article->user->id }}">{{ $article->user->userName }}</a>

							</div>
						 </div>
					</div>
				
				</div>
				<!-- /row -->

				<!-- row -->
		
				<!-- row closed -->
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
@endsection