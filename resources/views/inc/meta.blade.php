<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Primary Meta Tags -->
<meta name="title" content="@yield('meta_title', '@yield("title") | Danira\'s Dalmoth - Premium Namkeen & Snacks Manufacturer Nepal')">
<meta name="description" content="@yield('meta_desc','Danira\'s Dalmoth - Leading manufacturer of premium dalmoth, namkeen, and crispy snacks in Nepal. Fresh, hygienic, and delicious traditional snacks with modern quality standards. Buy authentic Nepali dalmoth online.')">
<meta name="keywords" content="@yield('meta_keywords', 'dalmoth Nepal, namkeen Nepal, Danira\'s Dalmoth, buy dalmoth online, crispy snacks Nepal, traditional snacks, Nepali namkeen, healthy snacks Nepal, dalmoth manufacturer, premium snacks, spicy namkeen, मिठो नमकीन')">
<meta name="author" content="@yield('author','Danira\'s Dalmoth')">
<meta name="robots" content="@yield('robots','index,follow')">
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="copyright" content="© {{ date('Y') }} Danira's Dalmoth. All rights reserved.">
<meta name="geo.region" content="NP">
<meta name="geo.placename" content="Nepal">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('storage/images/logo/logo.jpg') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/logo/logo.jpg') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/images/logo/logo.jpg') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/images/logo/logo.jpg') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/images/logo/logo.jpg') }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="@yield('og_type','website')" />
<meta property="og:url" content="@yield('og_url', url()->current())" />
<meta property="og:title" content="@yield('og_title', '@yield("title") | Danira\'s Dalmoth')" />
<meta property="og:description" content="@yield('og_desc', 'Premium manufacturer of authentic Nepali dalmoth, namkeen & traditional snacks. Fresh, crispy, and hygienically packed products with guaranteed quality.')" />
<meta property="og:image" content="@yield('og_image', asset('storage/images/logo/logo.jpg'))" />
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="Danira's Dalmoth" />
<meta property="og:locale" content="en_US" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="@yield('twitter_url', url()->current())">
<meta name="twitter:title" content="@yield('twitter_title', '@yield("title") | Danira\'s Dalmoth')">
<meta name="twitter:description" content="@yield('twitter_desc', 'Premium Nepali dalmoth & namkeen manufacturer. Fresh, crispy, traditional snacks with modern quality.')">
<meta name="twitter:image" content="@yield('twitter_image', asset('storage/images/logo/logo.jpg'))">

<!-- Canonical URL -->
<link rel="canonical" href="@yield('canonical', url()->current())" />

<!-- Schema.org Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Danira's Dalmoth",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('storage/images/logo/logo.jpg') }}",
  "description": "Premium manufacturer of authentic Nepali dalmoth, namkeen, and traditional snacks in Nepal.",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "NP",
    "addressLocality": "Nepal"
  },
  "sameAs": [
    "@yield('facebook_url', '#')",
    "@yield('instagram_url', '#')",
    "@yield('twitter_url_social', '#')"
  ]
}
</script>

@yield('structured_data')