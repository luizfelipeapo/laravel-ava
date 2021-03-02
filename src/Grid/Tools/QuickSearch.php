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

namespace LApolinario\Ava\Grid\Tools;

use LApolinario\Ava\Grid\Concerns\HasQuickSearch;
use Illuminate\Support\Arr;

class QuickSearch extends AbstractTool
{
    /**
     * @var string
     */
    protected $view = 'admin::grid.quick-search';

    /**
     * @var string
     */
    protected $placeholder;

    /**
     * Set placeholder.
     *
     * @param string $text
     *
     * @return $this
     */
    public function placeholder($text = '')
    {
        $this->placeholder = $text;

        return $this;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $query = request()->query();

        Arr::forget($query, HasQuickSearch::$searchKey);

        $vars = [
            'action'      => request()->url().'?'.http_build_query($query),
            'key'         => HasQuickSearch::$searchKey,
            'value'       => request(HasQuickSearch::$searchKey),
            'placeholder' => $this->placeholder,
        ];

        return view($this->view, $vars);
    }
}
