@extends('layout/root')
@section('judul_halaman',$title)

@section('content')
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Konfigurasi Menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Konfigurasi Menu</li>
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
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                List Menu
                            </div>
                            <div class="card-body">
                            	 	<table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th>Parrent Menu</th>
                                            <th>Dropdown</th>
                                            <th>Link URL</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        	@php 
                                        		$number = ($menus->currentPage()-1)* $menus->perPage() + 1; 
                                        	@endphp
                                        	@foreach($menus as $menu)
                                        		<tr>
                                        			<td>{{ $number++ }}</td>
                                        			<td>{{ $menu->menu_name }}</td>
                                        			<td width="7%">
                                        			@if($menu->menu_dropdown == 'yes')
                                        				{{ $menu->menu_dropdown }} <a href="{{ URL::to('sub_menu/'.$menu->menu_id) }}">(Atur)</a>
                                        			@else 
                                        				{{ $menu->menu_dropdown }}
                                        			@endif
                                        			</td>
                                        			<td>{{ $menu->menu_link }}</td>
                                        		</tr>
                                        	@endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>

@endsection