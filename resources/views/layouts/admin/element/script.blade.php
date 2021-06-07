
<!-- Bootstrap -->
<script src="{{ asset('pageadmin/asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('pageadmin/js/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('pageadmin/asset/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('pageadmin/asset/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('pageadmin/asset/iCheck/icheck.min.js') }}"></script>
<!-- Custom Theme Scripts -->
{{-- <script src="{{ asset('pageadmin/js/custom.min.js') }}"></script> --}}


<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });


        $("#btn-clear").click(function() {
            var value = '';
            $("#myInput").val(value).focus();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(".hightlight").click(function() {
            var id = $(this).data("id");
            var url = $(this).data("url");
            var obj = this;
            $.ajax({
                url: url,
                type: 'put',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'put',
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $(obj).children().toggleClass(
                        'text-danger');
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });

        $(".status").click(function() {
            var id = $(this).data("id");
            var url = $(this).data("url");
            var obj = this;
            $.ajax({
                url: url,
                type: 'put',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'put',
                    "_token": "{{ csrf_token() }}",
                },
                success: function(result) {
                    if (result == 1) {
                        $(obj).addClass('btn-success');
                        $(obj).removeClass('btn-warning');
                        $(obj).html('Active');
                    } else {
                        $(obj).addClass('btn-warning');
                        $(obj).removeClass('btn-success');
                        $(obj).html('Inactive');

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });

        $("#category").on('change', function() {
            var category_id = $(this).val();
            var url = "{{ route('admin.get-type', '') }}" + "/" + category_id;
            $.get(url, function(data) {
                $('#type').empty();
                $.each(data, function(index, value) {
                   $('#type').append(`<option value="${value.id}" >${value.name}</option>`)
                });
            })


        })

        
    });
    // 

</script>


@yield('script')
