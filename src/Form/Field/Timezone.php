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

use DateTimeZone;

class Timezone extends Select
{
    protected $view = 'admin::form.select';

    public function render()
    {
        $this->options = collect(DateTimeZone::listIdentifiers(DateTimeZone::ALL))->mapWithKeys(function ($timezone) {
            return [$timezone => $timezone];
        })->toArray();

        return parent::render();
    }
}
