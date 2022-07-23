@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
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
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">

								<div class="main-content-label mg-b-5">
									{{ $comptetion->title }}
								</div>
								<p class="mg-b-20">time : 30</p>
								<div class="row">
									<div class="col-lg-12">
										<div class="bg-gray-200 p-4">
                                                @csrf
                                            @foreach ($comptetion->questions as $question )

                                            <div class="form-group">
												<input class="form-control" disabled placeholder="Enter your username" type="text" value="{{ $question->question }}">
                                                <div class="row mg-t-10">
                                                   @foreach ($question->answers as $answer )
                                                   <div class="col-lg-3">
                                                    <label class="rdiobox"><input disabled class="answerSelect"

                                                        {{ $answer->correct == 1  ?  "checked" : '' }}

                                                        data-question="{{ $answer->question_id }}" name="rdio{{ $question->id }}" type="radio"> <span>{{ $answer->answer }}</span></label>
                                                </div>
                                                   @endforeach

                                                </div>
											</div>



                                            @endforeach


									</div>

								</div>
							</div>

						</div>
                        @if($comptetion->status != 0)
                        <a href="/rank/ {{  $comptetion->id  }}" class="btn btn-success">Ranks</a>
                        @endif

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
{{--  <script >

    $('.answerSelect').click(function(){
        $(this).addClass("selected");
        $(this).siblings().removeClass("selected");
    })

    $('#confirm').click(function(){
        $(this).fadeOut();
        $("#submit").fadeIn();
    })


   $("#submit").click(function(){

    let answersArray  = [];


	$(".answerSelect").each(function(i){
        if($(this).hasClass("selected")){
        let answerId = $(this).data("answer");
        let questionId =  $(this).data("question");

        // console.log($(answer1).hasClass("test"))
        answersArray.push(
                {
                 "question":questionId ,
                 "answer":answerId
                }
            )

   }});

   $(answers).val(JSON.stringify(answersArray));
$("form").submit();

}
   )


</script>  --}}
@endsection
