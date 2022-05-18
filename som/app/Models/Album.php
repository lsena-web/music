<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'name', 'gender', 'artist', 'price'];

    protected $table = 'albuns';

    /**
     * Método responsável por relacionar álbum as suas músicas  (one-to-many)
     * @return relationship
     */
    public function musicas()
    {
        return $this->hasMany(Musica::class, 'albuns_id', 'id');
    }
}
