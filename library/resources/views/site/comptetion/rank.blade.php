@extends('site.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">

					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">

							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
                                                <th>rank</th>
												<th class="wd-lg-8p"><span>User</span></th>
												<th class="wd-lg-8p"><span>mark</span></th>
												<th class="wd-lg-20p"><span>at</span></th>
												<th class="wd-lg-20p"><span>action</span></th>

											</tr>
										</thead>
										<tbody>
										@foreach ($ranks as $rank )
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $rank->user->userName }}</td>
                                            <td>{{ $rank->rank}}</td>

                                            <td>
                                                <span>{{ $rank->created_at }}</span>
                                            </td>

                                            @if(Auth::user()->id == $rank->comptetion->user_id)
                                            <td>
												<a class="btn ripple btn-primary" data-user="{{ $rank->user->id }}" data-target="#gifts" data-toggle="modal">gift</a>                                            </td>
                                          @endif

                                        </tr>
                                        @endforeach

										</tbody>
									</table>
								</div>
								<ul class="pagination mt-4 mb-0 float-left">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">4</a></li>
									<li class="page-item"><a class="page-link" href="#">5</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>

		<div class="modal" id="gifts">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title"></h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body" id="">
						<table class="table text-md-nowrap" id="example1">
							<thead>
								<tr>
									<th class="wd-15p border-bottom-0">book</th>
									<th class="wd-15p border-bottom-0">price</th>
									<th class="wd-20p border-bottom-0"></th>
								
								</tr>
							</thead>
							<tbody id="modalBody">
								
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script>
$('#gifts').on('show.bs.modal', function(event) {
	var button = $(event.relatedTarget)
	let user_id = $(button).data('user');
     $.get("/getPaidBooks" , function(data){
	data.forEach(element => {

		modalBody.innerHTML =`
		<tr>
				<td><a class='' href="/book/${element.id}">${element.name}"</a></td>
				<td>${element.price}</td>
				<td><a class="btn btn-success sendGift" href='/gift/${user_id}/${element.id}'>send</a></td>
			
			</tr>

		`
		;
	});
	 }).done(function(){
		$('.sendGift').click(function(e){
			e.preventDefault();
			if(confirm("are you shure"))
           window.location.href=$(this).attr('href'); 
		})
	 })
  })
</script>
@endsection
