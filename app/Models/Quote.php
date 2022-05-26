<?php

namespace App\Models;

use App\Models\Client;
use Database\Factories\QuoteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return QuoteFactory::new();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
