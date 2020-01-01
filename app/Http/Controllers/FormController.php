<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $form = '<form-component v-bind:base-price=100.23 v-bind:data="[
            {
                type: `component`,
                name: `form-radio-component`,
                id: `radio101`,
                options:
                {
                    selected: 0,
                    items:
                    [
                        {text: `Не производить работы`, cost: 0},
                        {text: `Шлифовальные работы`, cost: 39.37},
                        {text: `Покраска`, cost: 211.77},
                        {text: `Сушка атмосферная`, cost: 11.22},
                        {text: `Без сушки`, cost: -0.23}
                    ],
                }
            },
            {
                type: `component`,
                name: `form-double-range-slider-component`,
                id: `range999`,
                options:
                {
                    selected: 0,
                    items:
                        [
                            {point: `0`, cost: 0},
                            {point: `1500`, cost: 25.0},
                            {point: `1600`, cost: 50.0},
                            {point: `1700`, cost: 150.0},
                            {point: `1800`, cost: 170.0},
                            {point: `1900`, cost: 180.0},
                            {point: `2000`, cost: 200.0},
                            {point: `2100`, cost: 250.0},
                            {point: `2200`, cost: 300.0},
                            {point: `2300`, cost: 500.0},
                            {point: `2400`, cost: 700.0},
                            {point: `Hero`, cost: 1000.0},
                        ],
                }
            },
            {
                type: `component`,
                name: `form-select-component`,
                id: `select333`,
                options:
                {
                    label: `Your mission 2020`,
                    prompt: true,
                    selected: 3,
                    required: true,
                    items:
                        [
                            {text: `Выберите...`, cost: 0.00},
                            {text: `Планета Венера`, cost: 0.02},
                            {text: `Планета Меркурий`, cost: 0.02},
                            {text: `Марс планета?`, cost: 0.01},
                            {text: `Планета Минус`, cost: -0.23}
                        ],
                }
            },
            {
                type: `component`,
                name: `form-select-component`,
                id: `select444`,
                options:
                {
                    label: `Your home`,
                    prompt: false,
                    selected: 0,
                    required: true,
                    items:
                        [
                            {text: `Битумные сплавы`, cost: 0.07},
                            {text: `Жидкие гвозди`, cost: 111.02},
                            {text: `Суперклей`, cost: 0.88},
                        ],
                }
            },
            {
                type: `component`,
                name: `form-input-component`,
                id: `inputt221`,
                options:
                {
                    label: `Your level`,
                    type: `number`,
                    message: `1`,
                    required: true
                }
            },

            {
                type: `component`,
                name: `form-radio-component`,
                id: `radio102`,
                options:
                {
                    selected: 0,
                    items:
                    [
                        {text: `Мир`, cost: 0},
                        {text: `Труд`, cost: 33.33},
                        {text: `Май`, cost: 77.77},
                    ],
                }
            },
            {
                type: `component`,
                name: `form-input-component`,
                id: `input222`,
                options:
                {
                    label: `Your level`,
                    type: `text`,
                    message: `1`,
                    required: true
                }
            },
            {
                type: `component`,
                name: `form-checkbox-component`,
                id: `group-checkbox777`,
                options:
                {
                    items:
                        [
                            {label: `Чекбокс 1`, cost: -1.01, checked: false, title: `Some players`},
                            {label: `Чекбокс 11`, cost: 10.01, checked: false, title: `Self Play`},
                        ]
                }
            },
        ]"></form-component>';


        return view('form', ['form' => $form]);
    }
}
