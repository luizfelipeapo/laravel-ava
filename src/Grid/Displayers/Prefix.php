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

class Prefix extends AbstractDisplayer
{
    public function display($prefix = null, $delimiter = '&nbsp;')
    {
        if ($prefix instanceof \Closure) {
            $prefix = $prefix->call($this->row, $this->getValue(), $this->getColumn()->getOriginal());
        }

        return <<<HTML
{$prefix}{$delimiter}{$this->getValue()}
HTML;
    }
}
