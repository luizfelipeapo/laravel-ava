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

class Link extends AbstractDisplayer
{
    public function display($callback = '', $target = '_blank')
    {
        if ($callback instanceof \Closure) {
            $callback = $callback->bindTo($this->row);
            $href = call_user_func_array($callback, [$this->row]);
        } else {
            $href = $callback ?: $this->value;
        }

        return "<a href='$href' target='$target'>{$this->value}</a>";
    }
}
