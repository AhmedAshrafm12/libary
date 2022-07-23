@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoice</span>
						</div>
					</div>
			
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
										<h1 class="invoice-title">Invoice</h1>
										<div class="billed-from">
											<h6>order details</h6>
					
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
				
										<table class="table table-invoice border text-md-nowrap mb-0">
											<thead>
												<tr>
													<th class="wd-20p">book</th>
													<th class="wd-40p">site income</th>
													<th class="tx-center">user income</th>
													<th class="tx-right">payer</th>
													<th class="tx-right">date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{ $order->book->name }}</td>
													<td class="tx-12">
                                                        {{ $order->site->value }}
                                                        </td>
													<td class="tx-center">
                                                        {{ $order->userIncome->value }}
                                                    </td>
													<td class="tx-right">{{ $order->payer->userName }}</td>
													<td class="tx-right">{{ $order->created_at }}</td>
												</tr>
										
											</tbody>
										</table>
									</div>
									<hr class="mg-b-40">
									
									<a href="#" class="btn btn-danger float-left mt-3 mr-2">
										<i class="mdi mdi-printer ml-1"></i>Print
									</a>
									<a href="#" class="btn btn-success float-left mt-3">
										<i class="mdi mdi-telegram ml-1"></i>Send Invoice
									</a>
								</div>
							</div>
						</div>
					</div><!-- COL-END -->
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
@endsection