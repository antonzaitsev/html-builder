<?php

namespace Checkk\HtmlBuilder\BaseHtml;

class Attribute implements AttributeInterface
{
    /* @var string $name */
    private $name;

    /* @var mixed $value */
    private $value;

    /**
     * ElementAttribute constructor.
     *
     * @param string $name
     * @param mixed $value
     */
    public function __construct(string $name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $out = $this->name;
        if ($this->value !== null) {
            if ($this->value === '') {
                $out .= '=" "';
            } elseif ($this->value === 0) {
                $out .= '="0" ';
            } else {
                $out .= '="' . $this->value . '" ';
            }
        }

        return $out;
    }
}
