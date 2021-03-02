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

namespace LApolinario\Ava\Form\Field;

class Rate extends Text
{
    public function render()
    {
        $this->prepend('')
            ->append('%')
            ->defaultAttribute('style', 'text-align:right;')
            ->defaultAttribute('placeholder', 0);

        return parent::render();
    }
}
