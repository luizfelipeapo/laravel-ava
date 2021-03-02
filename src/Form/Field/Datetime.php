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

class Datetime extends Date
{
    protected $format = 'YYYY-MM-DD HH:mm:ss';

    public function render()
    {
        $this->defaultAttribute('style', 'width: 160px');

        return parent::render();
    }
}
