<?php


class Validation
{
    private $_passed = false,
        $_errors = array(),
        $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
//                echo "{$item} {$rule} musi być {$rule_value}<br>";
                $value = $source[$item];
                $item = escape($item);

                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} jest wymagane");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} musi mieć minimum {$rule_value} znaki");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} może mieć maksymalnie {$rule_value} znaków");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("Hasła muszą być jednakowe");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if ($check->count()) {
                                $this->addError("{$item} login już zajęty");
                            }
                            break;


                    }

                }
            }
        }
        if (empty($this->errors())) { //_errors
            $this->_passed = true;
        }
        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}