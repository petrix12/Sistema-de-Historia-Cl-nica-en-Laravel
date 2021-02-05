<?php

namespace App;

Use Alert;

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
        return $this->hasMany('App\Permission');
    }

    public function users(){
        // Relación muchos a muchos
        return $this->belongsToMany('App\User');
    }

    // ALMACENAMIENTO
    public function store($request){
        $slug = str_slug($request->name, '-');
        // Alert::alert('Éxito', 'El rol se ha guardado', 'success')->showConfirmButton();
        // toast('El rol se ha guardado','success','top-right');
        alert('Éxito', 'Rol guardado', 'success')->showConfirmButton();
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request){
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug' => $slug,
        ]);
        alert('Éxito', 'Rol actualizado', 'success')->showConfirmButton();
    }

    // VALIDACIÓN

    // RECUPERACIÓN DE INFORMACIÓN

    // OTRAS OPERACIONES
}
