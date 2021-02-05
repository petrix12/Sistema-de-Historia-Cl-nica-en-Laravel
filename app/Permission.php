<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // ATRIBUTOS DE ASIGNACIÓN MASIVA
    protected $fillable = [
        'name', 'slug', 'description', 'role_id'
    ];

    // RELACIONES ENTRE LOS MODELOS
    public function role(){
        // Relación muchos a uno
        return $this->belongsTo('App\Role');
    }

    public function users(){
        // Relación muchos a muchos
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    // ALMACENAMIENTO
    public function store($request){
        $slug = str_slug($request->name, '-');
        alert('Éxito', 'Permiso guardado', 'success')->showConfirmButton();
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request){
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug' => $slug,
        ]);
        alert('Éxito', 'Permiso actualizado', 'success')->showConfirmButton();
    }

    // VALIDACIÓN

    // RECUPERACIÓN DE INFORMACIÓN

    // OTRAS OPERACIONES
}
