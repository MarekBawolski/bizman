<?php

namespace App\Models;

use App\Models\Quote;
use Database\Factories\QuoteStateFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteState extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'state', 'color'];

    protected static function newFactory()
    {
        return QuoteStateFactory::new();
    }

    public function quote()
    {
        return $this->hasMany(Quote::class);
    }
}
