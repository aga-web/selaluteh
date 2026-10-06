<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selalu Teh - Segarnya Kapan Saja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>



   @extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section id="hero">
        <div class="container hero-container">
            <div class="hero-logo-wrapper">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Selalu Teh Logo" width="120">
            </div>
            <h1>Selalu Teh</h1>
            <div class="hero-badge">
                <i class="fa-solid fa-crown" style="color: #FFB800;"></i> Teh Terenak No.2 di Indonesia
            </div>
        </div>
        
        <!-- Artistic Wave Curve -->
        <div class="hero-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="section-header">
                <span class="badge-tag">Mengenal Lebih Dekat</span>
                <h2>Cerita Selalu Teh</h2>
            </div>
            <div style="background: white; padding: 48px; border-radius: 24px; box-shadow: 0 15px 35px rgba(0,0,0,0.03); text-align: center; max-width: 850px; margin: 0 auto; border: 1px solid rgba(0,0,0,0.04);">
                <p style="font-size: 1.2rem; color: #475569; line-height: 1.9;">
                    Selalu Teh adalah brand minuman lokal yang berdiri sejak <strong style="color: #FF5500;">7 Januari 2020</strong> dengan gerai pertama berlokasi di 
                    <em>Jl. Danau Murung, Tenggarong</em>. Hingga saat ini, Selalu Teh terus mengepakkan sayapnya dan menyebar ke seluruh wilayah Kalimantan Timur.
                </p>
            </div>
        </div>
    </section>

    <!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="about-grid">
            <!-- Teks Tentang Kami -->
            <div class="about-text">
                <span class="minimal-badge">SEPUTAR SELALU TEH</span>
                
                <p>
                    <strong>Selalu Teh</strong> merupakan salah satu bisnis waralaba (franchise) minuman teh kekinian yang berfokus pada penyajian varian teh rasa dan minuman menyegarkan dengan konsep out-of-the-box serta harga yang <strong>terjangkau</strong> bagi masyarakat luas. 
                </p><br>
                <p>
                    Berdasarkan data operasional yang tertera, berikut adalah poin-poin performa dan pencapaian utamanya:
                </p>
            </div>

            <!-- Kartu Statistik -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>120+</h3>
                    <p>Total Clients</p>
                </div>
                <div class="stat-card">
                    <h3>90+</h3>
                    <p>Total Outlets</p>
                </div>
                <div class="stat-card">
                    <h3>5</h3>
                    <p>Tahun Lama Berdiri</p>
                </div>
                <div class="stat-card">
                    <h3>300+</h3>
                    <p>Orang Anak Teh</p>
                </div>
                <div class="stat-card stat-card-live highlight">
                    <div class="live-tag">
                        <span class="pulse-dot"></span> LIVE HARI INI
                    </div>
                    <h3 id="cups-sold-count">0</h3>
                    <p>Gelas Terjual Hari Ini</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script Hitung Penjualan Gelas Berdasarkan Jam -->
<script>
    function updateCupsSold() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();

        // Konversi jam & menit saat ini ke total menit sejak jam 00:00
        const currentTotalMinutes = hours * 60 + minutes;
        
        const openTimeMinutes = 7 * 60;   // Jam 07:00
        const closeTimeMinutes = 23 * 60; // Jam 23:00

        let cups = 0;

        if (currentTotalMinutes < openTimeMinutes) {
            // Sebelum jam 07.00
            cups = 0;
        } else if (currentTotalMinutes >= closeTimeMinutes) {
            // Setelah/pada jam 23.00 (Target akhir hari)
            cups = 2850;
        } else {
            // Antara jam 07:00 - 23:00
            const elapsedMinutes = currentTotalMinutes - openTimeMinutes;
            const totalOperationalMinutes = closeTimeMinutes - openTimeMinutes; // 16 jam = 960 menit

            // Target total penjualan dalam sehari (misal: ~2850 gelas)
            const targetDailyCups = 2850;

            // Rata-rata estimasi penjualan per menit
            const baseProgress = elapsedMinutes / totalOperationalMinutes;

            // Penambahan sedikit variasi/fluktuasi jam sibuk agar tidak terlalu kaku
            let cupsCalculated = Math.floor(baseProgress * targetDailyCups);

            // Pada jam 09.00 (120 menit setelah buka), diset mendekati angka 272
            if (hours === 9) {
                cupsCalculated = 272 + Math.floor(minutes * 1.5);
            }

            cups = cupsCalculated;
        }

        // Format angka dengan separator ribuan (contoh: 1.250)
        const element = document.getElementById('cups-sold-count');
        if (element) {
            element.innerText = cups.toLocaleString('id-ID');
        }
    }

    // Jalankan saat pertama kali dimuat
    document.addEventListener('DOMContentLoaded', updateCupsSold);

    // Update otomatis setiap 30 detik
    setInterval(updateCupsSold, 30000);
</script>

   <!-- Pricing Section -->
<section id="pricing" style="background: #FFFFFF; padding: 100px 0;">
    <div class="container">
        <div class="section-header">
            <span class="badge-tag">INVESTASI KEMITRAAN</span>
            <h2>Pilihan Paket Kemitraan Selalu Teh</h2>
            <p style="color: #64748B; margin-top: 8px;">Pilih skema bisnis yang sesuai dengan lokasi dan target investasi Anda</p>
            
            <!-- Tab Switcher -->
            <div class="pricing-tabs" style="margin-top: 30px; display: inline-flex; background: #F1F5F9; padding: 6px; border-radius: 50px;">
                <button type="button" id="tab-autopilot" class="pricing-tab active" onclick="switchPricing('autopilot')">Autopilot</button>
                <button type="button" id="tab-swakelola" class="pricing-tab" onclick="switchPricing('swakelola')">Swakelola</button>
            </div>
        </div>

        <!-- Section Autopilot -->
        <div id="pricing-autopilot" class="pricing-content">
            <div style="text-align: center; margin-bottom: 30px; background: #FFF5F0; padding: 16px 24px; border-radius: 16px; border: 1px dashed #FF5500;">
                <p style="color: #E63900; font-weight: 700; font-size: 0.95rem; margin: 0;">
                    <i class="fa-solid fa-location-dot" style="margin-right: 8px;"></i>
                    Khusus Kemitraan Daerah Kota Utama: <strong>Tenggarong, Samarinda, Balikpapan, Bontang</strong>
                </p>
            </div>
            
            <div class="pricing-grid">
                @foreach($autopilotPricing as $pkg)
                    <div class="pricing-card {{ $pkg['popular'] ? 'popular' : '' }}">
                        @if($pkg['popular'])
                            <div class="popular-badge">RECOMMENDED</div>
                        @endif
                        <h3>{{ $pkg['title'] }}</h3>
                        <h4>Rp {{ $pkg['price'] }}</h4>
                        <ul class="pricing-features">
                            @foreach($pkg['features'] as $feat)
                                <li><i class="fa-solid fa-circle-check"></i> {{ $feat }}</li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/{{ env('SELALUTEH_PHONE', '6281234567890') }}?text=Halo%20Selalu%20Teh,%20saya%20tertarik%20dengan%20{{ urlencode($pkg['title']) }}" target="_blank" 
                        
                        class="btn btn-investment" style="width: 100%; text-align: center; justify-content: center; margin-top: 25px;">
                            Hubungi Kami
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section Swakelola -->
        <div id="pricing-swakelola" class="pricing-content" style="display: none;">
            <div style="text-align: center; margin-bottom: 30px; background: #F0FDF4; padding: 16px 24px; border-radius: 16px; border: 1px dashed #22C55E;">
                <p style="color: #15803D; font-weight: 700; font-size: 0.95rem; margin: 0;">
                    <i class="fa-solid fa-location-dot" style="margin-right: 8px;"></i>
                    Khusus Kemitraan Luar Kota Utama: <strong>Sangatta, Kota Bangun, Babulu, Tanjung Redeb, dll.</strong>
                </p>
            </div>

            <div class="pricing-grid">
                @foreach($swakelolaPricing as $pkg)
                    <div class="pricing-card {{ $pkg['popular'] ? 'popular' : '' }}">
                        @if($pkg['popular'])
                            <div class="popular-badge">BEST VALUE</div>
                        @endif
                        <h3>{{ $pkg['title'] }}</h3>
                        <h4>Rp {{ $pkg['price'] }}</h4>
                        <ul class="pricing-features">
                            @foreach($pkg['features'] as $feat)
                                <li><i class="fa-solid fa-circle-check"></i> {{ $feat }}</li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/{{ env('SELALUTEH_PHONE', '6281234567890') }}?text=Halo%20Selalu%20Teh,%20saya%20tertarik%20dengan%20{{ urlencode($pkg['title']) }}" target="_blank" class="btn btn-investment" style="width: 100%; text-align: center; justify-content: center; margin-top: 25px;">
                            Hubungi Kami
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Script Switcher Tab Pricing -->
<script>
    function switchPricing(type) {
        const autopilotBox = document.getElementById('pricing-autopilot');
        const swakelolaBox = document.getElementById('pricing-swakelola');
        const tabAutopilot = document.getElementById('tab-autopilot');
        const tabSwakelola = document.getElementById('tab-swakelola');

        if (type === 'autopilot') {
            autopilotBox.style.display = 'block';
            swakelolaBox.style.display = 'none';
            tabAutopilot.classList.add('active');
            tabSwakelola.classList.remove('active');
        } else {
            autopilotBox.style.display = 'none';
            swakelolaBox.style.display = 'block';
            tabSwakelola.classList.add('active');
            tabAutopilot.classList.remove('active');
        }
    }
</script>
    <!-- Portfolio Section -->
<section id="portfolio" style="background: #FFF0E6; padding: 100px 0;">
    <div class="container">
        <div class="section-header">
            <span class="badge-tag">PORTFOLIO</span>
            <h2>Galeri & Aktivitas Selalu Teh</h2>
            <p style="color: #64748B; margin-top: 8px;">Melihat lebih dekat produk, promo, dan keseruan di setiap outlet Selalu Teh</p>
        </div>
        
        <div class="portfolio-grid">
            @foreach($portfolios as $item)
                <div class="portfolio-item">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy">
                    <div class="portfolio-overlay">
                        <span>{{ $item['category'] }}</span>
                        <h4 style="font-weight: 800; font-size: 1.15rem; color: #FFFFFF;">{{ $item['title'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Team Section -->
<section id="team" style="background: #F8FAFC; padding: 100px 0;">
    <div class="container">
        <div class="section-header">
            <span class="badge-tag">DI BALIK LAYAR</span>
            <h2>Tim Professional Selalu Teh</h2>
            <p style="color: #64748B; margin-top: 8px;">Orang-orang hebat yang berdedikasi menjaga kualitas dan pelayanan Selalu Teh</p>
        </div>

        <!-- Banner Foto Together / Bersama Selalu Teh -->
        <div style="margin-bottom: 50px; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1); position: relative;">
            <img src="{{ asset('assets/img/bgtim.jpg') }}" alt="Foto Bersama Selalu Teh" style="width: 100%; max-height: 450px; object-fit: cover; display: block;">
            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, 0.7) 0%, transparent 60%); display: flex; align-items: flex-end; padding: 30px;">
                <h3 style="color: #FFFFFF; font-weight: 800; font-size: 1.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">
                    Keluarga Besar & Tim Operasional Selalu Teh
                </h3>
            </div>
        </div>

        <!-- Daftar Kartu Anggota Tim -->
        <div class="team-grid">
            @foreach($teams as $member)
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="team-img" loading="lazy">
                    </div>
                    <h4>{{ $member['name'] }}</h4>
                    <span>{{ $member['role'] }}</span>
                    <div>
                        <a href="{{ $member['ig'] }}" target="_blank" title="Instagram {{ $member['name'] }}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

  <!-- Minimalist Contact Section -->
<section id="contact" class="minimal-contact">
    <div class="container">
        <div class="minimal-contact-box">
            <span class="minimal-badge">KEMITRAAN SELALU TEH</span>
            <h2>Siap Mulai Bisnis Anda?</h2>
            <p>Konsultasikan pilihan lokasi dan paket investasi kemitraan Anda langsung bersama tim kami.</p>

            <div class="minimal-action">
                <!-- Tombol WA Minimalis & Clean -->
                <a href="https://wa.me/{{ env('SELALUTEH_PHONE', '6281234567890') }}?text=Halo%20Selalu%20Teh,%20saya%20tertarik%20berkonsultasi%20kemitraan" target="_blank" class="btn-minimal-wa">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Hubungi Tim Kemitraan</span>
                </a>
            </div>

            <!-- Detail Info Ringkas -->
            <div class="minimal-info">
                <span><i class="fa-regular fa-clock"></i> Respon Cepat 08.00 - 21.00 WITA</span>
                <span class="dot-separator"> • </span>
                <span><i class="fa-solid fa-location-dot"></i> Kalimantan Timur & Sekitarnya</span>
            </div>
        </div>
    </div>
</section>

<!-- Banner Ringkas di Landing Page Utama -->
<section id="lokasi" style="background: #FFF5F0; padding: 60px 0; border: 1px solid #FFEAD8;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
        <div>
            <span class="minimal-badge">90+ GERAI TERSEBAR</span>
            <h3 style="font-size: 1.8rem; font-weight: 800; margin-top: 8px;">Cari Lokasi Selalu Teh Terdekat?</h3>
            <p style="color: #64748B;">Temukan daftar lengkap outlet dan sebaran wilayah kemitraan kami di Kalimantan Timur.</p>
        </div>
        <a href="/lokasi" class="btn-map-cta">
            <i class="fa-solid fa-map-location-dot"></i>
            <span>Lihat Peta Lokasi Lengkap</span>
        </a>
    </div>
</section>

@endsection

    <script>
        function switchPricing(type) {
            const autopilotBox = document.getElementById('pricing-autopilot');
            const swakelolaBox = document.getElementById('pricing-swakelola');
            const tabAutopilot = document.getElementById('tab-autopilot');
            const tabSwakelola = document.getElementById('tab-swakelola');

            if (type === 'autopilot') {
                autopilotBox.style.display = 'block';
                swakelolaBox.style.display = 'none';
                tabAutopilot.classList.add('active');
                tabSwakelola.classList.remove('active');
            } else {
                autopilotBox.style.display = 'none';
                swakelolaBox.style.display = 'block';
                tabAutopilot.classList.remove('active');
                tabSwakelola.classList.add('active');
            }
        }
    </script>
</body>
</html>