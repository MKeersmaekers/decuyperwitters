<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Type extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * $fillable: array of attributes that are mass assignable
     * $guarded: array of attributes that are not mass assignable
     * REMARK: the save() methode does not pass the guarded attributes!
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relationship between models
     * hasMany('model', 'foreign_key', 'primary_key'):  method name is lowercase and plural case
     * belongsTo('model', 'foreign_key', 'primary_key')->withDefaults():  method name is lowercase and singular case
     */

    public function subtypes()
    {
        return $this->hasMany(Subtype::class);   // a type has many subtypes
    }

    public function images()
    {
        return $this->hasMany(Image::class);   // a type has many images
    }

    /** Relationship between models ...*/
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();  // a type belongs to a category
    }

    /**
     * Accessors and mutators (method name is the attribute name)
     * get: transform the attribute after it has retrieved from database
     * set: transform the attribute before it is sent to database
     */


    /**
     * Add additional attributes that do not have a corresponding column in your database
     * REMARK: additional attributes are not automatically included to the model!
     *    - add the attributes to the $appends array to include them always to the model
     *    - or append the attributes in runtime with Model::get()->append([])
     */

    // this adds an extra attribute to the types with a url to the images that correspond with the id of the type
    protected function cover(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (Storage::disk('public')->exists('images/category_images/' . $attributes['name'] . '.jpg')) {
                    return [
                        'exists' => true,
                        'url' => Storage::url('images/category_images/' . $attributes['name'] . '.jpg'),
                    ];
                } else {
                    return [
                        'exists' => false,
                        'url' => Storage::url('images/category_images/no-cover.jpg'),
                    ];
                }
            },
        );
    }

    protected $appends = ['cover'];


    /**
     * Apply the scope to a given Eloquent query builder
     * prefix the method name with 'scope' e.g. 'scopeIsActive()'
     * Utilize the scope in the controller  Model::is_active()->get();
     */


    /**
     * Add attributes that should be hidden to the $hidden array
     */
    protected $hidden = [];
}
