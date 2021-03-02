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

class Password extends Text
{
    public function render()
    {
        $this->prepend('<i class="fa fa-eye-slash fa-fw"></i>')
            ->defaultAttribute('type', 'password');

        return parent::render();
    }
}
