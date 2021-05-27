<?php

namespace App\Repositories;

// interfaces
use App\Contracts\LandingContract;

// models
use App\Models\Concert;
use App\Models\Ticket;
use App\Models\Customer;

use Illuminate\Support\Facades\DB;

class LandingRepository implements LandingContract{

    private $model;
    private $customer;
    private $ticket;
    private $concert;

    public function __construct(Concert $model, Customer $customer, Ticket $ticket){
        $this->model    = $model;
        $this->customer = $customer;
        $this->ticket   = $ticket;
    }

    public function storing(array $attributes, $id){
        try{
            $ticket_number = '';
            DB::transaction(function() use($attributes, &$id, &$ticket_number){
                $customer = $this->customer->create($attributes);
                $ticket   = $this->ticket::create(['number' => rand(1111111111,9999999999),'status' => 1,]);
                $concert  = $this->model->find($id);
                $concert->tickets()->attach($ticket);
                $customer->tickets()->attach($ticket);
                $ticket_number = $ticket->number;
                return compact('ticket_number');
            });
                return $ticket_number;
        }catch(Exception $e){
            return $e;
        }
    }

    public function getAll(){
        return $this->model->all();
    }
}
