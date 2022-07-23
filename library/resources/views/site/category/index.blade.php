@extends('site.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/</span>
						</div>
					</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
			@foreach ($categories as $category )
			<div class="col-lg-3 col-md-6">
				<div class="card  bg-success-gradient">
					<div class="card-body">
						<div class="counter-status d-flex md-mb-0">
							<div class="mr-auto">
								<a href="/categories/{{ $category->id }}">
								<h2 class=" tx-white-8 mb-3">{{ $category->name }} ( <span class="tx-5 counter">{{ count($category->books) }}</span> )</h2>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

				</div>
				<!-- row closed -->

				<!-- row -->

				<!-- /row -->

				<!-- row -->

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
<!--Internal Counters -->
<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
<!--Internal Time Counter -->
<script src="{{URL::asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counter.js')}}"></script>
@endsection
