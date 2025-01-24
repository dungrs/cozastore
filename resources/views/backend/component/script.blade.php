<script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ asset('backend/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('backend/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- swiper js -->
<script src="{{ asset('backend/libs/swiper/swiper-bundle.min.js') }}"></script>


<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@if (isset($config['js']) && is_array($config['js']))
    @foreach ($config['js'] as $item)
        <script src="{{ asset($item) }}"></script>
    @endforeach
@endif