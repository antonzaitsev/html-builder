<?php

namespace Checkk\HtmlBuilder\BaseHtml;


class Element implements ElementInterface
{
    /* @var string|null $tag */
    protected $tag = 'div';

    /* @var AttributeInterface[] $attributes */
    protected $attributes = [];
    /**
     * Text or html
     * @var string|null $innerHtml
     */
    protected $innerHtml = '';

    /**
     * Text or html
     * @var string $innerHtml
     */
    protected $afterHtml = '';

    /**
     * Text or html
     * @var string $innerHtml
     */
    protected $beforeHtml = '';

    /**
     * HtmlElement constructor.
     *
     * @param string|null $tag
     * @param array|null $attributes
     * @param string|null $innerHtml
     */
    public function __construct($tag = 'div', $attributes = [], $innerHtml = '')
    {
        $this->tag = $tag ?? 'div';
        $this->innerHtml = $innerHtml;
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     *
     * @return ElementInterface
     */
    public function setTag(string $tag): ElementInterface
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     *
     * @return ElementInterface
     */
    public function setAttributes(array $attributes): ElementInterface
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return ElementInterface
     */
    public function addAttribute(string $name, $value = null): ElementInterface
    {
        $this->attributes[] = new Attribute($name, $value);

        return $this;
    }

    /**
     * @return bool
     */
    public function isCloseableTag(): bool
    {
        return !in_array($this->tag, ['input', 'br', 'hr', 'img']);
    }

    /**
     * @return string
     */
    public function getInnerHtml(): string
    {
        return $this->innerHtml;
    }

    /**
     * @param string $innerHtml
     *
     * @return ElementInterface
     */
    public function setInnerHtml(string $innerHtml): ElementInterface
    {
        $this->innerHtml = $innerHtml;

        return $this;
    }

    /**
     * @param ElementInterface|string $innerHtml
     *
     * @return ElementInterface
     */
    public function addInnerHtml($innerHtml): ElementInterface
    {
        $this->innerHtml .= $innerHtml;

        return $this;
    }

    /**
     * @return string
     */
    public function getAfterHtml(): string
    {
        return $this->afterHtml;
    }

    /**
     * @param string $afterHtml
     *
     * @return ElementInterface
     */
    public function setAfterHtml(string $afterHtml): ElementInterface
    {
        $this->afterHtml = $afterHtml;

        return $this;
    }

    /**
     * @param ElementInterface|string $afterHtml
     *
     * @return ElementInterface
     */
    public function addAfterHtml($afterHtml): ElementInterface
    {
        $this->afterHtml .= $afterHtml;

        return $this;
    }

    /**
     * @return string
     */
    public function getBeforeHtml(): string
    {
        return $this->beforeHtml;
    }

    /**
     * @param string $beforeHtml
     *
     * @return ElementInterface
     */
    public function setBeforeHtml(string $beforeHtml): ElementInterface
    {
        $this->beforeHtml = $beforeHtml;

        return $this;
    }

    /**
     * @param ElementInterface|string $beforeHtml
     *
     * @return ElementInterface
     */
    public function addBeforeHtml($beforeHtml): ElementInterface
    {
        $this->beforeHtml .= $beforeHtml;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $out = '';

        if ($this->beforeHtml !== '') {
            $out .= $this->beforeHtml;
        }

        $out .= '<' . $this->tag . ' ';
        if ($this->attributes) {
            foreach ($this->attributes as $attribute) {
                $out .= $attribute;
            }
        }
        $out .= '>';
        if ($this->innerHtml) {
            $out .= $this->innerHtml;
        }
        if ($this->isCloseableTag()) {
            $out .= '</' . $this->tag . '>';
        }

        if ($this->afterHtml !== '') {
            $out .= $this->afterHtml;
        }

        return $out;
    }
}
