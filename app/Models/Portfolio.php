<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Portfolio extends Model
{
    use HasFactory;

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // protected $table = 'portfolio';
    // protected $primaryKey = 'id_portfolio';
    // public $incrementing = true;
}
