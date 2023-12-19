<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Buku;


class KategoriBuku extends Model
{
    use HasFactory;
    protected $table = 'kategori_buku';
    protected $fillable = ['nama_kategori'];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'buku_kategori')->withTimestamps();
    }
}
