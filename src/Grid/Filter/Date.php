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

class Date extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereDate';

    /**
     * @var string
     */
    protected $fieldName = 'date';

    /**
     * {@inheritdoc}
     */
    public function __construct($column, $label = '')
    {
        parent::__construct($column, $label);

        $this->{$this->fieldName}();
    }
}
