<?php

class DeliveryCalculator
{

    public $rawsTypes = [
        0 => 'Выберите тип сырья',
        1 => 'Шрот',
        2 => 'Жмых',
        3 => 'Соя',
    
    ];

    public $tonnages = [
        0 => 'Выберите тоннаж',
        1 => '25',
        2 => '50',
        3 => '75',
        4 => '100',
        
    ];
    
    public $month = [
        0 => 'Выберите месяц',
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Август',
        4 => 'Сентябрь',
        5 => 'Октябрь',
        6 => 'Ноябрь',
        
    ];

    public $prices = [
        1 => [
            1 => [
                1 => 125,
                2 => 121,
                3 => 137,
                4 => 126,
                5 => 124,
                6 => 128,
            ],
            2 => [
                1 => 145,
                2 => 118,
                3 => 119,
                4 => 121,
                5 => 122,
                6 => 147,
            ],
            3 => [
                1 => 136,
                2 => 137,
                3 => 141,
                4 => 137,
                5 => 131,
                6 => 143,
            ],
            4 => [
                1 => 138,
                2 => 142,
                3 => 117,
                4 => 124,
                5 => 147,
                6 => 112,
            ],
        ],
        2 => [
            1 => [
                1 => 121,
                2 => 137,
                3 => 124,
                4 => 137,
                5 => 122,
                6 => 125,
            ],
            2 => [
                1 => 118,
                2 => 121,
                3 => 145,
                4 => 147,
                5 => 143,
                6 => 145,
            ],
            3 => [
                1 => 137,
                2 => 124,
                3 => 136,
                4 => 143,
                5 => 112,
                6 => 136,
            ],
            4 => [
                1 => 142,
                2 => 131,
                3 => 138,
                4 => 112,
                5 => 117,
                6 => 138,
            ],
        ],
        3 => [
            1 => [
                1 => 137,
                2 => 125,
                3 => 124,
                4 => 122,
                5 => 137,
                6 => 121,
            ],
            2 => [
                1 => 147,
                2 => 145,
                3 => 145,
                4 => 143,
                5 => 119,
                6 => 118,
            ],
            3 => [
                1 => 112,
                2 => 136,
                3 => 136,
                4 => 112,
                5 => 141,
                6 => 137,
            ],
            4 => [
                1 => 122,
                2 => 138,
                3 => 138,
                4 => 117,
                5 => 117,
                6 => 142,
            ],
        ],
            
    ];
    
    public $keysRawsTypes;

    public $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    public function result()
    {
        if (! empty($this->form->attributes["rawsTypes"]) && ! empty($this->form->attributes["tonnages"]) && ! empty($this->form->attributes["month"])){
            $this->keysRawsTypes = $keysRawsTypes = array_search($this->form->attributes['rawsTypes'], $this->rawsTypes);
            $keysTonnages = array_search($this->form->attributes['tonnages'], $this->tonnages);
            $keysMonth = array_search($this->form->attributes['month'], $this->month);
        }
        
        return $this->prices[$keysRawsTypes][$keysTonnages][$keysMonth];
    }

}