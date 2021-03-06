@extends('layout/root')
@section('judul_halaman',$title)
@section('header_js')
<script src="{{ URL::to('js/ajax.js') }}" charset="utf-8"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>{{ $title }}</h1>
                        @if ($content == 'edit')
                            <h5>{{ $data->judul }}</h5>
                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col-md-12 -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger print-error-msg kulim" style="display:none">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                        <form enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="judul_berita">Judul Berita</label>
                            @if($content == 'edit')
                                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                            @endif
                            @if ($content == 'edit' || $content == 'get')
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" aria-describedby="judul_berita" placeholder="Enter Judul" value="{{ $data->judul }}">
                            @else
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" aria-describedby="judul_berita" placeholder="Enter Judul">
                            @endif
                        
                            <small id="judul_berita" class="form-text text-muted">Masukan Judul Sesuai dengan EYD</small>
                          </div>
                        
                        <input type="hidden" name="post_by" id="post_by" value="{{ $user_id->name }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="tampil" class="mr-3">Tampilkan dihalaman Utama</label>
                                @if($content == 'add')
                                    <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="tampil" id="tampil" value="Y">
                                  <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" checked name="tampil" id="tampil" value="N">
                                  <label class="form-check-label" for="tampil">Tidak</label>
                                </div>
                                @else
                                    <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" @if($data->tampil == 'Y') checked @endif name="tampil" id="tampil" value="Y">
                                  <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" @if($data->tampil == 'N' || $data->tampil == '') checked @endif name="tampil" id="tampil" value="N">
                                  <label class="form-check-label" for="tampil">Tidak</label>
                                </div>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" id="kategori_id" name="kategori_id">
                                     @if ($content == 'edit' || $content == 'get')
                                         <option value="{{ $kategori_pilih->kategori_id }}">{{ $kategori_pilih->kategori_nama }}</option>
                                     @else
                                         <option>Pilih Kategori Berita</option>
                                     @endif
                                 
                                     @foreach($kategori_lists as $kategori)
                                        <option value="{{ $kategori->kategori_id }}">{{ $kategori->kategori_nama }}</option>
                                     @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="isi" id="isi" rows="50" style="height: 200px;">
                                    @if ($content == 'edit' || $content == 'get')
                                        {{ str_replace('src="/images','src="'.$config->web_url.'/images',$data->isi) }}
                                    @endif
                                </textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                               @if($content == 'edit')
                                    <button id="save_edit" class="btn btn-success">Save Berita</button>
                               @else
                                    <button id="save_artikel" class="btn btn-success">Save</button>
                                    <button id="save_close" class="btn btn-info">Save & Close</button>
                               @endif
                            </div>
                        </div>
                    </form>
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
        $(function() {
            $('#isi').froalaEditor({
				height: 400,
                toolbarInline: false,
                iframe: true,
                iconsTemplate: 'font_awesome_5',
                imageUploadURL: 'http://pa-kotabaru.go.id/upload/upload_foto/',
                imageUploadParams: {
                    id: 'myEditor'
                },
                fileUploadURL: 'http://pa-kotabaru.go.id/upload/upload_file/',
                fileUploadParams: {id: 'myEditor'},
                tableStyles: {
                    'class3' : 'Garis Hitam',
                    'table table-bordered' : 'Garis Abu-abu (bootstrap Table)',
                    'table table-striped' : 'Table warna belang'
                },
                imageStyles: {
                    'img img-responsive img-thumbnail' : 'Thumbnail'
                },
                imageEditButtons: ['imageSize', 'imageStyle','imageAlign', 'imageRemove', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', '-', 'imageAlt']

            })

            @if($content == 'add' || $content == 'get')
                autosave();
                function autosave(){
                var judul_berita = $("#judul_berita").val();
                var isi = $("#isi").val();
                var tampil = $("input[name='tampil']:checked").val();
                var kategori_id = $("#kategori_id").val();
                $.ajax({
                url: base_url+'/autosave/',
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                type: 'POST',
                dataType: 'JSON',
                data: {judul_berita:judul_berita, isi:isi, tampil:tampil, kategori_id:kategori_id},
                success: function(data){},
                complete: function() {
// Schedule the next request when the current one's complete
                    setTimeout(autosave, 5000); // The interval set to 5 seconds
                }
            });

        };
            @endif
        });
    </script>
@endsection
