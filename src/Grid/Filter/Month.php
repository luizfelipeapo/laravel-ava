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

class Month extends Date
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereMonth';

    /**
     * @var string
     */
    protected $fieldName = 'month';
}
