<?php

namespace Checkk\HtmlBuilder\Form;

use Checkk\HtmlBuilder\BaseHtml\Element;

class Input extends Element
{
    const
        TYPE_HIDDEN = 'hidden',
        TYPE_SUBMIT = 'submit';

    /**
     * HtmlElementInput constructor.
     *
     * @param string $type
     * @param string|null $name
     * @param null $value
     */
    public function __construct($type = 'text', $name = '', $value = null)
    {
        parent::__construct('input');

        $this->addAttribute('type', $type);
        if ($name) {
            $this->addAttribute('name', $name);
        }
        if ($value !== null) {
            $this->addAttribute('value', $value);
        }
    }

}
