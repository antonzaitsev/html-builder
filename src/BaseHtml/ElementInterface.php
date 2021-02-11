<?php

namespace Checkk\HtmlBuilder\BaseHtml;

interface ElementInterface
{
    public function getTag(): string;

    public function setTag(string $tag): ElementInterface;

    public function getAttributes(): array;

    public function setAttributes(array $attributes): ElementInterface;

    public function addAttribute(string $name, $value): ElementInterface;

    public function isCloseableTag(): bool;

    public function getInnerHtml(): string;

    public function setInnerHtml(string $innerHtml): ElementInterface;

    public function addInnerHtml($innerHtml): ElementInterface;

    public function getBeforeHtml(): string;

    public function setBeforeHtml(string $beforeHtml): ElementInterface;

    public function addBeforeHtml($beforeHtml): ElementInterface;

    public function getAfterHtml(): string;

    public function setAfterHtml(string $afterHtml): ElementInterface;

    public function addAfterHtml($afterHtml): ElementInterface;

    public function __toString(): string;

}
