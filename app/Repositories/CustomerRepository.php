<?php

namespace App\Repositories;

// interfaces
use App\Contracts\CustomerContract;

// models
use App\Models\Customer;

class CustomerRepository implements CustomerContract{

    private $model;

    public function __construct(Customer $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function findId($id){
        return $this->model->find($id);
    }

    public function updating(array $attributes){
        try{
            return $this->model->where('id', $attributes['id'])->update($attributes);
        }catch(Exception $e){
            return $e;
        }
    }
}
