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

namespace LApolinario\Ava\Grid\Selectable;

use Illuminate\Contracts\Support\Renderable;

class BrowserBtn implements Renderable
{
    public function render()
    {
        $text = admin_trans('admin.choose');

        $html = <<<HTML
<a href="javascript:void(0)" class="btn btn-primary btn-sm pull-left select-relation">
    <i class="glyphicon glyphicon-folder-open"></i>
    &nbsp;&nbsp;{$text}
</a>
HTML;

        return $html;
    }
}
