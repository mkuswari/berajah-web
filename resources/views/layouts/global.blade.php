<!doctype html>
<html lang="en">

{{-- head --}}
@include('layouts.include.global._head')
{{-- end of head --}}

<body>
    {{-- navbar --}}
    @include('layouts.include.global._navbar')
    {{-- end of navbar --}}

    {{-- content --}}
    @yield('content')
    {{-- end of content --}}

    {{-- footer --}}
    @include('layouts.include.global._footer')
    {{-- end of footer --}}

    {{-- scripts --}}
    @include('layouts.include.global._scripts')
    {{-- end of scripts --}}
</body>

</html>
