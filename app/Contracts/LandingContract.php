<?php

namespace App\Contracts;

Interface LandingContract
{
    function getAll();
    function storing(array $attributes, $id);

}
