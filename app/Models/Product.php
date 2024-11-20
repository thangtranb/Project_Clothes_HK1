<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name','price','sale_price','image','status','description','category_id','gender'];
    public function Category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    
    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
