@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert: </strong>
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert: </strong>
        {{ session('success') }}
    </div>

@endif
@if ($errors->any())
    <div style="font-size: 1.5rem" class="alert alert-danger alert-dismissible fade in zvn-alert  " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><i class="fa fa-exclamation-triangle"></i> Xảy ra lỗi!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
