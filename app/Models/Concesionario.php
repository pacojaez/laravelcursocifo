<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concesionario extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'adress',
        'city',
        'state',
        'deleted_at',
        'visitas'
    ];

    public $guarded = [];

     /**
     * RELATION WITH BIKES
     *
     */
    public function bikes(){
        return $this->hasMany(Bike::class);
    }
}
