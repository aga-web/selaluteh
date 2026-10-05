<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Data Pricing Autopilot
        $autopilotPricing = [
            [
                'title' => 'Paket Sosialis',
                'price' => '50jt',
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
                'price' => '190jt',
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
                'price' => '400jt',
                'features' => [
                    'Profit Sharing 40%',
                    'Laporan Keuangan',
                    'Kontrak 5 Tahun',
                    'Uang Deposit senilai 15jt',
                    'Jaminan pengembalian modal'
                ]
            ]
        ];

        // Data Pricing Swakelola
        $swakelolaPricing = [
            [
                'title' => 'Paket Basic',
                'price' => '35jt',
                'features' => [
                    'Mesin es Krim',
                    'Interior dan Exterior',
                    'Bahan baku Outlet senilai Rp 3.000.000',
                    'Apron karyawan',
                    'Sistem Kasir',
                    'Promosi',
                    'Training karyawan',
                    'CCTV',
                    'Lisensi 4 tahun',
                    'Uang Deposit senilai 15jt'
                ]
            ],
            [
                'title' => 'Paket Ekonomis',
                'price' => '70jt',
                'features' => [
                    'Mesin es Krim',
                    'Interior dan Exterior',
                    'Bahan baku Outlet senilai Rp 5.000.000',
                    'Apron karyawan',
                    'Sistem Kasir',
                    'Promosi',
                    'Training karyawan',
                    'CCTV',
                    'Lisensi 4 tahun',
                    'Uang Deposit senilai 15jt'
                ]
            ],
            [
                'title' => 'Paket Strategis',
                'price' => '150jt',
                'features' => [
                    'Mesin es Krim',
                    'Interior dan Exterior',
                    'Bahan baku Outlet senilai Rp 10.000.000',
                    'Apron karyawan',
                    'Sistem Kasir',
                    'Promosi',
                    'Training karyawan',
                    'CCTV',
                    'Lisensi 4 tahun',
                    'Uang Deposit senilai 15jt'
                ]
            ]
        ];

        // Data Tim (Foto disesuaikan dengan screenshot)
        $teams = [
            [
                'name' => 'Adi Darmawan',
                'role' => 'Founder Selalu Teh',
                'image' => 'assets/img/team/adidarmawan.jpg',
                'ig' => 'https://www.instagram.com/adi.darmawaaan/'
            ],
            [
                'name' => 'Evi Jumiyanti',
                'role' => 'Accounting',
                'image' => 'assets/img/team/evyjumiyanti.jpg',
                'ig' => 'https://www.instagram.com/evyjoemiyant/'
            ],
            [
                'name' => 'Sri Maryati',
                'role' => 'Supervisor',
                'image' => 'assets/img/team/srimaryati.jpg',
                'ig' => 'https://www.instagram.com/sriy29/'
            ],
            [
                'name' => 'Annisa Lutviani',
                'role' => 'Manager Area 1',
                'image' => 'assets/img/team/annisalutviani.jpg',
                'ig' => 'https://www.instagram.com/annisaltvniii/'
            ],
            [
                'name' => 'Rahmini',
                'role' => 'Manager Area 2',
                'image' => 'assets/img/team/rahmini.jpg',
                'ig' => 'https://www.instagram.com/rahminiii/'
            ],
        ];

        // Data Portofolio (Foto disesuaikan dengan screenshot)
        $portfolios = [
            ['title' => 'Showcase Teh 1', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc1.jpg'],
            ['title' => 'Outlet Rumah 1', 'category' => 'Outlet', 'image' => 'assets/img/portofolio/ot1.jpg'],
            ['title' => 'Showcase Teh 2', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc2.jpg'],
            ['title' => 'Outlet Rumah 2', 'category' => 'Outlet', 'image' => 'assets/img/portofolio/ot2.jpeg'],
            ['title' => 'Showcase Teh 3', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc3.jpg'],
            ['title' => 'Outlet Rumah 3', 'category' => 'Outlet', 'image' => 'assets/img/portofolio/ot3.jpg'],
            ['title' => 'Showcase Teh 4', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc4.jpg'],
            ['title' => 'Showcase Teh 5', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc5.jpg'],
            ['title' => 'Showcase Teh 6', 'category' => 'Showcase', 'image' => 'assets/img/portofolio/sc6.jpg'],
        ];

        return view('landing', compact('autopilotPricing', 'swakelolaPricing', 'teams', 'portfolios'));
    }
}