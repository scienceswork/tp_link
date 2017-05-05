<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $table = 'product_info';

    /**
     * 拥有一个produc
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function platform()
    {
        return $this->hasOne(Platform::class, 'id', 'platform_id');
    }
}
