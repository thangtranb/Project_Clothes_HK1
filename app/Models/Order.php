<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','phone','note','token','account_id'];
    public $appends = ['total'];

    public function detail() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function getTotalAttribute() {
        $t = 0;

        foreach ($this->detail as $dt ) {
            $t += $dt->price * $dt->quantity;

        }
        return $t;
    }
}
