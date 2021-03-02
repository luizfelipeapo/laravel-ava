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

namespace LApolinario\Ava\Grid\Filter;

use Illuminate\Support\Arr;

class In extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereIn';

    /**
     * Get condition of this filter.
     *
     * @param array $inputs
     *
     * @return mixed
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column);

        if (is_null($value)) {
            return;
        }

        $this->value = (array) $value;

        return $this->buildCondition($this->column, $this->value);
    }
}
