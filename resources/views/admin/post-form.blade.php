@extends('admin.form')

@section('title')
    Tạo mới bài viết
@endsection

@php
$viewName = 'post';
@endphp

@section('form')

    <form id="post-form" data-parsley-validate class="form-horizontal form-label-left"
        action="{{ isset($item) ? route('admin.' . $viewName . '.update', $item->id) : route('admin.' . $viewName . '.store') }}"
        method="POST">
        @isset($item)
            @method('PUT')
        @endisset
        @csrf
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tiêu đề <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="title" id="title" value="{{ isset($item) ? $item->title : '' }}"
                    required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tóm Tắt <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <textarea name="summary" id="summary" rows="3" class="form-control col-md-7 col-xs-12" required>
                   @isset($item)
                        {{$item->summary}}
                   @endisset
                </textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thumbnail <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input type="text" name="thumbnail" value="{{ isset($item) ? $item->thumbnail : '' }}" id="thumbnail" class="form-control col-md-7 col-xs-12" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại Tin <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <select name="type" id="type" class="form-control col-md-7 col-xs-12" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ isset($item) ? ($item->type_id == $type->id ? 'selected' : '') : '' }}> {{ $type->name . " ( " . $type->category->name . " )" }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <textarea name="content" id="content" class="form-control col-md-7 col-xs-12" cols="20" required>
                    @isset($item)
                        {{$item->content}}
                    @endisset
                </textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Trạng thái
                <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <select name="status" id="status" class="form-control col-md-7 col-xs-12" required>
                    <option value="1" {{ isset($item) ? ($item->status == '1' ? 'selected' : '') : '' }}>Active</option>
                    <option value="0" {{ isset($item) ? ($item->status == '0' ? 'selected' : '') : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hightlight">Nổi Bật
                <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <input value="1" class="checkbox-inline" type="checkbox" name="hightlight"
                    {{ isset($item) ? ($item->hightlight == '1' ? 'checked' : '') : '' }}>
            </div>
        </div>


        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="{{ route('admin.' . $viewName . '.index') }}" class="btn btn-danger" type="button">Quay về</a>
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </form>



@endsection
