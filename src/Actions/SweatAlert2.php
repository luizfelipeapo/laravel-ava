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

namespace LApolinario\Ava\Actions;

class SweatAlert2
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param string $type
     * @param string $title
     *
     * @return $this
     */
    public function show($type, $title = '')
    {
        $this->type = $type;
        $this->title = $title;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            'swal' => [
                'type'  => $this->type,
                'title' => $this->title,
            ],
        ];
    }
}
