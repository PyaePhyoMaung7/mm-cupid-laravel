<?php

namespace App\Repositories\City;

interface CityRepositoryInterface
{
    public function store(array $data);

    public function getCities();

    public function getCityById(int $id);

    public function update(array $data);

}
