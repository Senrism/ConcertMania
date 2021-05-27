<?php

namespace App\Contracts;

Interface ConcertContract
{
    function getAll();
    function storing(array $attributes);
    function dropping($id);
    function update(array $attributes, $id);
}
