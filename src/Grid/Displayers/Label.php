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

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class Label extends AbstractDisplayer
{
    public function display($style = 'success')
    {
        if ($this->value instanceof Arrayable) {
            $this->value = $this->value->toArray();
        }

        return collect((array) $this->value)->map(function ($item) use ($style) {
            if (is_array($style)) {
                if (is_string($this->getColumn()->getOriginal()) || is_int($this->getColumn()->getOriginal())) {
                    $style = Arr::get($style, $this->getColumn()->getOriginal(), 'success');
                } else {
                    $style = Arr::get($style, $item, 'success');
                }
            }

            return "<span class='label label-{$style}'>$item</span>";
        })->implode('&nbsp;');
    }
}