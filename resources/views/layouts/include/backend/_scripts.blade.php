<!-- General JS Scripts -->
<script src="{{ asset('backend/modules/jquery.min.js') }}"></script>
<script src="{{ asset('backend/modules/popper.js') }}"></script>
<script src="{{ asset('backend/modules/tooltip.js') }}"></script>
<script src="{{ asset('backend/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('backend/modules/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('backend/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('backend/modules/chart.min.js') }}"></script>
<script src="{{ asset('backend/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('backend/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('backend/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('backend/js/page/index-0.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('backend/js/scripts.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>
@stack('scripts')
