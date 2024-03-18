<?php

namespace App\Http\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

use App\Http\Repositories\Base\BaseRepositoryInterface;
use App\Http\Requests\UserRequest;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): ?Collection
    {
        return $this->model->get()->chunk(1000);//to specify how many records you want to retrieve in each chunk

    }

    public function create(array $data): Model
    {

        return $this->model->create($data);
    }

    public function update(array $data, $id): bool
    {
        return $this->model->where("id", $id)->update($data);
    }
    public function show($id): Model
    {

        return $this->model->whereId($id)->first();
    }
    public function delete($id): bool
    {

        return $this->model->whereId($id)->delete();
    }
}