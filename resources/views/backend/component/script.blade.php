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

{{-- jQuery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Plugin js defaualt -->
<script src="{{ asset('backend/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('backend/libs/alertifyjs/build/alertify.min.js') }}"></script>
<script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('backend/js/app.js') }}"></script>
<script>
    const Config = {
        model: "{{ $configs['model'] ?? '' }}",
        modelParent: "{{ $configs['modelParent'] ?? '' }}",
        confirmMessages: @json(__('messages.confirmJs')) 
    };
</script>

@if (isset($configs['js']) && is_array($configs['js']))
    @foreach ($configs['js'] as $item)
        <script src="{{ asset($item) }}"></script>
    @endforeach
@endif