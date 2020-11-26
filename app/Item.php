<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable= ['codeno', 'name', 'photo', 'price', 'discount', 'description', 'brand_id', 'subcategory_id'];

   public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

   // public function category()
   //  {
   //      return $this->belongsTo('App\Category');
   //  }

   public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function orders()
    {
        return $this->belongsToMany('App\order', 'orderdetails')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

}
