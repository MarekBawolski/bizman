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
    protected $fillable = [
        'client_id',
        'user_id',
        'status_id',
        'name',
        'quote_elements',
        'calculate',
        'notes'
    ];
    protected static function newFactory()
    {
        return QuoteFactory::new();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
