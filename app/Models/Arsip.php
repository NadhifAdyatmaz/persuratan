<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $table = 'arsips';
    protected $primaryKey = 'id';
    protected $fillable = ['nomor', 'kategori_id', 'judul', 'file'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
