@extends('layouts.admin.main')
@section('style')
    <!-- PNotify -->
    <link href="{{ asset('asset/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="page-header zvn-page-header">
            <div class="zvn-page-header-title">
                <h3>Thêm mới</h3>
            </div>
            <div class="zvn-page-header-breadcrumb ">
                <ul class="zvn-breadcrumb-title clearfix">
                    <li class="zvn-breadcrumb-item">
                        <a href="index.html">
                            Trang chủ
                        </a>
                    </li>
                    <li class="zvn-breadcrumb-item">Thêm mới
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm mới </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        
                        @include('alert.alert')
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- PNotify -->
    <script src="{{ asset(' asset/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset(' asset/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset(' asset/pnotify/dist/pnotify.nonblock.js') }}"></script>
    <script src="{{ asset('pageAdmin/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('pageAdmin/js/custom.js') }}"></script>

    <script>
        CKEDITOR.replace('content');

    </script>
@endsection
