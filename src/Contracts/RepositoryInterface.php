<?php

namespace Tendou1618\TendouRepository\Contracts;

interface RepositoryInterface
{
    public function all($columns = array('*'));
}