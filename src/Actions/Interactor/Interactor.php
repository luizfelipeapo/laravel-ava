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

namespace LApolinario\Ava\Actions\Interactor;

use LApolinario\Ava\Actions\Action;

abstract class Interactor
{
    /**
     * @var Action
     */
    protected $action;

    /**
     * @var array
     */
    public static $elements = [
        'success', 'error', 'warning', 'info', 'question', 'confirm',
        'text', 'email', 'integer', 'ip', 'url', 'password', 'mobile',
        'textarea', 'select', 'multipleSelect', 'checkbox', 'radio',
        'file', 'image', 'date', 'datetime', 'time', 'hidden', 'multipleImage',
        'multipleFile', 'modalLarge', 'modalSmall',
    ];

    /**
     * Dialog constructor.
     *
     * @param Action $action
     */
    public function __construct(Action $action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    abstract public function addScript();
}
