<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('layouts.include.frontend._head')
{{-- end of head --}}

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- sidebar --}}
        @include('layouts.include.frontend._sidebar')
        {{-- end of sidebar --}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- topbar --}}
                @include('layouts.include.frontend._topbar')
                {{-- end of topbar --}}

                {{-- content --}}
                @yield('content')
                {{-- end of content --}}

            </div>
            <!-- End of Main Content -->

            {{-- footer --}}
            @include('layouts.include.frontend._footer')
            {{-- end of footer --}}

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- scripts --}}
    @include('layouts.include.frontend._scripts')
    {{-- end of scripts --}}

</body>

</html>
