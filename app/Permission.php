<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // ATRIBUTOS DE ASIGNACIÓN MASIVA
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    // RELACIONES ENTRE LOS MODELOS
    public function role(){
        // Relación muchos a uno
        return $this->belongsTo('app\Role');
    }

    public function users(){
        // Relación muchos a muchos
        return $this->belongsToMany('app\User')->withTimestamps();
    }
}
