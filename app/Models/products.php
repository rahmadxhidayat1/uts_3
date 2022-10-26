<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable=['category_id','title','status','description','weight','price','image'];
    public function productcategories()
    {
        return $this->belongsTo(Productcategories::class, "category_id", "id");
    }
}
