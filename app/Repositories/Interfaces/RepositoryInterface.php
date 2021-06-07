<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface {

  public function getModel();

  public function setModel();

  public function getAll();

  public function find($id);

  public function create(array $attributes);

  public function update($id, array $attributes);

  public function delete($id);
}
