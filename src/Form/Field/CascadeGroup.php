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

use LApolinario\Ava\Form\Field;

class CascadeGroup extends Field
{
    /**
     * @var array
     */
    protected $dependency;

    /**
     * @var string
     */
    protected $hide = 'hide';

    /**
     * CascadeGroup constructor.
     *
     * @param array $dependency
     */
    public function __construct(array $dependency)
    {
        $this->dependency = $dependency;
    }

    /**
     * @param Field $field
     *
     * @return bool
     */
    public function dependsOn(Field $field)
    {
        return $this->dependency['column'] == $field->column();
    }

    /**
     * @return int
     */
    public function index()
    {
        return $this->dependency['index'];
    }

    /**
     * @return void
     */
    public function visiable()
    {
        $this->hide = '';
    }

    /**
     * @return string
     */
    public function render()
    {
        return <<<HTML
<div class="cascade-group {$this->dependency['class']} {$this->hide}">
HTML;
    }

    /**
     * @return void
     */
    public function end()
    {
        $this->form->html('</div>')->plain();
    }
}
