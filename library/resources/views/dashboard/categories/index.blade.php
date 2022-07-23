@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">categories</h4>
						</div>
					</div>
			
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">

					<div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-sm-t-0">
						<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-slide-in-right" data-toggle="modal" href="#modaldemo8">Add Category</a>
					</div>
					<!--div-->
     
					<div class="col-xl-12">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if (\Session::has('add'))
						<div class="alert alert-success">
							<ul>
								<li>{!! \Session::get('add') !!}</li>
							</ul>
						</div>
					@endif
						@if (\Session::has('update'))
						<div class="alert alert-info">
							<ul>
								<li>{!! \Session::get('update') !!}</li>
							</ul>
						</div>
					@endif
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">name</th>
												<th class="wd-20p border-bottom-0">description</th>
												<th class="wd-20p border-bottom-0">status</th>
												<th class="wd-20p border-bottom-0">updated_at</th>
												<th class="wd-15p border-bottom-0">action</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($categories as $category )
                                        <tr>

                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>{{$category->status == 0 ? 'disabled' : "active" }}</td>
                                            <td>{{$category->updated_at}}</td>
                                            <td><a class="btn ripple btn-primary" data-category="{{ $category }}" data-target="#updateCategory" data-toggle="modal" href="">update</a>
											</td>
                                            <td><a class="btn ripple btn-success"  href=""> books</a>
											</td>
                      
                                        </tr>

                                        @endforeach
								
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

		
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add category</h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal " method="POST" action="/admin/category" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name" id="name"  name="name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="description" placeholder="description" name='description'>
							</div>
							<div class="form-group mb-0 justify-content-end">
								<div class="checkbox">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" data-checkboxes="mygroup" id="status" name='status' class="custom-control-input" >
										<label for="checkbox-2" class="custom-control-label mt-1">status</label>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										File Browser
									</div>
									<div class="row row-sm">
										<div class="col-sm-7 col-md-6 col-lg-4">
											<div class="custom-file">
												<input class="custom-file-input" id="customFile" type="file" name="avatar"> <label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button  class="btn ripple btn-primary" type="submit">Save </button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</form>
					</div>
					<div class="modal-footer">
		
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="updateCategory">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title"></h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal " method="POST" id="updateCategoryForm" enctype="multipart/form-data">
							@csrf
							@method("PUT")
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name" id="updatename" name="name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="updatedescription" placeholder="description" name='description'>
							</div>
							<div class="form-group mb-0 justify-content-end">
							    <label for="updatestatus">status</label>
								<input name="status" id="updatestatus" checked type="checkbox">

							</div>
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										File Browser
									</div>
									<div class="row row-sm">
										<div class="col-sm-7 col-md-6 col-lg-4">
											<div class="custom-file">
												<input class="custom-file-input" id="customFile" type="file" name="avatar"> <label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button  class="btn ripple btn-primary" type="submit">Save </button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</form>
					</div>

				</div>
			</div>
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script>
    $('#updateCategory').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
		let category  = $(button).data("category")
        // var id_file = button.data('id_file')
        // var file_name = button.data('file_name')
        // var invoice_number = button.data('invoice_number')
        var modal = $(this)
        // modal.find('.modal-body #id_file').val(id_file);
        // modal.find('.modal-body #file_name').val(file_name);
        // modal.find('.modal-body #invoice_number').val(invoice_number);
		updatename.value= 'test'
		$('#updatedescription').val(category.description)
		
	   $('.modal-title').text('update '+category.name)	
	   
	   $('#updateCategoryForm').attr('action','/admin/category/'+category.id);

	   category.status==1 ? $('#updatestatus').attr("checked","checked") : $('#updatestatus').removeAttr("checked","checked");
  })

</script>
@endsection