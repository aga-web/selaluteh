<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Pricing Autopilot (Kota Utama: Tenggarong, Samarinda, Balikpapan, Bontang)
    $autopilotPricing = [
        [
            'title' => 'Paket Sosialis',
            'price' => '50.000.000',
            'subtitle' => 'Kemitraan Autopilot Kota Utama',
            'popular' => false,
            'features' => [
                'Profit Sharing 10%',
                'Laporan Keuangan',
                'Kontrak 4 Tahun',
                'Uang Deposit senilai 15jt',
                'Jaminan pengembalian modal'
            ]
        ],
        [
            'title' => 'Paket Kapitalis',
            'price' => '190.000.000',
            'subtitle' => 'Kemitraan Autopilot Kota Utama',
            'popular' => true, // Highlight Rekomendasi
            'features' => [
                'Profit Sharing 40%',
                'Laporan Keuangan',
                'Kontrak 4 Tahun',
                'Uang Deposit senilai 15jt',
                'Jaminan pengembalian modal'
            ]
        ],
        [
            'title' => 'Paket Kapitalis+',
            'price' => '400.000.000',
            'subtitle' => 'Kemitraan Autopilot Kota Utama',
            'popular' => false,
            'features' => [
                'Profit Sharing 40%',
                'Laporan Keuangan',
                'Kontrak 5 Tahun',
                'Uang Deposit senilai 15jt',
                'Jaminan pengembalian modal'
            ]
        ],
    ];

    // Pricing Swakelola (Luar Kota Utama: Sangatta, Kota Bangun, Babulu, Tanjung Redeb)
    $swakelolaPricing = [
        [
            'title' => 'Paket Basic',
            'price' => '35.000.000',
            'subtitle' => 'Kemitraan Swakelola Luar Kota Utama',
            'popular' => false,
            'features' => [
                'Mesin Es Krim',
                'Interior dan Exterior',
                'Bahan baku Outlet senilai Rp 3.000.000',
                'Apron Karyawan',
                'Sistem Kasir',
                'Promosi',
                'Training Karyawan',
                'CCTV',
                'Lisensi 4 Tahun',
                'Uang Deposit senilai 15jt'
            ]
        ],
        [
            'title' => 'Paket Ekonomis',
            'price' => '70.000.000',
            'subtitle' => 'Kemitraan Swakelola Luar Kota Utama',
            'popular' => true, // Highlight Rekomendasi
            'features' => [
                'Mesin Es Krim',
                'Interior dan Exterior',
                'Bahan baku Outlet senilai Rp 5.000.000',
                'Apron Karyawan',
                'Sistem Kasir',
                'Promosi',
                'Training Karyawan',
                'CCTV',
                'Lisensi 4 Tahun',
                'Uang Deposit senilai 15jt'
            ]
        ],
        [
            'title' => 'Paket Strategis',
            'price' => '150.000.000',
            'subtitle' => 'Kemitraan Swakelola Luar Kota Utama',
            'popular' => false,
            'features' => [
                'Mesin Es Krim',
                'Interior dan Exterior',
                'Bahan baku Outlet senilai Rp 10.000.000',
                'Apron Karyawan',
                'Sistem Kasir',
                'Promosi',
                'Training Karyawan',
                'CCTV',
                'Lisensi 4 Tahun',
                'Uang Deposit senilai 15jt'
            ]
        ],
    ];

    // Portofolio & Team (Tetap gunakan data yang sudah ada sebelumnya)
    $portfolios = [
        ['title' => 'Varian Teh Spesial', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc1.jpg'],
        ['title' => '3 Kesegaran Baru Teh Series', 'category' => 'Promo', 'image' => 'assets/img/portofolio/sc2.jpg'],
        ['title' => 'Segarnya Selalu Teh', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc3.jpg'],
        ['title' => 'Outlet Selalu Teh', 'category' => 'Outlet', 'image' => 'assets/img/portofolio/ot1.jpg'],
        ['title' => 'Grand Opening Rumah Ke-89', 'category' => 'Event', 'image' => 'assets/img/portofolio/ot2.jpeg'],
        ['title' => 'Keseruan Menikmati Teh', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc4.jpg'],
        ['title' => '3 Rasa Yang Semangati Harimu', 'category' => 'Promo', 'image' => 'assets/img/portofolio/sc5.jpg'],
        ['title' => 'Selalu Teh at Samarinda Central Plaza', 'category' => 'Outlet', 'image' => 'assets/img/portofolio/ot3.jpg'],
        ['title' => 'Cita Rasa Teh Asli', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc6.jpg'],
    ];

    

    $teams = [
        ['name' => 'Adi Darmawan', 'role' => 'Founder Selalu Teh', 'image' => 'assets/img/team/adidarmawan.jpg', 'ig' => 'https://www.instagram.com/adi.darmawaaan/'],
        ['name' => 'Evi Jumiyanti', 'role' => 'Accounting', 'image' => 'assets/img/team/evyjumiyanti.jpg', 'ig' => 'https://www.instagram.com/evyjoemiyant/'],
        ['name' => 'Sri Maryati', 'role' => 'Supervisor', 'image' => 'assets/img/team/srimaryati.jpg', 'ig' => 'https://www.instagram.com/sriy29/'],
        ['name' => 'Annisa Lutviani', 'role' => 'Manager Area 1', 'image' => 'assets/img/team/annisalutviani.jpg', 'ig' => 'https://www.instagram.com/annisaltvniii/'],
        ['name' => 'Rahmini', 'role' => 'Manager Area 2', 'image' => 'assets/img/team/rahmini.jpg', 'ig' => 'https://www.instagram.com/rahminiii/'],
        ['name' => 'Aga', 'role' => 'Team Member', 'image' => 'assets/img/team/aga.png', 'ig' => 'https://www.instagram.com/'],
        ['name' => 'Hafiz', 'role' => 'Team Leader', 'image' => 'assets/img/team/hafiz.png', 'ig' => 'https://www.instagram.com/jefrinichol?utm_source=ig_web_button_share_sheet&stkn=ZDNlZDc0MzIxNw=='],
        ['name' => 'Rizky', 'role' => 'Team Member', 'image' => 'assets/img/team/rizky.png', 'ig' => 'https://www.instagram.com/'],
    ];

    return view('landing', compact('autopilotPricing', 'swakelolaPricing', 'portfolios', 'teams'));
});

Route::get('/lokasi', function () {
    return view('outlets');
});