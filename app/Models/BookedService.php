<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookedService extends BaseModel
{
    protected $fillable = [
        'user_id',
        'service_id',
        'service_name'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
