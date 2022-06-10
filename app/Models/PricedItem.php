<?php

namespace App\Models;

use App\Models\JobType;
use Database\Factories\PricedItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricedItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return PricedItemFactory::new();
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
    public function quotes()
    {
        return $this->belongsToMany(Quote::class);
    }
}
