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

namespace LApolinario\Ava\Layout;

use LApolinario\Ava\Grid;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class Column
 * @package LApolinario\Ava\Layout
 */
class Column implements Buildable
{
    /**
     * grid system prefix width.
     *
     * @var array
     */
    protected $width = [];

    /**
     * @var array
     */
    protected $contents = [];

    /**
     * Column constructor.
     *
     * @param $content
     * @param int $width
     */
    public function __construct($content, $width = 12)
    {
        if ($content instanceof \Closure) {
            call_user_func($content, $this);
        } else {
            $this->append($content);
        }
        if (is_null($width) || (is_array($width) && count($width) === 0)) {
            $this->width['md'] = 12;
        }
        elseif (is_numeric($width)) {
            $this->width['md'] = $width;
        } else {
            $this->width = $width;
        }
    }

    /**
     * Append content to column.
     *
     * @param $content
     *
     * @return $this
     */
    public function append($content)
    {
        $this->contents[] = $content;
        return $this;
    }

    /**
     * Add a row for column.
     *
     * @param $content
     *
     * @return Column
     */
    public function row($content)
    {
        if (!$content instanceof \Closure) {
            $row = new Row($content);
        } else {
            $row = new Row();

            call_user_func($content, $row);
        }
        ob_start();
        $row->build();
        $contents = ob_get_contents();
        ob_end_clean();
        return $this->append($contents);
    }

    /**
     * Build column html.
     */
    public function build()
    {
        $this->startColumn();
        foreach ($this->contents as $content) {
            if ($content instanceof Renderable || $content instanceof Grid) {
                echo $content->render();
            } else {
                echo (string) $content;
            }
        }
        $this->endColumn();
    }

    /**
     * Start column.
     */
    protected function startColumn()
    {
        $classnName = collect($this->width)->map(function ($value, $key) {
            return "col-$key-$value";
        })->implode(' ');

        echo "<div class=\"{$classnName}\">";
    }

    /**
     * End column.
     */
    protected function endColumn()
    {
        echo '</div>';
    }
}
