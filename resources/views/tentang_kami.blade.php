@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Title -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-[#14a7a0]">Tentang Kami</h1>
            <p class="text-xl text-gray-600 mt-2">Kami adalah  mahasiswa semester 3 Teknik Informatika Universitas Bina Darma yang sedang
                mengembangkan sistem pengaduan masyarakat berbasis web menggunakan Laravel. Sistem ini bertujuan untuk
                mempermudah masyarakat dalam menyampaikan keluhan dan mendapatkan respons dari pihak terkait.</p>
        </div>

        <!-- Hero Section (Gambar atau Video Intro) -->
        <div class="w-full mb-10">
            <img src="{{ asset('images/fotKel.jpg') }}" alt="Tentang Kami"
                class="w-full max-w-3xl mx-auto rounded-lg shadow-lg">
        </div>


        <!-- Tujuan Proyek -->
        <div class="flex flex-wrap justify-between gap-8 mb-16">
            <!-- Tujuan -->
            <div class="w-full sm:w-1/2 p-6 bg-[#f0f0f0] rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-[#14a7a0] mb-4">Tujuan Proyek Kami</h2>
                <p class="text-gray-700">Kami bertujuan untuk mengembangkan sistem pengaduan masyarakat yang berbasis web,
                    memanfaatkan teknologi Laravel untuk memungkinkan warga melaporkan masalah atau keluhan secara cepat,
                    mudah, dan terorganisir. Sistem ini juga akan memfasilitasi respons yang cepat dari pihak terkait untuk
                    meningkatkan kualitas pelayanan publik.</p>
            </div>
        </div>

        <!-- Timeline Proyek -->
        <div class="mb-16">
            <h2 class="text-3xl font-semibold text-[#14a7a0] text-center mb-6">Timeline Proyek Kami</h2>
            <div class="relative border-l-2 border-[#14a7a0] pl-8">
                <!-- Timeline Item -->
                <div class="mb-8">
                    <div class="flex items-center mb-2">
                        <div class="h-8 w-8 rounded-full bg-[#14a7a0] text-white flex justify-center items-center mr-4">1
                        </div>
                        <h3 class="text-xl font-semibold text-[#14a7a0]">Analisis Kebutuhan</h3>
                    </div>
                    <p class="text-gray-700">Pada tahap awal, kami melakukan analisis untuk mengidentifikasi kebutuhan
                        masyarakat dan pemerintah terkait sistem pengaduan yang efektif dan efisien.</p>
                </div>

                <!-- Timeline Item -->
                <div class="mb-8">
                    <div class="flex items-center mb-2">
                        <div class="h-8 w-8 rounded-full bg-[#14a7a0] text-white flex justify-center items-center mr-4">2
                        </div>
                        <h3 class="text-xl font-semibold text-[#14a7a0]">Desain Sistem</h3>
                    </div>
                    <p class="text-gray-700">Kami merancang antarmuka pengguna (UI) dan pengalaman pengguna (UX) agar sistem
                        mudah digunakan oleh masyarakat. Selain itu, kami merancang backend aplikasi dengan Laravel untuk
                        mengelola pengaduan secara efisien.</p>
                </div>

                <!-- Timeline Item -->
                <div class="mb-8">
                    <div class="flex items-center mb-2">
                        <div class="h-8 w-8 rounded-full bg-[#14a7a0] text-white flex justify-center items-center mr-4">3
                        </div>
                        <h3 class="text-xl font-semibold text-[#14a7a0]">Pengembangan & Uji Coba</h3>
                    </div>
                    <p class="text-gray-700">Pada tahap pengembangan, kami membangun sistem menggunakan Laravel dan
                        mengintegrasikan fitur-fitur seperti pengelolaan pengaduan, notifikasi, dan laporan. Kami juga
                        melakukan uji coba untuk memastikan aplikasi berjalan lancar.</p>
                </div>
            </div>
        </div>

        <!-- Tim Kami -->
        <div class="text-center mb-16">
            <h2 class="text-3xl font-semibold text-[#14a7a0] mb-6">Anggota Tim Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Anggota Tim 1 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <img src="{{ asset('images/1733649043.jpg') }}" alt="Tim 1"
                        class="w-full h-[1] object-cover rounded-t-lg mb-4">
                    <h3 class="text-xl font-semibold text-[#14a7a0]">Depo Sadrila Hadi</h3>
                    <p class="text-gray-600">Leader & Backend Developer</p>
                    <p class="text-gray-500">Depo bertanggung jawab dalam merancang dan mengembangkan backend sistem
                        pengaduan menggunakan Laravel, serta memastikan sistem dapat menangani pengaduan dengan efisien.</p>
                </div>

                <!-- Anggota Tim 2 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <img src="{{ asset('images/aji.jpg') }}" alt="Tim 2"
                        class="w-full h-[1] object-cover rounded-t-lg mb-4">
                    <h3 class="text-xl font-semibold text-[#14a7a0]">Rahman Ajie</h3>
                    <p class="text-gray-600">Frontend Developer</p>
                    <p class="text-gray-500">Ajie berfokus pada pengembangan antarmuka pengguna aplikasi, memastikan
                        tampilan aplikasi menarik dan mudah digunakan oleh masyarakat.</p>
                </div>

                <!-- Anggota Tim 3 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <img src="{{ asset('images/diaz.jpg') }}" alt="Tim 3"
                        class="w-full h-[1] object-cover rounded-t-lg mb-4">
                    <h3 class="text-xl font-semibold text-[#14a7a0]">Rachmat Adiaz Arrofi</h3>
                    <p class="text-gray-600">Database Administrator</p>
                    <p class="text-gray-500">Diaz bertugas merancang dan mengelola database untuk aplikasi pengaduan,
                        memastikan data pengaduan tersimpan dengan aman dan mudah diakses.</p>
                </div>

                <!-- Anggota Tim 4 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <img src="{{ asset('images/dzikri.jpg') }}" alt="Tim 4"
                        class="w-full h-[1] object-cover rounded-t-lg mb-4">
                    <h3 class="text-xl font-semibold text-[#14a7a0]">Dzikri  Thoriq Al Ariiq</h3>
                    <p class="text-gray-600">Quality Assurance</p>
                    <p class="text-gray-500">Dzikri bertugas memastikan aplikasi bebas dari bug dan menjalankan uji coba untuk
                        memastikan fitur berjalan sesuai dengan spesifikasi yang diinginkan.</p>
                </div>

                <!-- Anggota Tim 5 -->
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <img src="{{ asset('images/zaki.jpg') }}" alt="Tim 5"
                        class="w-full h-[1] object-cover rounded-t-lg mb-4">
                    <h3 class="text-xl font-semibold text-[#14a7a0]">M. Zakiansyah</h3>
                    <p class="text-gray-600">UX/UI Designer</p>
                    <p class="text-gray-500">Zaki merancang desain antarmuka aplikasi, berfokus pada pengalaman pengguna
                        untuk memastikan aplikasi mudah digunakan dan memenuhi kebutuhan pengguna.</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-[#14a7a0] text-white p-8 rounded-lg text-center">
            <h3 class="text-2xl font-semibold mb-4">Temukan Lebih Banyak Tentang Kami</h3>
            <p class="mb-4">Kami berkomitmen untuk terus mengembangkan sistem yang dapat memudahkan masyarakat dalam
                menyampaikan pengaduan. Ikuti perkembangan proyek kami!</p>
            <a href="#" class="bg-white text-[#14a7a0] py-2 px-6 rounded-lg font-semibold hover:bg-[#f0f0f0]">Lihat
                Proyek Kami</a>
        </div>
    </div>
@endsection
