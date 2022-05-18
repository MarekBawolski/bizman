<?php

namespace App\Models;

use Database\Factories\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Client extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ClientFactory::new();
    }
    // public static function find($id){
    //     if(){
    //         throw new ModelNotFoundException("Client not found");
    //     }
    // }
}
