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

use LApolinario\Ava\Admin;
use LApolinario\Ava\Grid\Simple;
use Illuminate\Contracts\Support\Renderable;

class Expand extends AbstractDisplayer
{
    protected $renderable;

    public function display($callback = null, $isExpand = false)
    {
        $html = '';
        $async = false;
        $loadGrid = false;

        if (is_subclass_of($callback, Renderable::class)) {
            $this->renderable = $callback;
            $async = true;
            $loadGrid = is_subclass_of($callback, Simple::class);
        } else {
            $html = call_user_func_array($callback->bindTo($this->row), [$this->row]);
        }

        return Admin::component('admin::components.column-expand', [
            'key'           => $this->getKey(),
            'url'           => $this->getLoadUrl(),
            'name'          => str_replace('.', '-', $this->getName()).'-'.$this->getKey(),
            'html'          => $html,
            'value'         => $this->value,
            'async'         => $async,
            'expand'        => $isExpand,
            'loadGrid'      => $loadGrid,
            'elementClass'  => "grid-expand-{$this->grid->getGridRowName()}",
        ]);
    }

    /**
     * @param int $multiple
     *
     * @return string
     */
    protected function getLoadUrl()
    {
        $renderable = str_replace('\\', '_', $this->renderable);

        return route('admin.handle-renderable', compact('renderable'));
    }
}
