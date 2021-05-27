<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Ticket;

class Concert extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }
}
