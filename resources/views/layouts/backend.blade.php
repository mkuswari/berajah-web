<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('layouts.include.backend._head')
{{-- end of head --}}

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- navbar --}}
            @include('layouts.include.backend._navbar')
            {{-- end of navbar --}}

            {{-- sidebar --}}
            @include('layouts.include.backend._sidebar')
            {{-- end of sidebar --}}

            {{-- content --}}
            @yield('content')
            {{-- end of content --}}

            {{-- footer --}}
            @include('layouts.include.backend._footer')
            {{-- end of footer --}}

        </div>
    </div>

    {{-- scripts --}}
    @include('layouts.include.backend._scripts')
    {{-- end of scripts --}}
</body>

</html>
