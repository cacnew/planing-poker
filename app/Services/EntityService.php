<?php

namespace App\Services;


interface EntityService
{
    public function create(array $data);

    public function delete($id);

    public function update(array $data, $id);

    public function skipPresenter($status = true);

    public function updateOrCreate(array $where, array $values = []);

    public function getRepository();

}