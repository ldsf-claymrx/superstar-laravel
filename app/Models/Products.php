<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'id_category',
        'who_registered'
    ];

    protected $guarded = [];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category');
    }

    public function registeredBy()
    {
        return $this->belongsTo(User::class, 'who_registered');
    }
}