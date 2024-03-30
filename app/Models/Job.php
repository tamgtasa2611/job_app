<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'salary', 'date', 'description', 'image', 'category_id'];
    public $timestamps = false;

    public function category() :BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
