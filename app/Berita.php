<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'tb_berita';
    protected $fillable = [
    	'tanggal','headline','post_date','judul','isi','tampil','kategori_id','post_by',
   	];
}
