<?php

class Form 
{

    public $rawsTypes = [
        null => 'Выберите тип сырья',
        1 => 'Шрот',
        2 => 'Жмых',
        3 => 'Соя',
    
    ];

    public $tonnages = [
        null => 'Выберите тоннаж',
        1 => '25',
        2 => '50',
        3 => '75',
        4 => '100',
        
    ];
    
    public $month = [
        null => 'Выберите месяц',
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Август',
        4 => 'Сентябрь',
        5 => 'Октябрь',
        6 => 'Ноябрь',
        
    ];

    public $attributes = [
        'rawsTypes' => null,
        'tonnages' => null,
        'month' => null,
    ];
    
    public $errors = [];

    public function load($attributes)
    {
        foreach ($attributes as $key => $value) {

            if (array_key_exists($key, $this->attributes)) {
                $this->attributes[$key] = $value;
            }
        }
    }

    public function validate()
    {
        if ($this->attributes['rawsTypes'] == null) {
            $this->errors['rawsTypes'] = "Необходимо заполнить тип сырья";
        }

        if ($this->attributes['tonnages'] == null) {
            $this->errors['tonnages'] = "Необходимо заполнить тоннаж";
        }

        if ($this->attributes['month'] == null) {
            $this->errors['month'] = "Необходимо заполнить месяц";
        }
    }

    public function getRawTypes()
    {
        return $this->rawsTypes;
    }

    public function hasRawTypesError()
    {
        if (empty($attributes['rawsTypes'])) {
            return $this->errors['rawsTypes'];
        } else {
            return false;
        }
    }
    
    public function printRawTypesError()
    {
        echo $this->errors['rawsTypes'];
    }

    public function getTonnages()
    {
        return $this->tonnages;
    }

    public function hasTonnageError()
    {
        if (empty($attributes['tonnages'])) {
            return $this->errors['tonnages'];
        } else {
            return false;
        }
    }

    public function printTonnageError()
    {
        echo $this->errors['tonnages'];
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function hasMonthError()
    {
        if (empty($attributes['month'])) {
            return $this->errors['month'];
        } else {
            return false;
        }
    }

    public function printMonthError()
    {
        echo $this->errors['month'];
    }
    
}

$form = new Form();