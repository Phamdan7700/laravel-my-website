<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
	protected $model;

	public function __construct()
	{
		$this->setModel();
	}

	abstract public function getModel();

	public function setModel()
	{
		$this->model = app()->make(
			$this->getModel()
		);
	}

	public function getAll()
	{
		$paginate = config('admin.num_page_admin');
		return $this->model->paginate($paginate);
	}

	public function find($id)
	{
		return $this->model->findOrFail($id);
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	public function update($id, array $attributes)
	{
		$result = $this->model->findOrFail($id);
		if ($result) {
			$result->update($attributes);
			return $result;
		}
		return false;
	}

	public function delete($id)
	{
		$result = $this->model->findOrFail($id);
		if ($result) {
			$result->delete();
			return true;
		}
		return false;
	}

	public function changeStatus($id)
	{
		$result = $this->model->findOrFail($id);
		$status = $result->status;
		if ($status == 1) {
			$result->status = 0;
		} else {
			$result->status = 1;
		}
		$result->update(['status'=> $result->status]);
		return $result->status;
	}
}
