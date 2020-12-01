@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> Selamat datang ke {{app_name()}}
                </div>
                <div class="card-body">

                    <p class="text-justify">
                        Gudang merupakan satu ruang, kawasan atau bangunan yang digunakan
                        untuk penyimpanan barangan sama ada stok bahan untuk digunakan dalam
                        operasi seterusnya ataupun stok barangan siap. Istilah ‘gudang pintar’ pula
                        merujuk kepada tahap operasi sesuatu gudang yang telah mencapai pengoperasian
                        yang terbaik dalam segala proses dan memudahkan penyelia gudang serta pelanggan
                        dalam proses-proses penerimaan, perekodan, penyimpanan, pengesanan dan pengeluaran.
                        Dengan kata lain, pelbagai teknologi diintegrasikan untuk bekerjasama dalam
                        meningkatkan produktiviti serta kecekapan gudang disamping meminimumkan tenaga kerja
                        dan mengurangkan kesalahan atau kesilapan dalam proses.
                    </p>

                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-question-circle"></i> Keperluan {{app_name()}}
                </div>
                <div class="card-body">

                    <p class="text-justify">
                        Matlamat sistem gudang pintar adalah untuk mengoptimumkan dan memudahkan proses,
                        mengurangkan kebergantungan terhadap tenaga kerja, mengurangkan masa operasi,
                        memastikan kepuasan pelanggan dan meningkatkan kecekapan operasi gudang serta
                        meningkatkan kemampuan untuk  menghadapi sebarang perubahan yang berlaku terhadap
                        operasi gudang. Oleh yang demikian, adalah wajar sebuah gedung pintar diwujudkan
                        bagi mencapai kebaikan-kebaikan yang telah disebutkan.
                    </p>

                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-layer-group"></i> Komponen {{app_name()}}
                </div>
                <div class="card-body">

                    <p class="text-center">

                        <img src="{{asset('img/frontend/warehouse.png')}}" class="img-fluid" alt="Responsive image">
                    </p>

                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
