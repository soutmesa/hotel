<?php
 
namespace App\Repositories;
 
use App\Role;
 
class EloquentRole implements RoleRepository
{
	/**
	 * @var $model
	 */
	private $model;
 
	/**
	 * EloquentRole constructor.
	 *
	 * @param App\Role $model
	 */
	public function __construct(Role $model)
	{
		$this->model = $model;
	}
 
	/**
	 * Get all Roles.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function getAll()
	{
		return $this->model->all();
	}
 
	/**
	 * Get Role by id.
	 *
	 * @param integer $id
	 *
	 * @return App\Role
	 */
	public function getById($id)
	{
		return $this->model->find($id);
	}
 
	/**
	 * Create a new Role.
	 *
	 * @param array $attributes
	 *
	 * @return App\Role
	 */
	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}
 
	/**
	 * Update a Role.
	 *
	 * @param integer $id
	 * @param array $attributes
	 *
	 * @return App\Role
	 */
	public function update($id, array $attributes)
	{
		return $this->model->find($id)->update($attributes);
	}
 
	/**
	 * Delete a Role.
	 *
	 * @param integer $id
	 *
	 * @return boolean
	 */
	public function delete($id)
	{
		return $this->model->find($id)->delete();
	}
}