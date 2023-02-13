<!doctype html>
<html lang="{{ app()->getLocale() }}" class="{{ app()->getLocale() }} html mobile-hidden-x">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZhannaKanGroup - @yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('seo_description')">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="auth" content="{{ auth()->check() ? auth()->id() : 'no' }}">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K9PD5QG');</script>
    <!-- End Google Tag Manager -->

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('i/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('i/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('i/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('i/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('i/favicon/safari-pinned-tab.svg" color="#5bbad5' ) }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/theme.css') }}">
    @stack('css')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-223123521-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-223123521-1');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(88013626, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/88013626" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <meta name="facebook-domain-verification" content="b8dj1xyh9qgt5jdzrb8g7uml24y7m4" />

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '189076429885898');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=189076429885898&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body class="body mobile-hidden-x">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9PD5QG"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@include('partials.header')

@yield('content')

@include('partials.footer')

@yield('modal')

@include('partials.modals')

@if(request()->path() === '/')
    @desktop
        <div class="cursor"></div>
    @enddesktop
@endif

<div class="loader">
    <div class="lds-ripple"><div></div><div></div></div>
</div>

<div class="cookie-acceptance flex item-center space-between {{ Cookie::get('cookie-accept') == '1' ? 'hidden' : '' }}">
    <p>
        {!! __('Мы используем файлы cookie') !!}
    </p>
    <div class="flex">
        <a href="{{ route('page.info.law') }}" class="btn-white">{{ __('Подробнее') }}</a>
        <a href="#" class="btn-black accept-cookies">{{ __('Принять') }} <img src="{{ url('i/icons/check.svg') }}" alt=""></a>
    </div>
</div>

<div class="remodal product-mini-modal" data-remodal-id="product-show" data-remodal-options="hashTracking: false">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="inner-content"></div>
</div>

<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full&skin=dark&lazy=true"></script>
<script src="{{ mix('js/theme.js') }}"></script>
@yield('scripts')
</body>
</html>
