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

class Like extends AbstractFilter
{
    /**
     * @var string
     */
    protected $exprFormat = '%{value}%';

    /**
     * @var string
     */
    protected $operator = 'like';

    /**
     * Get condition of this filter.
     *
     * @param array $inputs
     *
     * @return array|mixed|void
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column);

        if (is_array($value)) {
            $value = array_filter($value);
        }

        if (is_null($value) || empty($value)) {
            return;
        }

        $this->value = $value;

        $expr = str_replace('{value}', $this->value, $this->exprFormat);

        return $this->buildCondition($this->column, $this->operator, $expr);
    }
}