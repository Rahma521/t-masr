<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Form-v5 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/roboto-font.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('fonts/font-awesome-5/css/fontawesome-all.min.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body class="form-v5">
    <div class="page-content">
        <div class="form-v5-content">
            @if (app()->getLocale() == 'ar') 
            <a class="dropdown-item" href="{{route ('language','en')}}" data-language="en">
            <i class="flag-icon flag-icon-us"></i> English</a>
            @else
            <a class="dropdown-item" href="{{route ('language','ar')}}" data-language="fr">
            <i class="flag-icon flag-icon-eg"></i> العربية</a>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          @yield('auth')
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
