<?php

namespace App\Repositories;

// interfaces
use App\Contracts\TicketContract;

// models
use App\Models\Ticket;

class TicketRepository implements TicketContract{

    private $model;

    public function __construct(Ticket $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function update(array $attributes, $id){

    }

    public function findAndCheck($number){
        $ticket = $this->model->where('number', $number)->first();
        if($ticket == null) {
            $data = null;
            return $data;
        }else{
            if($ticket->status == 1){
                $data = 'checked';
                return $data;
            }else{
                $ticket->update(['status' => 1]);
                $data = $ticket->customers;
                return $data;
            }
        }
    }

    public function dropping($id){
        $ticket = $this->model->find($id);
        $ticket->concerts()->detach();
        $ticket->customers()->detach();
        return $ticket->delete();
    }
}
