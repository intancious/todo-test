<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    //! protected $table ="petani"; jika nama tb beda
    public $primaryKey = "id_produk";
    protected $fillable = [
        'nama_produk', 'id_kategori', 'harga', 'deskripsi', 'gambar'
    ];

    function getProduk()
    {
        $return = DB::table('produks')
            ->join('kategoris', 'produks.id_kategori', '=', 'kategoris.id_kategori');
        return $return;
    }
}
