<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // ATRIBUTOS DE ASIGNACIÓN MASIVA
    protected $fillable = [
        'name', 'description', 'slug'
    ];

    // RELACIONES ENTRE LOS MODELOS
    public function permissions(){
        // Relación uno a muchos
        return $this->hasMany('');
    }

    public function users(){
        // Relación muchos a muchos
        return $this->belongsToMany('app\User');
    }

    // ALMACENAMIENTO

    // VALIDACIÓN

    // RECUPERACIÓN DE INFORMACIÓN

    // OTRAS OPERACIONES
}
