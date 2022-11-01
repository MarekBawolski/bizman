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
        'state_id',
        'name',
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
    public function state()
    {
        return $this->belongsTo(QuoteState::class);
    }
    public function pricedItems()
    {
        return $this->belongsToMany(PricedItem::class);
    }

    public function scopeSearch($query, array $filters)
    {
        if ($filters['search'] ?? false) {

            $query->orderBy('updated_at')->whereHas('client', function ($query) use ($filters) {
                $query->where('first_name', 'like', '%' . request('search') . '%')
                    ->orWhere('last_name', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('name', 'like', '%' . request('search') . '%')
                    ->orWhere('company', 'like', '%' . request('search') . '%')
                    ->orWhere('city', 'like', '%' . request('search') . '%');
            })->orWhere('name', 'like', '%' . request('search') . '%');
        }
    }
}
