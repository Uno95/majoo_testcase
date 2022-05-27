<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuidTrait;
use App\CategoryModel;

class ProductModel extends Model
{
    use HasUuidTrait;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'uuid',
        'product_id',
        'product_name',
        'description',
        'product_price',
        'category_uuid',
        'image'
    ];

    protected $hidden = [
        'deleted_at',
    ];


    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_uuid', 'uuid');
    }
}
