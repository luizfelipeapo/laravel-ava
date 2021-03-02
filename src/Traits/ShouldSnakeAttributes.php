<?php
/**
 * LApolinario
 *
 * @category  LApolinario
 * @package   Ava
 * @version   1.0.0
 * @author    Luiz Felipe Apolinário <luizfelipeapo@gmail.com>
 */

declare(strict_types=1);

namespace LApolinario\Ava\Traits;

use LApolinario\Ava\Grid\Model as GridModel;

trait ShouldSnakeAttributes
{
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @var bool
     */
    protected static $snakeAttributes;

    /**
     * Indicates if model should snake attribute name.
     *
     * @return bool
     */
    public function shouldSnakeAttributes()
    {
        if (is_bool(static::$snakeAttributes)) {
            return static::$snakeAttributes;
        }

        $model = ($this->model instanceof GridModel) ?
            $this->model->eloquent() : $this->model;

        $class = get_class($model);

        return static::$snakeAttributes = $class::$snakeAttributes;
    }
}
