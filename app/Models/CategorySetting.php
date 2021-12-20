<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_locale',
        'setting_name',
        'setting_value',
        'setting_type'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
