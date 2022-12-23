@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
            
    @if(count($format_nilai) == 0)
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <h6 class="card-title font-weight-semibold">
                    <i class="icon-clippy mr-2"></i>
                    Persentase Nilai
                </h6>

                <div class="header-elements">
                 
                </div>
            </div>

            <div class="list-group border-0 rounded-0">
                <a href="/dosen/n/{{$kelas->id}}/nilai/create" class="list-group-item list-group-item-action">
                    <i class="icon-plus22 mr-3"></i>
                    Buat Persentase Nilai 
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <h6 class="card-title font-weight-semibold">
                    <i class="icon-clippy mr-2"></i>
                    Persentase Nilai
                </h6>

                <div class="header-elements">
                 
                </div>
            </div>

            @foreach($format_nilai as $nilai)
            <div class="list-group border-0 rounded-0">
                <a class="list-group-item list-group-item-action">
                    <i class="icon-arrow-right14 mr-3"></i>
                    Nilai Absensi : {{$nilai->nilai_absen}}% 
                </a>
                <a class="list-group-item list-group-item-action">
                    <i class="icon-arrow-right14 mr-3"></i>
                    Nilai Tugas : {{$nilai->nilai_tugas}}%
                </a>
                <a class="list-group-item list-group-item-action">
                    <i class="icon-arrow-right14 mr-3"></i>
                    Nilai UTS : {{$nilai->nilai_uts}}%
                </a>
                <a class="list-group-item list-group-item-action">
                    <i class="icon-arrow-right14 mr-3"></i>
                    Nilai UAS : {{$nilai->nilai_uas}}%
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="col-xl-9">

        @if(Session::has('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			{{Session::get('success')}}
		</div>
		@endif

        <!-- Annual sales report -->
        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">Data Nilai</h6>
                <div class="d-inline-flex align-items-center ml-auto">
                    <span class="badge badge-white badge-striped badge-striped-right border-right-secondary font-weight-semibold">{{$kelas->matkul->matkul}}</span>
                </div>
            </div>
        
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai Absensi</th>
                            <th>Nilai Tugas</th>
                            <th>Nilai UTS</th>
                            <th>Nilai UAS</th>
                            <th>Nilai AKhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($anggota as $agt)
                        <tr class="text-center">
                           <td>{{$no++}}</td>
                           <td>{{$agt->mahasiswa->nm_mhs}}</td>
                           <td>
                                <?php $jml_abs = 0 ?>
                                @foreach($absensi as $abs)
                                    <?php $jml_hadir = 0; $jml_abs = $jml_abs + 1 ?>
                                    @foreach($d_absensi->where('absensi_id',$abs->id)->where('mahasiswa_id',$agt->mahasiswa->id) as $absen)
                                        <?php $jml_hadir = $jml_hadir + 1 ?>
                                    @endforeach
                                    {{$nilai_abs = ($jml_hadir * 100) / $jml_abs}}
                                @endforeach
                            </td>
                            <td>
                                <?php $jml_tgs = 0 ?>
                                @foreach($tugas->where('status','0') as $tgs)
                                    <?php $jml_tgs = $jml_tgs + 1; $nilai = 0 ?>
                                    @foreach($d_tugas->where('tugas_id',$tgs->id)->where('mahasiswa_id',$agt->mahasiswa->id) as $tgs)
                                        <?php $nilai = $nilai + $tgs->nilai ?>
                                    @endforeach
                                    {{$nilai_tgs = $nilai / $jml_tgs}}
                                @endforeach
                            </td>
                            <td>
                                <?php $nilai_uts = 0 ?>
                                @foreach($tugas->where('status','1') as $tgs)
                                    @foreach($d_tugas->where('tugas_id',$tgs->id)->where('mahasiswa_id',$agt->mahasiswa->id) as $tgs)
                                        <?php $nilai_uts = $nilai_uts + $tgs->nilai ?>
                                    @endforeach
                                @endforeach
                                {{$nilai_uts}}
                            </td>
                            <td>
                                <?php $nilai_uas = 0 ?>
                                @foreach($tugas->where('status','2') as $tgs)
                                    @foreach($d_tugas->where('tugas_id',$tgs->id)->where('mahasiswa_id',$agt->mahasiswa->id) as $tgs)
                                        <?php $nilai_uas = $tgs->nilai ?>
                                    @endforeach
                                @endforeach
                                {{$nilai_uas}}
                            </td>
                            <td>
                                @foreach($format_nilai as $nilai)
                                    {{ (($nilai_abs * $nilai->nilai_absen) / 100) +
                                        (($nilai_tgs * $nilai->nilai_tugas) / 100) +
                                        (($nilai_uts * $nilai->nilai_uts) / 100) +
                                        (($nilai_uas * $nilai->nilai_uas) / 100) }}
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /annual sales report -->

    </div>
</div>
@endsection