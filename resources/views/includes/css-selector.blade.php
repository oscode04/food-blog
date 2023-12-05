@if (Request::is('kategori'))
    <link rel="stylesheet" href="{{asset('../style/kategori.css')}}">   
@elseif(Request::is('about-us'))    
    <link rel="stylesheet" href="{{ asset('../style/kontak.css') }}" />
@elseif(Request::is('inovasi-pangan'))    
    <link rel="stylesheet" href="{{ asset('../style/inovasi-pangan.css') }}" />
@elseif(Request::is('produk'))    
    <link rel="stylesheet" href="{{ asset('../style/edukasi.css') }}" />
@elseif(Request::is('food-tech'))    
    <link rel="stylesheet" href="{{ asset('../style/edukasi.css') }}" />
@elseif(Request::is('life-style'))    
    <link rel="stylesheet" href="{{ asset('../style/edukasi.css') }}" />
@elseif(Request::is('healty-food'))    
    <link rel="stylesheet" href="{{ asset('../style/edukasi.css') }}" />
@elseif(Request::is('edukasi'))    
    <link rel="stylesheet" href="{{ asset('../style/edukasi.css') }}" />
@elseif(Request::is('artikel-details/*'))    
    <link rel="stylesheet" href="{{ asset('../style/detail.css') }}" />
@else
    <link rel="stylesheet" href="{{ asset('../style/main-style.css') }}" />
@endif

<link rel="stylesheet" href="{{ asset('../style/navbar-custom.css') }}" />
<link rel="stylesheet" href="{{ asset('../style/footer.css') }}" />