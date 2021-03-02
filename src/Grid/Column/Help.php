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

namespace LApolinario\Ava\Grid\Column;

use Illuminate\Contracts\Support\Renderable;

class Help implements Renderable
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * Help constructor.
     *
     * @param string $message
     */
    public function __construct($message = '')
    {
        $this->message = $message;
    }

    /**
     * Render help  header.
     *
     * @return string
     */
    public function render()
    {
        $data = [
            'toggle'    => 'tooltip',
            'placement' => 'right',
            'html'      => 'true',
            'title'     => $this->message,
        ];

        $data = collect($data)->map(function ($val, $key) {
            return "data-{$key}=\"{$val}\"";
        })->implode(' ');

        return <<<HELP
<a href="javascript:void(0);" class="grid-column-help" {$data}>
    <i class="fa fa-question-circle"></i>
</a>
HELP;
    }
}
