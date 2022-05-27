<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuidTrait;
use App\ProductModel;

class CategoryModel extends Model
{
    use HasUuidTrait;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'uuid',
        'category_name'
    ];

    protected $hidden = [
        'deleted_at',
    ];


    public function category()
    {
        return $this->hasMany(ProductModel::class, 'category_uuid', 'uuid');
    }
}
