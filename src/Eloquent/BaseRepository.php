<?php

namespace Tendou1618\TendouRepository\Eloquent;

use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Tendou1618\TendouRepository\Contracts\RepositoryInterface;
use Tendou1618\TendouRepository\Exceptions\RepositoryException;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @var Collection
     */
    protected $criteria;

    public function __construct(App $app, Collection $collection)
    {
        $this->app = $app;
        $this->criteria = $collection;
        // $this->resetScope();
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public abstract function model();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        // $this->applyCriteria();
        return $this->model->get($columns);
    }
}
