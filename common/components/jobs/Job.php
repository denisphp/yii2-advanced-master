<?php
namespace common\components\jobs;

use yii\base\Object;

abstract class Job extends Object
{
    /** @var string */
    public $class;

    public function init()
    {
        $this->class = get_called_class();
    }

    abstract public function execute();
}
