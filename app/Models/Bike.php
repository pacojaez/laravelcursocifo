<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bike extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'marca',
        'modelo',
        'caballos',
        'color',
        'matricula',
        'uuid',
        'anyo',
        'precio',
        'kms',
        'matriculada',
        'deleted_at',
        'user_id',
        'image',
        'visitas',
        'concesionario_id'
    ];


    /**
     * RELACIONES
     */
    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function concesionario(){

        return $this->belongsTo(Concesionario::class, 'concesionario_id');
    }
}
