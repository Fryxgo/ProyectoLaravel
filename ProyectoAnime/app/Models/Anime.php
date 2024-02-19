<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Anime
 *
 * @property $id
 * @property $nombre
 * @property $estudio_id
 *
 * @property Estudio $estudio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anime extends Model
{

    static $rules = [
		'nombre' => 'required',
		'estudio_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estudio_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'id', 'estudio_id');
    }



}
