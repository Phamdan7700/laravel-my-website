@extends('admin.form')

@section('title')
    Tạo mới thể loại
@endsection

@section('form')

    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
        action="{{ isset($item) ? route('admin.category.update', $item->id) : route('admin.category.store') }}"
        method="POST">
        @isset($item)
            @method('PUT')
        @endisset
        @csrf
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên Thể Loại <span class="required">*</span>
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

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="{{ route('admin.category.index') }}" class="btn btn-danger" type="button">Quay về</a>
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </form>



@endsection
