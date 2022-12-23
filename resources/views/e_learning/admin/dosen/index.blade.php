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
            <h5 class="card-title">Data Dosen</h5>
            <div class="header-elements">
                <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <table class="table table-hover datatable-responsive-control-right3">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>NIDN</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Pendidikan</th>
                    <th>Jabatan Fungsional</th>
                    <th class="text-center">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($items as $item)
                <tr>
                <td class="text-center">{{$no++}}</td>
                    <td>{{$item->nidn}}</td>
                    <td>{{$item->nm_dsn}}</td>
                    <td>{{$item->jk}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->pend}}</td>
                    <td>{{$item->jab_fungs}}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/admin/dosen/edit/{{$item->id}}" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
                                    <a href="/admin/dosen/delete/{{$item->id}}" class="dropdown-item" onclick="return confirm('Data akan dihapus?')"><i class="icon-bin"></i> Hapus</a>
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