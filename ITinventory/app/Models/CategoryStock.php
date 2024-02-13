<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStock extends Model
{
    use HasFactory;
    protected $table = 'category_stocks';

    protected $primaryKey = 'model_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
