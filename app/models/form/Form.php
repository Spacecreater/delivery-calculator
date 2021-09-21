<?php

namespace app\models\form;
use \Exception;

class Form 
{
    /**
     * @var array
     */
    public $rawsTypes = [
        null => 'Выберите тип сырья',
        1 => 'Шрот',
        2 => 'Жмых',
        3 => 'Соя',
    
    ];

    /**
     * @var array
     */
    public $tonnages = [
        null => 'Выберите тоннаж',
        1 => '25',
        2 => '50',
        3 => '75',
        4 => '100',
    
    ];

    /**
     * @var array
     */
    public $month = [
        null => 'Выберите месяц',
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Август',
        4 => 'Сентябрь',
        5 => 'Октябрь',
        6 => 'Ноябрь',
        
    ];

    /**
     * @var array
     */
    public $attributes = [
        'rawsTypes' => null,
        'tonnages' => null,
        'month' => null,
    ];

    /**
     * @var array
     */
    public $errors = [];

    /**
     * @param array $attributes
     * @return void
     */
    public function load(array $attributes): void
    {
        foreach ($attributes as $key => $value) {
            if (array_key_exists($key, $this->attributes)) {
                $this->attributes[$key] = $value;
            }
        }
    }

    /**
     * @return array
     */
    private function rules(): array
    {
        return [
            'rawsTypes' => function (string $key): void {
                if (! array_key_exists($key, $this->attributes)) {
                    throw new Exception('Отсутвует обязательное поле - тип сырья');
                }

                if ($this->attributes[$key] == null) {
                    throw new Exception('Необходимо заполнить тип сырья');
                }
            },

            'tonnages' => function (string $key): void {
                if (! array_key_exists($key, $this->attributes)) {
                    throw new Exception('Отсутвует обязательное поле - тоннаж');
                }

                if ($this->attributes[$key] == null) {
                    throw new Exception('Необходимо заполнить тоннаж');
                }
            },

            'month' => function (string $key): void {
                if (! array_key_exists($key, $this->attributes)) {
                    throw new Exception('Отсутвует обязательное поле - месяц');
                }

                if ($this->attributes[$key] == null) {
                    throw new Exception('Необходимо заполнить месяц');
                }
            },
        ];
    }
    
    /**
     * @return void
     */
    public function validate(): void
    {
        foreach ($this->rules() as $key => $value) {
            try {
                $value($key);
            } catch (Exception $e) {
                $this->errors[$key] = $e->getMessage();
            }
        }
    }

    /**
     * @return string
     */
    public function getRawTypes(): string
    {
        return $this->rawsTypes;
    }

    /**
     * @return string
     */
    public function getTonnages(): string
    {
        return $this->tonnages;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @return string
     */
    public function getRawTypesAttributeName(): string
    {
        return 'rawsTypes';
    }

    /**
     * @return string
     */
    public function getTonnageAttributeName(): string
    {
        return 'tonnages';
    }

    /**
     * @return string
     */
    public function getMonthAttributeName(): string
    {
        return 'month';
    }

    /**
     * @return bool
     */
    public function hasRawTypesError(): bool
    {
        return ! empty($this->errors);
    }

    /**
     * @return bool
     */
    public function hasTonnageError(): bool
    {
        return ! empty($this->errors);
    }

    /**
     * @return bool
     */
    public function hasMonthError(): bool
    {
        return ! empty($this->errors);
    }

    /**
     * Печать ошибки
     * @return string
     */
    public function printRawTypesError(): string
    {
        return $this->errors['rawsTypes'];
    }

    /**
     * @return string
     */
    public function printTonnageError(): string
    {
        return $this->errors['tonnages'];
    }

    /**
     * @return string
     */
    public function printMonthError(): string
    {
        return $this->errors['month'];
    }

    /**
     * @return string
     */
    public function printRawsTypesName(): string
    {
        return $this->rawsTypes[$this->attributes['rawsTypes']];
    }

    /**
     * @return string
     */
    public function printTonnagesName(): string
    {
        return $this->tonnages[$this->attributes['tonnages']];
    }

    /**
     * @return string
     */
    public function printMonthName(): string
    {
        return $this->month[$this->attributes['month']];
    }
    
}