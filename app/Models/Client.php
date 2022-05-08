<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ClientFactory;

class Client extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ClientFactory::new();
    }
}
