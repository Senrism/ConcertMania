<?php

namespace App\Contracts;

Interface TicketContract
{
    function getAll();
    function findAndCheck($number);
    function dropping($id);
    function update(array $attributes, $id);

}
