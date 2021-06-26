@extends('admin.main')

@section('title')
    {{ __('dashboard.category') }}
@endsection

@php
$view = 'category';
@endphp


@section('table-list')
    <div class="x_content">
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">#</th>
                        <th class="column-title">{{ __('dashboard.category') }}</th>
                        <th class="column-title">Slug</th>
                        <th class="column-title"> {{ __('dashboard.status') }} </th>
                        <th class="column-title">{{ __('dashboard.created_at') }}</th>
                        <th class="column-title">{{ __('dashboard.updated_at') }}</th>
                        <th class="column-title">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @isset($items)
                        @foreach ($items as $item)
                            <tr class="even pointer">
                                <td class="">{{ $loop->iteration }}</td>
                                <td width="10%">{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <span style="width: 100px" type="button" data-id="{{ $item->id }}"
                                        data-url="{{ route('admin.' . $view . '-change-status', $item->id) }}"
                                        class="status btn btn-round  {{ $item->status ? 'btn-success' : 'btn-warning' }}">
                                        {{ $item->status ? 'Active' : 'Inactive' }} </span>

                                </td>
                                <td>
                                    <p><i class="fa fa-user"></i> {{ $item->createdBy['name'] ?? null }}</p>
                                    <p><i class="fa fa-clock-o"></i> {{ $item->created_at }}</p>
                                </td>
                                <td>
                                    <p><i class="fa fa-user"></i> {{ $item->updatedBy['name'] ?? null }}</p>
                                    <p><i class="fa fa-clock-o"></i> {{ $item->updated_at }}</p>
                                </td>
                                <td class="last">
                                    <div class="zvn-box-btn-filter">
                                        <a href="{{ route('admin.' . $view . '.edit', $item->id) }}" type="button"
                                            class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top"
                                            data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <button type="button" class="btn btn-icon btn-danger btn-delete" data-toggle="modal"
                                            data-target="#myModal-{{ $item->id }}" data-placement="top"
                                            data-original-title="Delete">
                                            <i class=" fa fa-trash"></i>
                                        </button>
                                        <form id="form-delete-{{ $item->id }}"
                                            action="{{ route('admin.' . $view . '.destroy', $item->id) }}" method="POST">
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
                                                            type="button" class="btn btn-danger" data-dismiss="modal"
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

@endsection
