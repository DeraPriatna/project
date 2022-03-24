@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    @if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Success!</span> {{Session::get('success')}}
    </div>
    @endif
    
    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h5 class="card-title">Data Kelas</h5>
            <div class="header-elements">
                <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary">Buat Kelas</a>
            </div>
        </div>

        <table class="table table-hover datatable-responsive-control-right4">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Dosen</th>
                    <th class="text-center">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($items as $item)
                <tr>
                <td class="text-center">{{$no++}}</td>
                    <td>{{$item->kd_kls}}</td>
                    <td>{{$item->nm_kls}}</td>
                    <td>{{$item->nm_dsn}}</td>
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