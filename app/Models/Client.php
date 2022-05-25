<?php

namespace App\Models;

use Database\Factories\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'city',
        'company',
        'tax_id',
        'company_id',
        'website',
        'notes',
    ];
    protected static function newFactory()
    {
        return ClientFactory::new();
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
