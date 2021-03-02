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

namespace LApolinario\Ava\Grid\Displayers;

class Suffix extends AbstractDisplayer
{
    public function display($suffix = null, $delimiter = '&nbsp;')
    {
        if ($suffix instanceof \Closure) {
            $suffix = $suffix->call($this->row, $this->getValue());
        }

        return <<<HTML
{$this->getValue()}{$delimiter}{$suffix}
HTML;
    }
}
