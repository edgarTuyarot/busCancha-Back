<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{

    protected $fillable =["nombre","direccion"];

    use HasFactory;

}
