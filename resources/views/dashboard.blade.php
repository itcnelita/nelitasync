@extends('layouts.base')

@section('title', 'Dashboard | NELITASYNC')

@section('content')

    <div class="min-h-screen bg-gray-100">

        <!-- HEADER -->
        <div class="bg-blue-700 text-white shadow">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">
                    Nelita Sync - Dashboard Siswa
                </h1>

                <a href="/logout" class="bg-white text-blue-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200">
                    Logout
                </a>
            </div>
        </div>


        <!-- CONTENT -->
        <div class="max-w-7xl mx-auto p-6">

            <!-- WELCOME -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Selamat Datang 👋
                </h2>
                <p class="text-gray-500">
                    Informasi aktivitas sekolah kamu hari ini.
                </p>
            </div>


            <!-- DASHBOARD GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Jadwal -->
                <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                    <h3 class="text-lg font-semibold text-gray-700">
                        📅 Jadwal Hari Ini
                    </h3>

                    <p class="text-gray-500 mt-2 text-sm">
                        Belum ada jadwal hari ini
                    </p>

                </div>


                <!-- Absensi -->
                <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                    <h3 class="text-lg font-semibold text-gray-700">
                        🧾 Absensi
                    </h3>

                    <p class="text-gray-500 mt-2 text-sm">
                        Status absensi belum tersedia
                    </p>

                </div>


                <!-- Extracurricular -->
                <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                    <h3 class="text-lg font-semibold text-gray-700">
                        🎯 Extracurricular
                    </h3>

                    <p class="text-gray-500 mt-2 text-sm">
                        Kamu belum terdaftar
                    </p>

                </div>


                <!-- Helpdesk -->
                <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                    <h3 class="text-lg font-semibold text-gray-700">
                        🛠 IT Helpdesk
                    </h3>

                    <p class="text-gray-500 mt-2 text-sm">
                        Belum ada tiket
                    </p>

                </div>

            </div>


            <!-- SECTION BAWAH -->
            <div class="grid md:grid-cols-2 gap-6 mt-8">

                <!-- Pengumuman -->
                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        📢 Pengumuman Sekolah
                    </h3>

                    <ul class="text-sm text-gray-600 space-y-2">

                        <li>
                            • Ujian tengah semester dimulai minggu depan
                        </li>

                        <li>
                            • Pendaftaran extracurricular dibuka
                        </li>

                    </ul>

                </div>


                <!-- Ticket -->
                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        🎫 Tiket IT Saya
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Tidak ada tiket aktif
                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection
