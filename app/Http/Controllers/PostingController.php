<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Berita;
use App\Project;
use App\User;
use DB;


class PostingController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_view(){
            $id = Auth::user()->id;
            $find = Project::where('user_id',$id)->get();
            $finds = Project::where('user_id',$id)->first();
            $jumlah = $find->count();
            if($jumlah == 0){
                $data = array('user_id'=>$id,'judul'=>'','isi'=>'','tampil'=>'','kategori_id'=>5);
                Project::create($data);
                $content = 'add';
                 $beritanya = '';
                 $pilih_kategori = '';
            }else{
                
                $content = 'get';
                $beritanya = $finds;
                $pilih_kategori = DB::table('kategori')->where('kategori_id',$finds->kategori_id)->first();
            }

        $data = array(
            'title' => 'Tambah Berita',
            'content' => $content,
            'kategori_lists' => DB::table('kategori')->get(),
            'kategori_pilih' => $pilih_kategori,
            'data' => $beritanya,
            'user_id' => User::find($id)->first(),
            'config' => DB::table('admin_config')->first(),
        );
        return view('content/add',$data);

    }
    public function edit_view(Berita $berita){
         $id = Auth::user()->id;
         $data = array(
            'title' => 'Edit Berita',
            'content' => 'edit',
            'data' => $berita,
            'config' => DB::table('admin_config')->first(),
             'kategori_lists' => DB::table('kategori')->get(),
             'kategori_pilih' => DB::table('kategori')->where('kategori_id',$berita->kategori_id)->first(),
            'user_id' => User::find($id)->first()
        );
        return view('content/add',$data);
    }

    public function insert(Request $request){

        $validator = Validator::make($request->all(), [
               'judul_berita' => 'required|min:5',
               'isi' => 'required|min:20',
               'tampil' => 'required',
            ],
            [
                'judul_berita.required' => 'Judul Berita Harus Ada',
                'isi.required' => 'Isi Berita Harus ditulis',
                'tampil.required' => 'Pilih salah satu',
                'judul_berita.min' => 'Judul Berita setidaknya minimal 5 huruf/karakter',
                'isi.min' => 'Isi berita jangan terlalu sedikit, minimal 20 karakter',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }else{
          $data = array(
            'tanggal' => date('Y-m-d'),
            'judul' => $request->input('judul_berita'),
            'isi' => $request->input('isi'),
            'tampil' => $request->input('tampil'),
            'kategori_id' => $request->input('kategori_id'),
            'post_by' => $request->input('post_by'),
            'headline' => ''
            );
            $eksekusi = Berita::create($data);
            $eksekusi2 = Project::where('user_id',Auth::user()->id)->delete();
            return response()->json(['success'=>'Berhasil Disimpan.']);
        }
    }
}
