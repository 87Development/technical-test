<?php

namespace App\Models;

use App\Casts\SanitizedHtml;
use App\Models\Category;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'status', 'publish_date', 'category_id'];

    protected function getContentAttribute($value) {
        return Purify::clean($value);
    }

    protected function publishDate(): Attribute
    {
        return Attribute::make(
            set: fn($value) => date('Y-m-d', strtotime($value)),
            get: fn($value) => date('d/m/Y', strtotime($value))
        );
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
