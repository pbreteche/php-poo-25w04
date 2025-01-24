<?php

class FormBuilder
{
    private array $fields = [];

    public function add($field): self
    {
        $this->fields[] = $field;

        return $this;
    }

    public function getForm(): Form
    {
        return new Form($this->fields);
    }
}
