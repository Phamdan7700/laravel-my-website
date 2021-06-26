@include('layouts.admin.element.head')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!--Sidebar left-->
            <div class="col-md-3 left_col">
                @include('layouts.admin.element.sidebar-left')
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                @include('layouts.admin.element.top-nav')
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer -->
            <footer>
                <div class="pull-right">
                    &copy; 2020-
                    @php
                        echo date('Y');
                    @endphp
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer -->
        </div>
    </div>
    @include('layouts.admin.element.script')
</body>

</html>
