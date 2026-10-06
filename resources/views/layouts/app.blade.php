<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selalu Teh - Teh Terenak No.2 di Indonesia</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    
    <!-- Font & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css'])
</head>
<body style="margin:0; padding:0; background-color:#FAFAFA;">

    <!-- Header / Navbar -->
    <header class="header">
        <div class="container">
            <a href="#" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Selalu Teh" height="40">
                <h1>Selalu Teh</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact" class="btn-nav">Hubungi Kami</a></li>
                    <li>
                        <a href="#lokasi" class="btn-map-nav" aria-label="Lihat lokasi gerai">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-info">
                <div class="footer-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <div>
                        <h4 style="color: #9CA3AF; font-size: 0.85rem; text-transform: uppercase;">ALAMAT ALAMAT</h4>
                        <p style="font-weight: 600;">{{ env('SELALUTEH_ADDRESS', 'Jl. Gunung Gandek NO.35 RT.26') }}</p>
                    </div>
                </div>
                <div class="footer-box">
                    <i class="fa-solid fa-phone"></i>
                    <div>
                        <h4 style="color: #9CA3AF; font-size: 0.85rem; text-transform: uppercase;">KONTAK KAMI</h4>
                        <p style="font-weight: 600;">{{ env('SELALUTEH_PHONE', '+6285393404774') }}</p>
                    </div>
                </div>
                <div class="footer-box">
                    <i class="fa-solid fa-envelope"></i>
                    <div>
                        <h4 style="color: #9CA3AF; font-size: 0.85rem; text-transform: uppercase;">EMAIL RESMI</h4>
                        <p style="font-weight: 600;">{{ env('SELALUTEH_EMAIL', 'selaluteh@foodinesia.com') }}</p>
                    </div>
                </div>
            </div>

            <div class="footer-socials">
                <a href="https://www.facebook.com/selaluteh/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/selaluteh.id/?hl=en" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.tiktok.com/discover/selalu-teh" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            </div>
            
            <p style="text-align: center; color: #6B7280; font-size: 0.9rem;">
                &copy; {{ date('Y') }} <strong>Selalu Teh</strong> by Foodinesia IT Core. All Rights Reserved.
            </p>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <div class="whatsapp-float">
        <a href="https://foodinesia.com/call" target="_blank" title="Hubungi Kami via WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

</body>
</html>