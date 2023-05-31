<?php

declare(strict_types=1);

namespace Krypton\Element;

class Element
{
    protected string $name;
    protected array $attrs;
    protected array $elements;
    protected string $content;
    protected bool $closing = true;
    
    public function __construct(string $name, array $attrs, array $elements, string $content ='', bool $closing = true)
    {
        $this->name = $name;
        $this->attrs = $attrs;
        $this->content = $content;
        $this->closing = $closing;
        $this->prepareElementsFromArray($elements);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAttrs(): array
    {
        return $this->attrs;
    }

    public function setAttrs(array $attrs): void
    {
        $this->attrs = $attrs;
    }

    public function addAttr($key, $value): void
    {
        $this->attrs[$key] = $value;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function setElements(array $elements): void
    {
        $this->elements = $elements;
    }

    public function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getClosing(): bool
    {
        return $this->closing;
    }

    public function setClosing(bool $closing): void
    {
        $this->closing = $closing;
    }

    private function getAttrString(): string
    {
        $attrString = '';
        if (!empty($this->attrs)) {
            foreach ($this->attrs as $attrKey => $attrValue) {
                $attrString .= ' ' . $attrKey . '="' . $attrValue . '"';
            }
        }

        return $attrString;
    }
    private function prepareElementsFromArray(array $elements): void
    {
        if (!empty($elements)) {
            foreach ($elements as $element) {
                if ((!($element instanceof Element)) && is_array($element)) { 
                    $this->elements[] = new Element($element['name'], $element['attrs'] ?? [], $element['elements'] ?? [], $element['content'] ?? '', $element['closing'] ?? true);
                } else {
                    $this->elements[] = $element;
                }
            }
        }
    }

    public function render(bool $return = false): null|string
    {
        $html = '';

        if ($this->name == 'string') {
            $html .= $this->content;            
        } else {
            $html .= '<' . $this->name . $this->getAttrString() . '>';
            
            if (!empty($this->elements)) {
                foreach ($this->elements as $element) {
                    $html .= $element->render(true);
                }
            }

            if ($this->closing) {
                $html .= '</' . $this->name . '>';
            }
        }

        if ($return) {
            return $html;
        } else {
            echo $html;
            return null;
        }
    }
}
