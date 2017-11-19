<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-04 19:17:57
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-04 19:18:15
 */

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}