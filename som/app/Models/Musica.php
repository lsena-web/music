<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'durable'];

    /**
     * Método responsável por relacionar  músicas ao seu álbum (one-to-one or many)
     * @return relationship
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'albuns_id', 'id');
    }
}
