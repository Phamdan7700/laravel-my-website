@extends('admin.main')

@section('title')
{{ __('dashboard.user') }}
@endsection

@php
$view = 'category';
@endphp

@section('table-list')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>

                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Email</th>
                                    <th class="column-title">Fullname</th>
                                    <th class="column-title">Avatar</th>
                                    <th class="column-title">Tạo mới</th>
                                    <th class="column-title">Chỉnh sửa</th>
                                    <th class="column-title">Hành động</th>

                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @isset($items)
                                    @foreach ($items as $item)
                                        <tr class="even pointer">
                                            <td class="">{{ $loop->iteration }}</td>
                                            <td width="10%">{{ $item->email }}</td>
                                            <td width="10%">{{ $item->name }}</td>
                                            <td width="5%"><img src="{{ $item->avatar }}" alt="admin" class="zvn-thumb"></td>

                                            <td>
                                                <p><i class="fa fa-user"></i> {{ $item->name }}</p>
                                                <p><i class="fa fa-clock-o"></i> {{ $item->created_at }}</p>
                                            </td>
                                            <td>
                                                <p><i class="fa fa-user"></i> {{ $item->name }}</p>
                                                <p><i class="fa fa-clock-o"></i> {{ $item->updated_at }}</p>
                                            </td>
                                            <td class="last">
                                                <div class="zvn-box-btn-filter">
                                                    <a href="{{ route('admin.' . $view . '.edit', $item->id) }}" type="button"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-icon btn-danger btn-delete"
                                                        data-toggle="modal" data-target="#myModal-{{ $item->id }}"
                                                        data-placement="top" data-original-title="Delete">
                                                        <i class=" fa fa-trash"></i>
                                                    </button>
                                                    <form id="form-delete-{{ $item->id }}"
                                                        action="{{ route('admin.' . $view . '.destroy', $item->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                    {{-- Modal --}}
                                                    <div class="modal fade" id="myModal-{{ $item->id }}" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Thông Báo</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Xác nhận xóa?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('admin.' . $view . '.destroy', $item->id) }}"
                                                                        type="button" class="btn btn-danger"
                                                                        data-dismiss="modal"
                                                                        onclick="event.preventDefault();document.getElementById('form-delete-{{ $item->id }}').submit();">Xóa</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
