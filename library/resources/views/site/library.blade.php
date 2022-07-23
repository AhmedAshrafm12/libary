@extends('site.layouts.master')
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
            <h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Tabs</span>
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
<!-- row opened -->
<div class="row row-sm">

    <!-- /div -->

    <div class="col-xl-12">
        <!-- div -->
        <div class="card mg-b-20" id="tabs-style3">
            <div class="card-body">

                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-3">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#saved_books" class="active" data-toggle="tab"><i class="fa fa-laptop"></i>SAVED BOOKS</a></li>
                                        <li><a href="#favourite_books" data-toggle="tab"><i class="fa fa-cube"></i> FAVOURITE BOOKS </a></li>
                                        <li><a href="#favourite_articles" data-toggle="tab"><i class="fa fa-cube"></i> FAVOURITE ARTICLES </a></li>
                                        {{-- <li><a href="#tab13" data-toggle="tab"><i class="fa fa-cogs"></i> Tab Style 03</a></li>
<li><a href="#tab14" data-toggle="tab"><i class="fa fa-tasks"></i> Tab Style 04</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="saved_books">
                                        <div class="latest-books">
                                            <div class="row row-sm">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row row-sm">
                                                        @foreach ($saved_books as $book)
                                                        <div class="col-md-2 col-lg-2 col-xl-2  col-sm-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="pro-img-box">
                                                                        <div class="d-flex product-sale">
                                                                            <div class="badge bg-pink"><a href="#">New</a></div>
                                                                            <a href="/addToFavourites/{{ $book->id }}">
                                                                                <i class="mdi  	{{ favourite($book->id) == 0  ?" mdi-heart-outline " : "mdi-heart text-danger"  }}
ml-auto wishlist"></i></a>
                                                                        </div>
                                                                        <img class="w-100" style="max-height: 200px" src="/storage/{{$book->image}}" alt="book-image">
                                                                        @if($book->user_id == Auth::user()->id)
                                                                        <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-check-circle "></i>
                                                                        </a>
                                                                        @elseIf(!saved($book->id))
                                                                        <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-arrow-alt-circle-down "></i>
                                                                        </a>
                                                                        @else
                                                                        <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-check-circle "></i>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="favourite_articles">
                                        <div class="latest-articles">
                                        <div class="row row-sm">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="row row-sm">
                                                    @foreach ($favourite_articles as $article )							
                                                    <div class="col-md-2 col-lg-2 col-xl-2  col-sm-2">
                                                        <div class="card custom-card">
                                                            <a href="/favouriteArticle/{{ $article->id }}">
                                                                <i class="mdi  	{{ favouriteArticle($article->id) == 0  ?" mdi-heart-outline " : "mdi-heart text-danger"  }}
                                                                    ml-auto wishlist"></i></a>
                                                            <img class="card-img-top w-100 bg-danger-transparent" src="/storage/{{$article->cover}}"   alt="">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{ $article->subject }}</h4>
                                                                <p class="card-text">{{ $article->description }} </p>
                                                                <a class="" href="/author/article/{{ $article->id }}">Read More<i class="fe fe-arrow-right ml-1"></i></a>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    @endforeach
                        
                                                    </div>
                                        
                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="favourite_books">
                                        <div class="latest-books">
                                            <div class="row row-sm">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row row-sm">
                                                        @foreach ($favourite_books as $book)
                                                        <div class="col-md-2 col-lg-2 col-xl-2  col-sm-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="pro-img-box">
                                                                        <div class="d-flex product-sale">
                                                                            <div class="badge bg-pink"><a href="#">New</a></div>
                                                                            <a href="/addToFavourites/{{ $book->id }}">
                                                                                <i class="mdi  	{{ favourite($book->id) == 0  ?" mdi-heart-outline " : "mdi-heart text-danger"  }}
ml-auto wishlist"></i></a>
                                                                        </div>
                                                                        <img class="w-100" style="max-height: 200px" src="/storage/{{$book->image}}" alt="book-image">
                                                                        @if($book->user_id == Auth::user()->id)
                                                                        <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-check-circle "></i>
                                                                        </a>
                                                                        @elseIf(!saved($book->id))
                                                                        <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-arrow-alt-circle-down "></i>
                                                                        </a>
                                                                        @else
                                                                        <a href="/save/{{ $book->id }}" class="adtocart"> <i class="far fa-check-circle "></i>
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
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                    </div>


                    <!---Prism Pre code-->
                </div>
            </div>
        </div>
    </div>
    <!-- /div -->


</div>
<!-- /div -->
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
