<?php

namespace App\Contracts;

Interface CustomerContract
{
    function getAll();
    function findId($id);
    function updating(array $attributes);
}
