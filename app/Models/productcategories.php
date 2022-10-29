<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productcategories extends Model
{
    use HasFactory;
    protected $fillable=['name','status','description'];
    public function products(){
        return $this->hasMany(Products::class, "category_id", "id");
    }
}
