<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Gerai - Selalu Teh</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Leaflet & MarkerCluster CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Modern Directory Layout Styles */

        .directory-container {
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 24px;
            height: calc(100vh - 180px);
            min-height: 600px;
        }

        @media (max-width: 992px) {
            .directory-container {
                grid-template-columns: 1fr;
                height: auto;
            }
        }

        .outlet-sidebar {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #E2E8F0;
            background: #FAFAFA;
        }

        .directory-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .directory-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #0F172A;
            font-weight: 700;
            font-size: 0.95rem;
        }

        .directory-title i {
            color: #FF5500;
        }

        .directory-status {
            background: #DCFCE7;
            color: #15803D;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .search-box {
            position: relative;
            margin-top: 12px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border-radius: 50px;
            border: 1px solid #CBD5E1;
            font-size: 0.88rem;
            outline: none;
            transition: all 0.2s;
        }

        .search-box input:focus {
            border-color: #FF5500;
            box-shadow: 0 0 0 3px rgba(255,85,0,0.15);
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
        }

        .outlet-list {
            flex: 1;
            overflow-y: auto;
            padding: 12px;
        }

        .outlet-item {
            padding: 16px;
            border-radius: 14px;
            border: 1px solid #F1F5F9;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s;
            background: #FFFFFF;
        }

        .outlet-item:hover, .outlet-item.active {
            border-color: #FF5500;
            background: #FFF5F0;
            transform: translateX(4px);
        }

        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #E2E8F0;
            box-shadow: 0 10px 25px rgba(0,0,0,0.04);
            position: relative;
        }

        #leaflet-map {
            width: 100%;
            height: 100%;
            min-height: 500px;
        }

        /* Marker Cluster Custom Orange */
        .marker-cluster-small, .marker-cluster-medium, .marker-cluster-large {
            background-color: rgba(255, 85, 0, 0.25) !important;
        }
        .marker-cluster-small div, .marker-cluster-medium div, .marker-cluster-large div {
            background-color: #FF5500 !important;
            color: #FFFFFF !important;
            font-weight: 800 !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }

        .outlet-directory-section {
            padding: 32px 0;
            background: #F8FAFC;
        }

        .outlet-directory-heading {
            margin-bottom: 24px;
            text-align: center;
        }

        .outlet-directory-heading h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0F172A;
            margin-top: 6px;
            margin-bottom: 6px;
        }

        .outlet-directory-heading p {
            color: #64748B;
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
<header class="navbar">
    <div class="container nav-container">
        <!-- Brand Logo -->
        <a href="/" class="brand-logo">
            <span class="logo-text">Selalu<span class="text-primary">Teh</span></span>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="nav-links">
            <a href="/">Home</a>
            <a href="/#about">Tentang</a>
            <a href="/#pricing">Pricing</a>
            <a href="/#portfolio">Portfolio</a>
            <a href="/#team">Team</a>
            <a href="/#contact" class="btn-nav">Hubungi Kami</a>
        </nav>

        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-menu-btn" onclick="toggleMobileMenu()" aria-label="Toggle Navigation">
            <i class="fa-solid fa-bars" id="menuIcon"></i>
        </button>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div class="mobile-nav" id="mobileNav">
        <a href="/" onclick="toggleMobileMenu()">Home</a>
        <a href="/#about" onclick="toggleMobileMenu()">Tentang</a>
        <a href="/#pricing" onclick="toggleMobileMenu()">Pricing</a>
        <a href="/#portfolio" onclick="toggleMobileMenu()">Portfolio</a>
        <a href="/#team" onclick="toggleMobileMenu()">Team</a>
        <a href="/#contact" class="btn-nav-mobile" onclick="toggleMobileMenu()">Hubungi Kami</a>
    </div>
</header>

    <!-- Content Area -->
        <section class="outlet-directory-section">
        <div class="container">
            
            <div class="outlet-directory-heading">
                <span class="minimal-badge">SEBARAN GERAI</span>
                <h2>Direktori Outlet Selalu Teh</h2>
                <p>Temukan lokasi gerai terdekat dan petunjuk arah langsung</p>
            </div>

            <!-- Split Directory Container -->
            <div class="directory-container">
                
                <!-- Sidebar Left: Search & Cards -->
                <div class="outlet-sidebar">
                    <div class="sidebar-header">
                        <div class="directory-header-row">
                            <span class="directory-title">
                                <i class="fa-solid fa-store"></i>
                                Daftar Gerai
                            </span>

                            <span class="directory-status">
                                90+ Aktif
                            </span>
                        </div>
                                                <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="searchInput" placeholder="Cari nama gerai atau jalan..." onkeyup="filterOutlets()">
                        </div>
                    </div>

                    <div class="outlet-list" id="outletList">
                        <!-- Items rendered via JS -->
                    </div>
                </div>

                <!-- Right: Interactive Map -->
                <div class="map-wrapper">
                    <div id="leaflet-map"></div>
                </div>

            </div>

        </div>
    </section>

    <!-- Leaflet & Cluster JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <script>
       const outletsData = [

    {
        id: 1,
        name: "Selalu Teh - Danau Murung",
        city: "Tenggarong",
        address: "Danau Murung, Tenggarong",
        lat: -0.4192923,
        lng: 116.982317
    },

    {
        id: 2,
        name: "Selalu Teh - Sukarame",
        city: "Tenggarong",
        address: "Sukarame, Tenggarong",
        lat: -0.4034181,
        lng: 116.989519
    },

    {
        id: 3,
        name: "Selalu Teh - Kadewa",
        city: "Tenggarong",
        address: "Kadewa, Tenggarong",
        lat: -0.412084,
        lng: 116.9864247
    },

    {
        id: 4,
        name: "Selalu Teh - Timbau",
        city: "Tenggarong",
        address: "Timbau, Tenggarong",
        lat: -0.436814,
        lng: 116.9972009
    },

    {
        id: 5,
        name: "Selalu Teh - Loa Ipuh",
        city: "Tenggarong",
        address: "Loa Ipuh, Tenggarong",
        lat: -0.4154102,
        lng: 116.9741201
    },

    {
        id: 6,
        name: "Selalu Teh - Mangkurawang",
        city: "Tenggarong",
        address: "Mangkurawang, Tenggarong",
        lat: -0.3860575,
        lng: 116.9895514
    },

    {
        id: 7,
        name: "Selalu Teh - Bukit Biru",
        city: "Tenggarong",
        address: "Bukit Biru, Tenggarong",
        lat: -0.457286,
        lng: 116.9890215
    },

    {
        id: 8,
        name: "Selalu Teh - Parikesit",
        city: "Tenggarong",
        address: "Parikesit, Tenggarong",
        lat: -0.4392329,
        lng: 117.0132515
    },

    {
        id: 9,
        name: "Selalu Teh - Teluk Dalam",
        city: "Tenggarong",
        address: "Teluk Dalam, Tenggarong",
        lat: -0.4393425,
        lng: 117.0065067
    },

    {
        id: 10,
        name: "Selalu Teh - Kota Bangun",
        city: "Kota Bangun",
        address: "Kota Bangun, Kutai Kartanegara",
        lat: -0.2667375,
        lng: 116.5860469
    },

    {
        id: 11,
        name: "Selalu Teh - Kota Bangun 2",
        city: "Kota Bangun",
        address: "Kota Bangun, Kutai Kartanegara",
        lat: -0.263982,
        lng: 116.5844136
    },
    
    {
        id: 12,
        name: "Selalu Teh - Jakarta",
        city: "Samarinda",
        address: "Jl. Jakarta, Samarinda",
        lat: -0.5254401,
        lng: 117.0919599
    },

    {
        id: 13,
        name: "Selalu Teh - Kemuning",
        city: "Samarinda",
        address: "Jl. Kemuning, Samarinda",
        lat: -0.5323695,
        lng: 117.0962405
    },

    {
        id: 14,
        name: "Selalu Teh - Loa Buah",
        city: "Samarinda",
        address: "Jl. Loa Buah, Samarinda",
        lat: -0.5552689,
        lng: 117.0742819
    },

    {
        id: 15,
        name: "Selalu Teh - Harapan Baru",
        city: "Samarinda",
        address: "Jl. Harapan Baru, Samarinda",
        lat: -0.5397248,
        lng: 117.1063769
    },

    {
        id: 16,
        name: "Selalu Teh - Loa Janan 2",
        city: "Samarinda",
        address: "Jl. Loa Janan, Samarinda",
        lat: -0.5701119,
        lng: 117.087095
    },

    {
        id: 17,
        name: "Selalu Teh - Loa Janan 1",
        city: "Samarinda",
        address: "Jl. Loa Janan, Samarinda",
        lat: -0.578735,
        lng: 117.0851783
    },

    {
        id: 18,
        name: "Selalu Teh - Loa Janan 3",
        city: "Samarinda",
        address: "Jl. Loa Janan, Samarinda",
        lat: -0.584454,
        lng: 117.0971798
    },

    {
        id: 19,
        name: "Selalu Teh - Damanhuri",
        city: "Samarinda",
        address: "Jl. Damanhuri, Samarinda",
        lat: -0.4731966,
        lng: 117.1808404
    },

    {
        id: 20,
        name: "Selalu Teh - Loa Kulu 2",
        city: "Samarinda",
        address: "Jl. Loa Kulu, Samarinda",
        lat: -0.5143504,
        lng: 117.024288
    },

    {
        id: 21,
        name: "Selalu Teh - KS Tubun",
        city: "Samarinda",
        address: "Jl. KS Tubun, Samarinda",
        lat: -0.4898241,
        lng: 117.1399356
    },

    {
        id: 22,
        name: "Selalu Teh - Gatot Subroto",
        city: "Samarinda",
        address: "Jl. Gatot Subroto, Samarinda",
        lat: -0.4880179,
        lng: 117.1540132
    },

    {
        id: 23,
        name: "Selalu Teh - Sultan Alimuddin",
        city: "Samarinda",
        address: "Jl. Sultan Alimuddin, Samarinda",
        lat: -0.5092713,
        lng: 117.1656808
    },

    {
        id: 24,
        name: "Selalu Teh - Lempake",
        city: "Samarinda",
        address: "Jl. Lempake, Samarinda",
        lat: -0.4399433,
        lng: 117.1953873
    },

    {
        id: 25,
        name: "Selalu Teh - M. Said",
        city: "Samarinda",
        address: "Jl. M. Said, Samarinda",
        lat: -0.4934476,
        lng: 117.1124889
    },

    {
        id: 26,
        name: "Selalu Teh - S. Parman",
        city: "Samarinda",
        address: "Jl. S. Parman, Samarinda",
        lat: -0.476925,
        lng: 117.1513137
    },

    {
        id: 27,
        name: "Selalu Teh - Kadrie Oening",
        city: "Samarinda",
        address: "Jl. Kadrie Oening, Samarinda",
        lat: -0.4722047,
        lng: 117.1352055
    },

    {
        id: 28,
        name: "Selalu Teh - Suryanata",
        city: "Samarinda",
        address: "Jl. Suryanata, Samarinda",
        lat: -0.4829697,
        lng: 117.1266785
    },

    {
        id: 29,
        name: "Selalu Teh - Bengkuring",
        city: "Samarinda",
        address: "Jl. Bengkuring, Samarinda",
        lat: -0.4265901,
        lng: 117.1633138
    },

    {
        id: 30,
        name: "Selalu Teh - Lambung Mangkurat",
        city: "Samarinda",
        address: "Jl. Lambung Mangkurat, Samarinda",
        lat: -0.4895116,
        lng: 117.1596094
    },

    {
        id: 31,
        name: "Selalu Teh - Makroman",
        city: "Samarinda",
        address: "Jl. Makroman, Samarinda",
        lat: -0.558282,
        lng: 117.2275207
    },

    {
        id: 32,
        name: "Selalu Teh - Pelita",
        city: "Samarinda",
        address: "Jl. Pelita, Samarinda",
        lat: -0.5058881,
        lng: 117.1838987
    },

    {
        id: 33,
        name: "Selalu Teh - Selili",
        city: "Samarinda",
        address: "Jl. Selili, Samarinda",
        lat: -0.5117763,
        lng: 117.159012
    },

    {
        id: 34,
        name: "Selalu Teh - Cendana",
        city: "Samarinda",
        address: "Jl. Cendana, Samarinda",
        lat: -0.4975432,
        lng: 117.1237645
    },

    {
        id: 35,
        name: "Selalu Teh - Ulin",
        city: "Samarinda",
        address: "Jl. Ulin, Samarinda",
        lat: -0.5059473,
        lng: 117.1158279
    },

    {
        id: 36,
        name: "Selalu Teh - Sentosa",
        city: "Samarinda",
        address: "Jl. Sentosa, Samarinda",
        lat: -0.4745045,
        lng: 117.1693823
    },

    {
        id: 37,
        name: "Selalu Teh - Biawan",
        city: "Samarinda",
        address: "Jl. Biawan, Samarinda",
        lat: -0.49681,
        lng: 117.1617724
    },

    {
        id: 38,
        name: "Selalu Teh - Perjuangan",
        city: "Samarinda",
        address: "Jl. Perjuangan, Samarinda",
        lat: -0.4640597,
        lng: 117.1563505
    },

    {
        id: 39,
        name: "Selalu Teh - Palaran",
        city: "Samarinda",
        address: "Jl. Palaran, Samarinda",
        lat: -0.5609778,
        lng: 117.1687574
    },

    {
        id: 40,
        name: "Selalu Teh - Bung Tomo",
        city: "Samarinda",
        address: "Jl. Bung Tomo, Samarinda",
        lat: -0.5084859,
        lng: 117.1431548
    },

    {
        id: 41,
        name: "Selalu Teh - SCP",
        city: "Samarinda",
        address: "Samarinda Central Plaza, Samarinda",
        lat: -0.5036128,
        lng: 117.1552145
    },

    {
        id: 42,
        name: "Selalu Teh - Mangkupalas",
        city: "Samarinda",
        address: "Jl. Mangkupalas, Samarinda",
        lat: -0.523441,
        lng: 117.148361
    },

    {
        id: 43,
        name: "Selalu Teh - Gerilya",
        city: "Samarinda",
        address: "Jl. Gerilya, Samarinda",
        lat: -0.484374,
        lng: 117.174941
    },

     // =========================
    // AREA 3 - BALIKPAPAN
    // ID 44 - 48
    // =========================

    {
        id: 44,
        name: "Selalu Teh - Dr Sutomo",
        city: "Balikpapan",
        address: "Dr Sutomo, Balikpapan",
        lat: -1.2461133,
        lng: 116.8431691
    },

    {
        id: 45,
        name: "Selalu Teh - Martadinata",
        city: "Balikpapan",
        address: "Martadinata, Balikpapan",
        lat: -1.255885,
        lng: 116.8383087
    },

    {
        id: 46,
        name: "Selalu Teh - Indrakila",
        city: "Balikpapan",
        address: "Indrakila, Balikpapan",
        lat: -1.2359612,
        lng: 116.8581564
    },

    {
        id: 47,
        name: "Selalu Teh - Sepinggan Baru",
        city: "Balikpapan",
        address: "Sepinggan Baru, Balikpapan",
        lat: -1.2493761,
        lng: 116.9035913
    },

    {
        id: 48,
        name: "Selalu Teh - Pandan Sari",
        city: "Balikpapan",
        address: "Pandan Sari, Balikpapan",
        lat: -1.2355876,
        lng: 116.8249333
    },
        //AREA BONTANG
     {
        id: 49,
        name: "Selalu Teh - HM Ardans",
        city: "Bontang",
        address: "HM Ardans, Bontang",
        lat: 0.1269834,
        lng: 117.475737
    },

    {
        id: 50,
        name: "Selalu Teh - Rawa Indah",
        city: "Bontang",
        address: "Rawa Indah, Bontang",
        lat: 0.1229381,
        lng: 117.4923881
    },

    {
        id: 51,
        name: "Selalu Teh - Lok Tuan",
        city: "Bontang",
        address: "Lok Tuan, Bontang",
        lat: 0.1701089,
        lng: 117.4805633
    }, 

    //Area SWAKELOLA

    {
        id: 52,
        name: "Selalu Teh - Sekolaq",
        city: "Sekolaq",
        address: "Sekolaq, Kutai Barat",
        lat: -0.247082,
        lng: 115.7136257
    },

    {
        id: 53,
        name: "Selalu Teh - Barong Tongkok",
        city: "Barong Tongkok",
        address: "Barong Tongkok, Kutai Barat",
        lat: -0.2304327,
        lng: 115.6909567
    },

    {
        id: 54,
        name: "Selalu Teh - Anggana 2",
        city: "Anggana",
        address: "Anggana, Kutai Kartanegara",
        lat: -0.5668554,
        lng: 117.2789203
    },

    {
        id: 55,
        name: "Selalu Teh - Babulu",
        city: "Babulu",
        address: "Babulu, Penajam Paser Utara",
        lat: -1.50349,
        lng: 116.4566249
    },

    {
        id: 56,
        name: "Selalu Teh - Jembayan",
        city: "Jembayan",
        address: "Jembayan, Kutai Kartanegara",
        lat: -0.5775833,
        lng: 117.0159722
    },

    {
        id: 57,
        name: "Selalu Teh - Loa Duri",
        city: "Loa Duri",
        address: "Loa Duri, Kutai Kartanegara",
        lat: -0.5903031,
        lng: 117.0640678
    },

    {
        id: 58,
        name: "Selalu Teh - Petung",
        city: "Petung",
        address: "Petung, Penajam Paser Utara",
        lat: -1.3537115,
        lng: 116.6670983
    },

    {
        id: 59,
        name: "Selalu Teh - Kembang Janggut",
        city: "Kembang Janggut",
        address: "Kembang Janggut, Kutai Kartanegara",
        lat: 0.1450307,
        lng: 116.3648288
    },

    {
        id: 60,
        name: "Selalu Teh - Kota Bangun SP 3",
        city: "Kota Bangun",
        address: "Kota Bangun SP 3, Kutai Kartanegara",
        lat: -0.4020833,
        lng: 116.5377778
    },

    {
        id: 61,
        name: "Selalu Teh - Sanga Sanga",
        city: "Sanga Sanga",
        address: "Sanga Sanga, Kutai Kartanegara",
        lat: -0.6700948,
        lng: 117.2296301
    },

    {
        id: 62,
        name: "Selalu Teh - Loa Kulu",
        city: "Loa Kulu",
        address: "Loa Kulu, Kutai Kartanegara",
        lat: -0.5135004,
        lng: 117.0221184
    },

    {
        id: 63,
        name: "Selalu Teh - Jonggon A",
        city: "Jonggon",
        address: "Jonggon A, Kutai Kartanegara",
        lat: -0.4937635,
        lng: 116.8445051
    },

    {
        id: 64,
        name: "Selalu Teh - Handil 7",
        city: "Handil",
        address: "Handil 7, Kutai Kartanegara",
        lat: -0.862116,
        lng: 117.2125382
    },

    {
        id: 65,
        name: "Selalu Teh - Batuah",
        city: "Batuah",
        address: "Batuah, Kutai Kartanegara",
        lat: -0.71925,
        lng: 117.0897222
    },

    {
        id: 66,
        name: "Selalu Teh - Sanggata 4",
        city: "Sangatta",
        address: "Sangatta, Kutai Timur",
        lat: 0.4825186,
        lng: 117.5313408
    },

    {
        id: 67,
        name: "Selalu Teh - Sebulu SP",
        city: "Sebulu",
        address: "Sebulu SP, Kutai Kartanegara",
        lat: -0.167083,
        lng: 116.975205
    },

    {
        id: 68,
        name: "Selalu Teh - Sebulu Ulu",
        city: "Sebulu",
        address: "Sebulu Ulu, Kutai Kartanegara",
        lat: -0.284373,
        lng: 116.986809
    },

    {
        id: 69,
        name: "Selalu Teh - Sanggata 3",
        city: "Sangatta",
        address: "Sangatta, Kutai Timur",
        lat: 0.4932101,
        lng: 117.5335064
    },

    {
        id: 70,
        name: "Selalu Teh - Tanjung Redeb",
        city: "Tanjung Redeb",
        address: "Tanjung Redeb, Berau",
        lat: 2.1498122,
        lng: 117.4965464
    },

    {
        id: 71,
        name: "Selalu Teh - Simpang Raya",
        city: "Simpang Raya",
        address: "Simpang Raya, Kutai Barat",
        lat: -0.2542408,
        lng: 115.6851888
    },

    {
        id: 72,
        name: "Selalu Teh - Grogot",
        city: "Grogot",
        address: "Grogot, Paser",
        lat: -1.9149261,
        lng: 116.1968289
    }

];

        let map, markersGroup;
        const markerMap = {};

        document.addEventListener('DOMContentLoaded', function () {
            // 1. Init Map
            map = L.map('leaflet-map').setView([-0.4285, 116.9823], 9);

            // 2. Tile Layer OpenStreetMap Gratis tanpa API Key
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            // 3. Custom Marker Logo Selalu Teh
            const customIcon = L.divIcon({
                className: 'custom-pin',
                html: `
                    <div style="background: #FFFFFF; border: 2.5px solid #FF5500; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(255,85,0,0.35);">
                        <img src="{{ asset('assets/img/logo.png') }}" style="width: 26px; height: 26px; object-fit: contain;" onerror="this.src='https://cdn-icons-png.flaticon.com/512/924/924514.png'">
                    </div>
                `,
                iconSize: [40, 40],
                iconAnchor: [20, 40],
                popupAnchor: [0, -36]
            });

            // 4. Cluster Group
            markersGroup = L.markerClusterGroup();

            // Render Sidebar & Markers
            renderOutlets(outletsData, customIcon);

            map.addLayer(markersGroup);
        });

        function renderOutlets(data, icon) {
            const listEl = document.getElementById('outletList');
            listEl.innerHTML = '';

            data.forEach(item => {
                // Add Sidebar Item
                const card = document.createElement('div');
                card.className = 'outlet-item';
                card.id = `card-${item.id}`;
                card.onclick = () => focusOutlet(item.id, item.lat, item.lng);
                card.innerHTML = `
                    <div class="flex justify-between items-start">
                        <strong class="text-slate-800 text-sm block mb-1">${item.name}</strong>
                        <span class="text-[10px] font-bold bg-orange-100 text-primary px-2 py-0.5 rounded-full">${item.city}</span>
                    </div>
                    <p class="text-xs text-slate-500 mb-2"><i class="fa-solid fa-location-dot text-primary mr-1"></i> ${item.address}</p>
                    <a href="https://maps.google.com/?q=${item.lat},${item.lng}"
                        target="_blank"
                        class="btn-direction">
                            <i class="fa-solid fa-route"></i>
                            GO!
                    </a>
                `;
                listEl.appendChild(card);

                // Add Map Marker
                const marker = L.marker([item.lat, item.lng], { icon: icon });
                marker.bindPopup(`
                    <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 4px;">
                        <strong style="color: #FF5500; font-size: 0.9rem; display: block; margin-bottom: 2px;">${item.name}</strong>
                        <p style="font-size: 0.78rem; color: #475569; margin-bottom: 8px;">${item.address}</p>
                        <a href="https://maps.google.com/?q=${item.lat},${item.lng}" target="_blank" style="display: block; text-align: center; background: #FF5500; color: #fff; padding: 6px 10px; border-radius: 20px; font-size: 0.75rem; text-decoration: none; font-weight: bold;">Petunjuk Arah</a>
                    </div>
                `);

                markersGroup.addLayer(marker);
                markerMap[item.id] = marker;
            });
        }

        function focusOutlet(id, lat, lng) {
            // Highlight Card
            document.querySelectorAll('.outlet-item').forEach(el => el.classList.remove('active'));
            document.getElementById(`card-${id}`).classList.add('active');

            // Zoom Map & Open Popup
            map.setView([lat, lng], 15, { animate: true });
            const marker = markerMap[id];
            if (marker) {
                markersGroup.zoomToShowLayer(marker, () => {
                    marker.openPopup();
                });
            }
        }

        function toggleMobileMenu() {
    const mobileNav = document.getElementById('mobileNav');
    const menuIcon = document.getElementById('menuIcon');
    
    mobileNav.classList.toggle('open');
    
    if (mobileNav.classList.contains('open')) {
        menuIcon.className = 'fa-solid fa-xmark';
    } else {
        menuIcon.className = 'fa-solid fa-bars';
    }
}

        function filterOutlets() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.outlet-item');
            
            outletsData.forEach(item => {
                const match = item.name.toLowerCase().includes(query) || item.address.toLowerCase().includes(query) || item.city.toLowerCase().includes(query);
                const card = document.getElementById(`card-${item.id}`);
                if (card) {
                    card.style.display = match ? 'block' : 'none';
                }
            });
        }
    </script>

    

</body>
</html>