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

    public function rules()
    {
        return [
            'rawsTypes' => function ($key) {
                if (! array_key_exists($key, $this->attributes)) {
                    throw new Exception('Отсутвует обязательное поле - тип сырья');
                }

                if ($this->attributes[$key] == null) {
                    throw new Exception('Необходимо заполнить тип сырья');
                }
            },

            'tonnages' => function ($key) {
                if (! array_key_exists($key, $this->attributes)) {
                    throw new Exception('Отсутвует обязательное поле - тоннаж');
                }

                if ($this->attributes[$key] == null) {
                    throw new Exception('Необходимо заполнить тоннаж');
                }
            },

            'month' => function ($key) {
                if (! array_key_exists($key, $this->attributes)) {
                    throw new Exception('Отсутвует обязательное поле - месяц');
                }

                if ($this->attributes[$key] == null) {
                    throw new Exception('Необходимо заполнить месяц');
                }
            },
        ];

    }

    public function validate()
    {
        foreach ($this->rules() as $key => $value) {
            try {
                $value($key);
            } catch (Exception $e) {
                $this->errors[$key] = $e->getMessage();
            }
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

    public function getRawTypesAttributeName()
    {
        return 'rawsTypes';
    }

    public function getTonnageAttributeName()
    {
        return 'tonnages';
    }

    public function getMonthAttributeName()
    {
        return 'month';
    }

    public function hasRawTypesError()
    {
        return ! empty($this->errors);
    }

    public function hasTonnageError()
    {
        return ! empty($this->errors);
    }

    public function hasMonthError()
    {
        return ! empty($this->errors);
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

    public function printRawsTypesName()
    {
        return $this->rawsTypes[$this->attributes['rawsTypes']];
    }

    public function printTonnagesName()
    {
        return $this->tonnages[$this->attributes['tonnages']];
    }

    public function printMonthName()
    {
        return $this->month[$this->attributes['month']];
    }
    
}