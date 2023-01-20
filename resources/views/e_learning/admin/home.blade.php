@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    <div class="alert bg-primary text-white alert-styled-left alert-arrow-left alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Selamat datang di <i>E-Learning</i> STMIK Dharma Negara Bandung.</span>
    </div>
    <!-- /control position -->

    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-primary text-white has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{count($mhs)}}</h3>
                        <span class="text-uppercase font-size-xs">mahasiswa aktif</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-vcard icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-indigo text-white has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{count($dsn)}}</h3>
                        <span class="text-uppercase font-size-xs">dosen pengajar</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-user-tie icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-success text-white has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-reading icon-3x opacity-75"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="mb-0">{{count($kls)}}</h3>
                        <span class="text-uppercase font-size-xs">kelas aktif</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-danger text-white has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-archive icon-3x opacity-75"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="mb-0">{{count($arsip)}}</h3>
                        <span class="text-uppercase font-size-xs">arsip kelas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-secondary border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Catatan!</span> Dosen dan mahasiswa dapat melakukan login dengan memasukan NIDN atau NIM sebagai password kemudian menggantinya setalah login.
    </div>

</div>
@endsection