@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    @if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
    </div>
    @endif
    
    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h5 class="card-title">Data Kelas</h5>
            <div class="header-elements">
                <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary">Buat Kelas</a>
            </div>
        </div>

        <table class="table table-hover datatable-responsive-control-right5">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Kelas</th>
                    <th>Semester</th>
                    <th>Dosen Pengajar</th>
                    <th>Tahun Akademik</th>
                    <th>Jumlah Pertemuan</th>
                    <th class="text-center">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($items->where('status',0) as $item)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td><a href="/admin/kelas/member/{{$item->id}}" style="color: #333" data-popup="tooltip" title="" data-placement="top" data-original-title="Klik untuk detail kelas">{{$item->matkul->matkul}}</a></td>
                    <td class="text-center">{{$item->matkul->semester}}</td>
                    <td>{{$item->dosen->nm_dsn}}</td>
                    <td>{{$item->thn_akademik}}</td>
                    <td>
                        <?php $jml = 0 ?>
                        @foreach($absensi->where('kelas_id',$item->id) as $abs)
                            <?php $jml++ ?>
                        @endforeach
                        @if($jml == 16)
                            <span class="badge badge-success">{{$jml}}</span>
                        @else
                            {{$jml}}
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/admin/kelas/member/{{$item->id}}" class="dropdown-item"><i class="icon-user-plus"></i> Anggota</a>
                                    <a href="/admin/kelas/edit/{{$item->id}}" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
                                    <a href="/admin/kelas/delete/{{$item->id}}" class="dropdown-item" onclick="return confirm('Kelas akan dihapus?')"><i class="icon-bin"></i> Hapus</a>
                                    <a href="/admin/kelas/arsip/{{$item->id}}" class="dropdown-item" onclick="return confirm('Arsipkan kelas?')"><i class="icon-archive"></i> Arsipkan</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /control position -->

</div>
@endsection