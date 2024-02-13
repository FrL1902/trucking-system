<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $primaryKey = 'category_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function category_stock()
    {
        return $this->hasMany(CategoryStock::class, 'category_id');
    }
}
