<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Berita $berita){
        $kategori_lists = DB::table('kategori')->get();
        $data = array(
            'title' => 'Home',
            'beritas' => $berita->orderBy('id','desc')->paginate(10),
            'kategori' => 'keseluruhan',
            'kategori_list' =>$kategori_lists
        );
        return view('content/home',$data);
    }
    public function get_by_id(Berita $berita, $id){
        $berita = $berita->where('kategori_id',$id)->paginate(10);
        $kategori = DB::table('kategori')->where('kategori_id',$id)->first();
        $data = array(
            'title' => 'Home',
            'beritas' => $berita,
            'kategori' => 'Bagian '.$kategori->kategori_nama,
            'kategori_list' => DB::table('kategori')->get()
        );
        return view('content/home',$data);
    }
    public function get_by_name(Berita $berita, Request $request){
        $name = $request->input('judul');
        $berita = $berita->where('judul','like','%'.$name.'%')->paginate(10);
        $data = array(
            'title' => 'Home',
            'beritas' => $berita,
            'kategori' => 'Cari',
            'pencarian' => $name,
            'kategori_list' => DB::table('kategori')->get()
        );
        return view('content/home',$data);
    }
}
