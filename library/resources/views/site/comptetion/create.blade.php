@extends('layouts.master')
@section('css')
<style>
   .correct{
	border-color: green !important;
   }

</style>
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Forms</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Form-wizards</span>
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


				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									new comptetion
								</div>
								<div id="wizard3">
									<h3 class="mb-2">comptetions Information</h3>
									<section>
										<form action="/comptetion/" method="POST" id="comptetionForm" >
										@csrf
										<div class="control-group form-group">
											<input type="text" class="form-control required" placeholder="title" name="title">
										</div>
										<div class="control-group form-group">
                                            <label class="form-label">description</label>
											<textarea cols="4" rows="4" type="email" class="form-control required"  placeholder="description" name="description" > </textarea>
										</div>

										<div class="control-group form-group mb-0">
											<label class="form-label">start date</label>
											<input type="date" name="start_date"  class="form-control required" >
										</div>
										<input type="hidden" id="comptetionDetails"  name="comptetionDetails">

										<div class="control-group form-group mb-0">
											<label class="form-label">end date</label>
											<input type="date"  name="end_date" class="form-control required" >
										</div>
										</form>
									</section>
									<h3>questions and answers</h3>
									<section >
                                        <div id="qusetions">
											<div id="copy" class=" control-group form-group mb-0" style="display: none">
												<input type="text"   placeholder="question" class=" question form-control required" >
											    <div class="row">
													<div class="col-lg-3">
														<input type="text"   placeholder="answer1" class=" answer1 form-control required" >
													</div>
													<div class="col-lg-3">
														<input type="text"  placeholder="answer1" class=" answer2 form-control required" >
													</div>
													<div class="col-lg-3">
														<input type="text"  placeholder="answer1" class=" answer3 form-control required" >
													</div>
													<div class="col-lg-3">
													   <select class=" correct form-control" name="correct" id="">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													   </select>
													</div>

												</div>
											</div>
                                        <div class="questionContaier control-group form-group mb-0">
											<input type="text"   placeholder="question" class=" question form-control required" >
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <input type="text"   placeholder="answer1" class=" answer1 form-control required" >
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text"  placeholder="answer1" class=" answer2 form-control required" >
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text"  placeholder="answer1" class=" answer3 form-control required" >
                                                </div>
                                                <div class="col-lg-3">
                                                   <select class=" correct form-control" name="correct" id="">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
												   </select>
                                                </div>

                                            </div>
										</div>
                                    </div>
                                    <button onclick="addQuestion()"  id="newQuestion">newQuestion</button>
									</section>

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
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps2.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
<script>
function addQuestion(){
	 let questionArray = [];
	let newQuestion = $("#copy").clone() ;
	newQuestion.css("display","block");
	$(newQuestion).find(".question").val("new question")
	$(newQuestion).addClass("questionContaier")
	$(newQuestion).appendTo($("#qusetions"));
// 	$(".questionContaier").each(function(i){
//     // console.log( .text());
// 	let question = $(this).find(".question").val();
// 	let answer1 = $(this).find(".answer1").val();
// 	let answer2 = $(this).find(".answer2").val();
// 	let answer3 = $(this).find(".answer3").val();
// 		questionArray.push(
// 			{
// 		     "question":question ,
// 			 "answers":[
// 				answer1 , answer2 , answer3
// 			 ]
// 		     }
// 		)

//   });
}
function submitComptetion(){
	// $.post('/comptetion/create', {category:'client', type:'premium'} , function(data){
	// 	console.log(data)
	// });
	let questionArray = [];

	$(".questionContaier").each(function(i){
    // console.log( .text());
	let question = $(this).find(".question").val();
	let answer1 = $(this).find(".answer1").val();
	let answer2 = $(this).find(".answer2").val();
	let answer3 = $(this).find(".answer3").val();
	let correct = $(this).find(".correct").val();
	// console.log($(answer1).hasClass("test"))
		questionArray.push(
			{
		     "question":question ,
			 "answers":[
		     	{"answer":answer1 , "index":1},
		     	{"answer":answer2 , "index":2},
		     	{"answer":answer3 , "index":3},
			 ]
			 ,
			 "correct":correct
		     }
		)

  });
 $(comptetionDetails).val((JSON.stringify(questionArray)));
 $(comptetionForm).submit();
}
// $('.answer').click(function(){
// 	$(this).addClass("correct")
// })
</script>
@endsection
