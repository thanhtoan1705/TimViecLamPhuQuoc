@if (isset($settings))
    <!-- Title -->
    <title>@yield('seo_title', $settings->seo_title)</title>

    <!-- Basic Meta Tags -->
    <meta name="author" content="@yield('seo_title', $settings->seo_title)">
    <meta name="description" content="@yield('seo_description', $settings->seo_description)">
    <meta name="keywords" content="@yield('seo_keywords', $settings->seo_keywords)">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('seo_title', $settings->seo_title)">
    <meta property="og:description" content="@yield('seo_description', $settings->seo_description)">
    <meta property="og:image" content="{{ asset('storage').'/' }}@yield('seo_image', $settings->seo_image)">
    <meta property="og:url" content="https://www.vieclamphuquoc.com.vn">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.vieclamphuquoc.com.vn">
    <meta name="twitter:title" content="@yield('seo_title', $settings->seo_title)">
    <meta name="twitter:description" content="@yield('seo_description', $settings->seo_description)">
    <meta name="twitter:image" content="{{ asset('storage').'/' }}@yield('seo_image', $settings->seo_image)">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/' . $settings->favicon) }}" type="image/x-icon">

    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{ $settings->company_name }}",
            "url": "https://www.vieclamphuquoc.com.vn",
            "logo": "{{ asset('storage').'/' }}@yield('seo_image', $settings->seo_image)",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "{{ $settings->hotline }}",
                "contactType": "Customer Service"
            },
            "sameAs": [
                "{{ $settings->facebook }}",
                "{{ $settings->twitter }}",
                "{{ $settings->instagram }}",
                "{{ $settings->youtube }}"
            ]
        }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [
            {
              "@type": "ListItem",
              "position": 1,
              "name": "Trang chủ",
              "item": "https://www.vieclamphuquoc.com.vn"
            },
            {
              "@type": "ListItem",
              "position": 2,
              "name": "Tin tuyển dụng",
              "item": "https://www.vieclamphuquoc.com.vn/tin-tuyen-dung"
            },
            {
              "@type": "ListItem",
              "position": 3,
              "name": "Công ty tuyển dụng",
              "item": "https://www.vieclamphuquoc.com.vn/nha-tuyen-dung"
            },
            {
              "@type": "ListItem",
              "position": 4,
              "name": "Giới thiệu",
              "item": "https://www.vieclamphuquoc.com.vn/gioi-thieu"
            }
          ]
        }
    </script>


@endif

