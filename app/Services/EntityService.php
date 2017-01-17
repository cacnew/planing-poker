<?php

namespace App\Services;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class EntityService
{
    protected $repository;
    protected $validator;

    public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return $e->getMessageBag();
        }
    }

    public function delete($id)
    {
        if ($this->repository->delete($id)) {
            return [
                'data' => ['deleted' => true]
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return $e->getMessageBag();
        }
    }

    public function skipPresenter($status = true)
    {
        $this->repository = $this->repository->skipPresenter($status);
        return $this;
    }

    public function updateOrCreate(array $where, array $values = [])
    {
        $model = $this->repository->skipPresenter()->findWhere($where)->first();
        if ($model) {
            return $this->update($values, $model->id);
        }
        return $this->create($values);
    }

    public function getRepository()
    {
        return $this->repository;
    }
}