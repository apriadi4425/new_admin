<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'user_id','judul','isi','tampil','kategori_id'
	];
}
