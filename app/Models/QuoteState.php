<?php

namespace App\Models;

use Database\Factories\QuoteStateFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteState extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return QuoteStateFactory::new();
    }
}
