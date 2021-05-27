<?php

namespace App\Repositories;

// interfaces
use App\Contracts\ConcertContract;

// file Storage
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// models
use App\Models\Concert;
use App\Models\Ticket;

class ConcertRepository implements ConcertContract{

    private $model;

    public function __construct(Concert $model){
        $this->model = $model;
    }

    public function storing(array $attributes){
        return $this->model->create($attributes);
    }

    public function getAll(){
        return $this->model->all();
    }

    public function dropping($id){
        $concert = $this->model->find($id);
        $path = \storage_path('app\public\img\\'.$concert->image);
        unlink($path);
        $concert->tickets()->detach();
        return $concert->delete();
    }

    public function update(array $attributes, $id){
        return $this->model->all();
    }
}
