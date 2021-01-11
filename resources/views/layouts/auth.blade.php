<!doctype html>
<html lang="en">

{{-- head --}}
@include('layouts.include.auth._head')
{{-- end of head --}}

<body class="bg-blue">

    {{-- content --}}
    @yield('content')
    {{-- end of content --}}

    {{-- scripts --}}
    @include('layouts.include.auth._scripts')
    {{-- end of scripts --}}

</body>

</html>
