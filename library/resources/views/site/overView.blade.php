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
                                            <li class=""><a href="#orders" class="active" data-toggle="tab"><i
                                                        class="fa fa-book"></i> orders</a></li>
                                            <li><a href="#followes" data-toggle="tab"><i class="fa fa-cube"></i>
                                                    followers </a></li>


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
                                                                                                    <a href="/author/deactiveBook/{{ $book->id }}"
                                                                                                        class="btn btn-danger-gradient">deactive</a>
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
                                                                                                        class="btn btn-danger-gradient">delete</a>
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
                                                                                                    <a href="/book/destroy/{{ $book->id }}"
                                                                                                        class="btn btn-danger-gradient">delete</a>
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
                                                                                                    <a href="/author/article/{{ $article->id }}"
                                                                                                        class="btn btn-primary-gradient">view</a>
                                                                                                    <a href="/author/deactiveArticle/{{ $article->id }}"
                                                                                                        class="btn btn-danger-gradient">deactive</a>
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
                                                                                                    <a href="/author/article/{{ $article->id }}"
                                                                                                        class="btn btn-primary-gradient">view</a>
                                                                                                    <a href="/author/article/destroy/{{ $article->id }}"
                                                                                                        class="btn btn-danger-gradient">delete</a>
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
                                                                                                    <a href="/author/article/{{ $article->id }}"
                                                                                                        class="btn btn-primary-gradient">view</a>
                                                                                                    <a href="/author/article/destroy/{{ $article->id }}"
                                                                                                        class="btn btn-danger-gradient">delete</a>
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
                                                <label class="tx-13"><a href="/author/article/create"
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
                                                                                                        class="btn btn-danger-gradient">deactive</a>
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
                                                                                                        class="btn btn-danger-gradient">delete</a>
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
                                                                                                    class="btn btn-danger-gradient">delete</a>
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
                                                <label class="tx-13"><a href="/author/article/create"
                                                        class="btn btn-info btn-block"> new article</a></label>
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
@endsection
