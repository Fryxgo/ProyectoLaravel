<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudio
 *
 * @property $id
 * @property $nombre
 *
 * @property Anime[] $animes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudio extends Model
{

    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animes()
    {
        return $this->hasMany('App\Models\Anime', 'estudio_id', 'id');
    }

  

}
