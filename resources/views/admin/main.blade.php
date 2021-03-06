@extends('layouts.admin.main')

@section('content')
    <div class="position-bottom">
        @include('alert.alert')
    </div>

    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>{{ __('dashboard.list') }}
                @isset($viewName)
                    {{ strtoupper($viewName) }}
                @endisset
            </h3>
        </div>
        @if ($viewName != 'user')
            <div class="zvn-add-new pull-right">
                <a href="{{ route('admin.' . $viewName . '.create') }}" class="btn btn-success"><i
                        class="fa fa-plus-circle"></i>  {{ __('dashboard.add') }}</a>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ __('dashboard.filter') }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6"><a href="?filter_status=all" type="button" class="btn btn-primary">
                                All <span class="badge bg-white">{{ $countAll }}</span>
                            </a><a href="?filter_status=active" type="button" class="btn btn-success">
                                Active <span class="badge bg-white">{{ $countActive }}</span>
                            </a><a href="?filter_status=inactive" type="button" class="btn btn-success">
                                Inactive <span class="badge bg-white">{{ $countInActive }}</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-active-field"
                                        data-toggle="dropdown" aria-expanded="false">
                                        Search by All <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#" class="select-field" data-field="all">Search by
                                                All</a></li>
                                        <li><a href="#" class="select-field" data-field="id">Search by
                                                ID</a></li>
                                        <li><a href="#" class="select-field" data-field="username">Search by
                                                Username</a>
                                        </li>
                                        <li><a href="#" class="select-field" data-field="fullname">Search by
                                                Fullname</a>
                                        </li>
                                        <li><a href="#" class="select-field" data-field="email">Search by
                                                Email</a></li>
                                    </ul>
                                </div>
                                <input type="text" class="form-control" name="search_value" value="" id="myInput">
                                <span class="input-group-btn">
                                    <button id="btn-clear" type="button" class="btn btn-success"
                                        style="margin-right: 0px">{{ __('dashboard.delete') }}</button> 
                                    <button id="btn-search" type="button" class="btn btn-primary">{{ __('dashboard.search') }}</button>
                                </span>
                                <input type="hidden" name="search_field" value="all">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select name="select_filter" class="form-control" data-field="level">
                                <option value="default" selected="selected">Select Level</option>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--box-lists-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ __('dashboard.list') }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>

                </div>
            @section('table-list')

            @show
        </div>
    </div>
</div>

<!--end-box-lists-->
<!--box-pagination-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-md-6">
                        <p class="m-b-0">S??? ph???n t??? tr??n trang: <b> {{ $items->currentPage() }}</b> tr??n <span
                                class="label label-success label-pagination"> {{ $items->lastPage() }} trang</span></p>
                        <p class="m-b-0">Hi???n th???<b> {{ $items->firstItem() }} </b> ?????n<b> {{ $items->lastItem() }}</b>
                            tr??n<b> {{ $items->total() }}</b> Ph???n t???</p>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination zvn-pagination">

                                {{ $items->links() }}

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-box-pagination-->

@endsection
