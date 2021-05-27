<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Concert;
use App\Models\Customer;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function concerts()
    {
        return $this->belongsToMany(Concert::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
