<meta charset="utf-8" />
<title>Vertical | Vuesy - Admin & Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesdesign" name="author" />
<link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

<!-- plugin css -->
<link href="{{ asset('backend/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

<!-- swiper css -->
<link rel="stylesheet" href="{{ asset('backend/libs/swiper/swiper-bundle.min.css') }}">

<!-- Bootstrap Css -->
<link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

<!-- Icons Css -->
<link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- App Css-->
<link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

<!-- Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@if (isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $item)
        <link rel="stylesheet" href="{{ asset($val) }}">
    @endforeach
@endif