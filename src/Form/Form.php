<?php

namespace Checkk\HtmlBuilder\Form;

use Checkk\HtmlBuilder\BaseHtml\Attribute;
use Checkk\HtmlBuilder\BaseHtml\Element;

class Form extends Element
{
    const
        METHOD_POST = 'post',
        METHOD_GET = 'get';

    /**
     * Form constructor.
     * @param string $action // Uri or url
     * @param string $method // post or get
     * @param Input[] $inputs
     */
    public function __construct($action = '', $method = self::METHOD_POST, $inputs = [])
    {
        parent::__construct('form');
        $this
            ->addAttribute('action', $action)
            ->addAttribute('method', $method);

        foreach ($inputs as $input) {
            $this->addInnerHtml($input);
        }
    }

    /**
     * @param string $type
     * @param string|null $name
     * @param mixed $value
     *
     * @return Form
     */
    public function addInput(string $type, $name = '', $value = null): Form
    {
        $this->addInnerHtml(new Input($type, $name, $value));

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return Form
     */
    public function addHiddenInput(string $name, $value = null): Form
    {
        if ('' !== $value) {
            $this->addInput(Input::TYPE_HIDDEN, $name, $value);
        }

        return $this;
    }

    /**
     * @param string|null $value
     *
     * @return Form
     */
    public function addSubmitInput($value = null): Form
    {
        $this->addInput(Input::TYPE_SUBMIT, null, $value);

        return $this;
    }

    /**
     * @param string|null $script
     * @param string|null $src
     * @return Form
     */
    public function addScript($script = '', $src = ''): Form
    {
        $attrs = [];
        if ($src) {
            $attrs[] = new Attribute('src', $src);
        }
        $this->addAfterHtml(new Element('script', $attrs, $script));

        return $this;
    }

}
