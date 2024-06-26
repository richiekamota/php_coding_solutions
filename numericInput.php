<?php
class TextInput
{
    protected $text = "";

    public function add($text)
    {
        $this->text .= $text;
    }

    public function getValue()
    {
        return $this->text;
    }
}

class NumericInput extends TextInput
{
    public function add($text)
    {        
        if (is_numeric($text)) {
            parent::add($text);
        }
    }
}

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue(); 