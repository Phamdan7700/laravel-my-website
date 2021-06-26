@extends('admin.form')

@section('title')
    Tạo mới loại tin
@endsection

@php
$view = 'type';
@endphp

@section('form')

    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
        action="{{ isset($item) ? route('admin.' . $view . '.update', $item->id) : route('admin.' . $view . '.store') }}"
        method="POST">
        @isset($item)
            @method('PUT')
        @endisset
        @csrf
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên Loại Tin <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" id="name" value="{{ isset($item) ? $item->name : '' }}" required="required"
                    class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Trạng thái
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="status" id="status" class="form-control col-md-7 col-xs-12" required>
                    <option value="1" {{ isset($item) ? ($item->status == '1' ? 'selected' : '') : '' }}>Active</option>
                    <option value="0" {{ isset($item) ? ($item->status == '0' ? 'selected' : '') : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Thể Loại
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="category" id="category" class="form-control col-md-7 col-xs-12" required>
                    @isset($categories)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ isset($item) ? ($category->id == $item->category_id ? 'selected' : '') : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="{{ route('admin.' . $view . '.index') }}" class="btn btn-danger" type="button">Quay về</a>
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </form>

@endsection
