<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Portfolio;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'category_id', 'id');
    }
}
