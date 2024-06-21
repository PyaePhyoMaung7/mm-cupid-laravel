<?php

namespace App\Repositories\Hobby;

interface HobbyRepositoryInterface
{
    public function store(array $data);

    public function getHobbies();

    public function getHobbyById(int $id);

    public function update(array $data);

}
