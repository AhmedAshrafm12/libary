@extends('site.layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
<div class="my-auto">
    <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
            Tabs</span>
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
                                    <li class=""><a href="#books" class="active" data-toggle="tab"><i
                                                class="fa fa-book"></i> BOOKS</a></li>
                                    <li><a href="#articles" data-toggle="tab"><i class="fa fa-cube"></i>
                                            articles </a></li>
                                    <li><a href="#comptetions" data-toggle="tab"><i class="fa fa-cube"></i>
                                            comptetions </a></li>
                                    <li><a href="#orders" data-toggle="tab"><i class="fa fa-cube"></i>
                                            orders </a></li>
                                    <li><a href="#followers" data-toggle="tab"><i class="fa fa-cube"></i>
                                            followes </a></li>

                                    {{-- <li><a href="#tab13" data-toggle="tab"><i class="fa fa-cogs"></i> Tab Style 03</a></li>
<li><a href="#tab14" data-toggle="tab"><i class="fa fa-tasks"></i> Tab Style 04</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="books">

                                    <div class="card mg-b-20" id="tabs-style2">
                                        <div class="card-body">

                                            <div class="text-wrap">
                                                <div class="example">
                                                    <div class="panel panel-primary tabs-style-2">
                                                        <div class=" tab-menu-heading">
                                                            <div class="tabs-menu1">
                                                                <!-- Tabs -->
                                                                <ul class="nav panel-tabs main-nav-line">
                                                                    <li><a href="#active_books"
                                                                            class="nav-link active"
                                                                            data-toggle="tab">active</a></li>
                                                                    <li><a href="#pending_books" class="nav-link"
                                                                            data-toggle="tab">pending</a></li>
                                                                    <li><a href="#archievd_books" class="nav-link"
                                                                            data-toggle="tab">archived</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="panel-body tabs-menu-body main-content-body-right border">
                                                            <div class="tab-content">
                                                                {{-- active books --}}

                                                                <div class="tab-pane active" id="active_books">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">#
                                                                                </th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    name</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    saved</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    rate</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($books as $book)
                                                                                @if ($book->status == 1)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $book->name }}</td>
                                                                                        <td>{{ $book->description }}
                                                                                        </td>
                                                                                        <td>{{ 6 }}</td>
                                                                                        <td>{{ 4.0 }}</td>
                                                                                        <td>
                                                                                            <a href="/storage/{{ $book->file }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a  href="/deactiveBook/{{ $book->id }}"
                                                                                                class="btn btn-danger-gradient action">deactive</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                {{-- pending books --}}
                                                                <div class="tab-pane" id="pending_books">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">#
                                                                                </th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    name</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    saved</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    rate</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($books as $book)
                                                                                @if ($book->status == 0)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $book->name }}
                                                                                        </td>
                                                                                        <td>{{ $book->description }}
                                                                                        </td>
                                                                                        <td>{{ 6 }}
                                                                                        </td>
                                                                                        <td>{{ 4.0 }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="/storage/{{ $book->file }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a href="/book/destroy/{{ $book->id }}"
                                                                                                class="btn btn-danger-gradient action">delete</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="tab-pane" id="archievd_books">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">#
                                                                                </th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    name</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    saved</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    rate</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($books as $book)
                                                                                @if ($book->status != 1 && $book->status != 0)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $book->name }}
                                                                                        </td>
                                                                                        <td>{{ $book->description }}
                                                                                        </td>
                                                                                        <td>{{ 6 }}
                                                                                        </td>
                                                                                        <td>{{ 4.0 }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="/storage/{{ $book->file }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                                @if($book->paid == 1 )
                                                                                                <span 
                                                                                                class="btn btn-success-gradient">this book is paid</span>
                                                                                            @else
                                                                                                <a href="/book/destroy/{{ $book->id }}"
                                                                                                class="btn btn-danger-gradient action">delete</a>
                                                                                                @endif

                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="tx-13"><a href="/book/create"
                                                class="btn btn-success btn-block"> new book</a></label>

                                    </div>
                                </div>



                                {{-- articles --}}
                                <div class="tab-pane " id="articles">


                                    <div class="card mg-b-20" id="tabs-style2">
                                        <div class="card-body">

                                            <div class="text-wrap">
                                                <div class="example">
                                                    <div class="panel panel-primary tabs-style-2">
                                                        <div class=" tab-menu-heading">
                                                            <div class="tabs-menu1">
                                                                <!-- Tabs -->
                                                                <ul class="nav panel-tabs main-nav-line">
                                                                    <li><a href="#active_artcs"
                                                                            class="nav-link active"
                                                                            data-toggle="tab">active</a></li>
                                                                    <li><a href="#pending_artcs" class="nav-link"
                                                                            data-toggle="tab">pending</a></li>
                                                                    <li><a href="#archived_artcs" class="nav-link"
                                                                            data-toggle="tab">archived</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="panel-body tabs-menu-body main-content-body-right border">
                                                            <div class="tab-content">
                                                                {{-- active arts --}}

                                                                <div class="tab-pane active" id="active_artcs">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    #</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    subject</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>

                                                                                <th class="wd-20p border-bottom-0">
                                                                                    rate</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($articles as $article)
                                                                                @if ($article->status == 1)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $article->subject }}
                                                                                        </td>
                                                                                        <td>{{ $article->description }}
                                                                                        </td>
                                                                                        <td>{{ 4.0 }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="/article/{{ $article->id }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a href="/deactiveArticle/{{ $article->id }}"
                                                                                                class="btn btn-danger-gradient action">deactive</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                {{-- pending arts --}}

                                                                <div class="tab-pane " id="pending_artcs">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    #</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    subject</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>

                                                                                <th class="wd-20p border-bottom-0">
                                                                                    rate</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($articles as $article)
                                                                                @if ($article->status == 0)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $article->subject }}
                                                                                        </td>
                                                                                        <td>{{ $article->description }}
                                                                                        </td>
                                                                                        <td>{{ 4.0 }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="/article/{{ $article->id }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a href="/article/destroy/{{ $article->id }}"
                                                                                                class="btn btn-danger-gradient action">delete</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="tab-pane " id="archived_artcs">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    #</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    subject</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>

                                                                                <th class="wd-20p border-bottom-0">
                                                                                    rate</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($articles as $article)
                                                                                @if ($article->status != 0 && $article->status != 1)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $article->subject }}
                                                                                        </td>
                                                                                        <td>{{ $article->description }}
                                                                                        </td>
                                                                                        <td>{{ 4.0 }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="/article/{{ $article->id }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a href="/article/destroy/{{ $article->id }}"
                                                                                                class="btn btn-danger-gradient action">delete</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="tx-13"><a href="/article/create"
                                                class="btn btn-info btn-block"> new article</a></label>
                                    </div>
                                </div>

                                <div class="tab-pane " id="comptetions">


                                    <div class="card mg-b-20" id="tabs-style2">
                                        <div class="card-body">

                                            <div class="text-wrap">
                                                <div class="example">
                                                    <div class="panel panel-primary tabs-style-2">
                                                        <div class=" tab-menu-heading">
                                                            <div class="tabs-menu1">
                                                                <!-- Tabs -->
                                                                <ul class="nav panel-tabs main-nav-line">
                                                                    <li><a href="#active_comps"
                                                                            class="nav-link active"
                                                                            data-toggle="tab">active</a></li>
                                                                    <li><a href="#pending_comps" class="nav-link"
                                                                            data-toggle="tab">pending</a></li>
                                                                    <li><a href="#archived_comps" class="nav-link"
                                                                            data-toggle="tab">archived</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="panel-body tabs-menu-body main-content-body-right border">
                                                            <div class="tab-content">
                                                                {{-- active arts --}}

                                                                <div class="tab-pane active" id="active_comps">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    #</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    titile</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    participants</th>

                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($comptetions as $comptetion)
                                                                                @if ($comptetion->status == 1)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $comptetion->title }}
                                                                                        </td>
                                                                                        <td>{{ $comptetion->description }}
                                                                                        </td>
                                                                                        <td>{{ count($comptetion->ranks) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="/comptetion/view/{{ $comptetion->id }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a href="/deactive/{{ $comptetion->id }}"
                                                                                                class="btn btn-danger-gradient action">deactive</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                {{-- pending arts --}}

                                                                <div class="tab-pane " id="pending_comps">
                                                                    <table class="table text-md-nowrap"
                                                                        id="example1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    #</th>
                                                                                <th class="wd-15p border-bottom-0">
                                                                                    titile</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    description</th>


                                                                                <th class="wd-15p border-bottom-0">
                                                                                    action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($comptetions as $comptetion)
                                                                            @if ($comptetion->status == 0)
                                                                                    <tr>

                                                                                        <td>{{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td>{{ $comptetion->title }}
                                                                                        </td>
                                                                                        <td>{{ $comptetion->description }}
                                                                                        </td>

                                                                                        <td>
                                                                                            <a href="/comptetion/view/{{ $comptetion->id }}"
                                                                                                class="btn btn-primary-gradient">view</a>
                                                                                            <a href="/comptetion/delete/{{ $comptetion->id }}"
                                                                                                class="btn btn-danger-gradient action">delete</a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="tab-pane " id="archived_comps">
                                                                    <table class="table text-md-nowrap"
                                                                    id="example1">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="wd-15p border-bottom-0">
                                                                                #</th>
                                                                            <th class="wd-15p border-bottom-0">
                                                                                titile</th>
                                                                            <th class="wd-20p border-bottom-0">
                                                                                description</th>
                                                                                <th class="wd-20p border-bottom-0">
                                                                                    participants</th>

                                                                            <th class="wd-15p border-bottom-0">
                                                                                action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($comptetions as $comptetion)
                                                                            @if ($comptetion->status != 0 && $comptetion->status != 1)
                                                                                <tr>

                                                                                    <td>{{ $loop->iteration }}
                                                                                    </td>
                                                                                    <td>{{ $comptetion->title }}
                                                                                    </td>
                                                                                    <td>{{ $comptetion->description }}
                                                                                    </td>
                                                                                    <td>{{ count($comptetion->ranks) }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="/comptetion/view/{{ $comptetion->id }}"
                                                                                            class="btn btn-primary-gradient">view</a>
                                                                                        <a href="/comptetion/delete/{{ $comptetion->id }}"
                                                                                            class="btn btn-danger-gradient action">delete</a>
                                                                                    </td>

                                                                                </tr>
                                                                            @endif
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="tx-13"><a href="/comptetion/create"
                                                class="btn btn-info btn-block"> new comptetion</a></label>
                                    </div>
                                </div>


                                <div class="tab-pane " id="orders">


                                    <div class="card mg-b-20" id="tabs-style2">
                                        <div class="card mg-b-20" id="tabs-style2">
                                            <div class="card-body">
                                                <div class="table-responsive border-top userlist-table">
                                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th ><span>payer</span></th>
                                                                <th><span>book</span></th>
                                                                <th ><span>price</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach (auth()->user()->orders as $order )
                                                        <tr>

                                                            <td><a href="/profile/{{ $order->payer->id }}">{{ $order->payer->userName }}</a></td>

                                                            <td>
                                                                <a href="/book/{{ $order->book->id }}" > {{ $order->book->name }}</a>
                                                            </td>
                                                            <td>
                                                                <strong>{{ $order->book->price }}</strong>
                                                            </td>



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
                                    </div>

                                </div>

                                <div class="tab-pane " id="followers">


                                    <div class="card mg-b-20" id="tabs-style2">
                                        <div class="card-body">
                                            <div class="table-responsive border-top userlist-table">
                                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th ><span>User</span></th>


                                                            <th><span>name</span></th>
                                                            <th ><span>Email</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach (auth()->user()->followers as $follower )
                                                    <tr>
                                                        <td>
                                                            <img alt="avatar" class="rounded-circle avatar-md mr-2" src="/storage/{{ $follower->avatar }}">
                                                        </td>
                                                        <td><a href="/profile/{{ $follower->id }}">{{ $follower->userName }}</a></td>
                                                        <td>
                                                            {{ $follower->email}}
                                                        </td>



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
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!-- Internal Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Internal Input tags js-->
<script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
<!--- Tabs JS-->
<script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
<script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
<!--Internal  Clipboard js-->
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
<!-- Internal Prism js-->
<script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
<script>
$('.action').click(function(e){
    e.preventDefault();
    if(confirm("are you shure"))
    window.location.href=$(this).attr('href'); 
})

</script>
@endsection
