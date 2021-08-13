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

    public function getTonnages()
    {
        return $this->tonnages;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function hasRawTypesError()
    {
        return ! empty($this->errors['rawsTypes']);
    }

    public function hasTonnageError()
    {
        return ! empty($this->errors['tonnages']);
    }

    public function hasMonthError()
    {
        return ! empty($this->errors['month']);
    }
    
    public function printRawTypesError()
    {
        return $this->errors['rawsTypes'];
    }

    public function printTonnageError()
    {
        return $this->errors['tonnages'];
    }

    public function printMonthError()
    {
        return $this->errors['month'];
    }
    
}