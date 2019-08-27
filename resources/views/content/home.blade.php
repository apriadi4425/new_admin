@extends('layout/root')
@php
    $kategori_name = str_replace('Bagian ','',$kategori);
@endphp
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if ($kategori == 'Cari')
                            <h1 class="m-0 text-dark">List Artikel</h1>
                        @else
                            <h1 class="m-0 text-dark">List Artikel {{ $kategori_name }}</h1>
                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Artikel</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Kategori</label>
                            <select class="form-control" id="kategori" name="kategori">
                                @if ($kategori == 'Cari')
                                    <option value="0">Pilih Kategori</option>
                                @else
                                    @if($kategori != 'keseluruhan')
                                        <option>{{ $kategori_name }}</option>
                                        <option value="0">Keseluruhan</option>
                                    @else
                                        <option>{{ $kategori }}</option>
                                    @endif
                                @endif

                                @foreach ($kategori_list as $k)
                                    @if ($k->kategori_nama != $kategori_name)
                                       <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col-md-12 -->
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                @if ($kategori == 'Cari')
                                    <h5 class="m-0">Pencarian "{{ $pencarian }}" : Jumlah = {{ $beritas->total() }}</h5>
                                @else
                                    <h5 class="m-0">Berita {{ $kategori }} : Jumlah = {{ $beritas->total() }}</h5>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th width="60%">Judul</th>
                                            <th>Tanggal</th>
                                            <th>Penulis</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $number = ($beritas->currentPage()-1)* $beritas->perPage() + 1;
                                            $no = 0;

                                        @endphp
                                        @foreach ($beritas as $berita)
                                            <tr>
                                                <td>
                                                    {{ $number++ }}
                                                </td>
                                                <td>{{ $berita->judul }} <br></td>
                                                <td>{{ tanggal($berita->tanggal) }} <br></td>
                                                <td>{{ $berita->post_by }} <br></td>
                                                <td>
                                                    <a href="{{ URL::to('add_berita/'.$berita->id) }}" class="btn btn-sm btn-outline-info mr-3"><i class="far fa-edit"></i></a>
                                                    <a href="{{ URL::to('hapus/'.$berita->id) }}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              <br/>
                                {{ $beritas->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            var base_url = '{{ URL::to('/') }}';
            $('#kategori').on('change', function() {
                var id = this.value;
                if(id == 0){
                    window.location.replace(base_url);
                }else {
                    window.location.replace(base_url + "/artikel/" + id);
                }
            });
        });
    </script>
@stop
