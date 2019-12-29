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
                id: `element101`,
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
                name: `form-select-component`,
                id: `element333`,
                options:
                {
                    label: `Your mission 2020`,
                    prompt: true,
                    selected: 0,
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
                id: `element444`,
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
                id: `element221`,
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
                id: `element102`,
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
                id: `element222`,
                options:
                {
                    label: `Your level`,
                    type: `text`,
                    message: `1`,
                    required: true
                }
            },
        ]"></form-component>';


//        $form = '<form-component v-bind:base-price=100.33 v-bind:data="[
//            {
//                type: `component`,
//                name: `form-radio-component`,
//                id: `element101`,
//                options: {
//                    items:[
//                        {text: `Кузовные работы`, cost: 51.51},
//                        {text: `Шлифовальные работы`, cost: 39.37},
//                        {text: `Покраска`, cost: 211.77},
//                        {text: `Сушка атмосферная`, cost: 11.22}
//                          ],
//
//            },
//        ]"></form-component>';


//        $form =
//            '<form-component v-bind:base-price=100.33 v-bind:data="[
//                    {name: `form-simple-input-component`, options: `form-simple-input-component`, id:`el656`, ref:`el111`},
//                    {name: `form-simple-input-component`, options: `form-simple-input-component`, id:`el751`, ref:`el222`},
//                    {name: `form-simple-input-component`, options: `form-simple-input-component`, id:`el254`, ref:`el333`}
//                ]">
//
//            <form-radio-component id="el9" v-bind:options="[
//                    {text: \'Сервер Европа\', cost: 11.56},
//                    {text: \'Сервер Америка\', cost: 27.22},
//                    {text: \'Сервер Континент\', cost: 0},
//                    {text: \'Сервер Космос\', cost: -1000.01}
//                ]"></form-radio-component>
//                <br>
//            <form-select-component id="el27" v-bind:options="[
//                    {text: \'Выберите один из вариантов\', cost: 0},
//                    {text: \'Шаровая опора\', cost: 100.56},
//                    {text: \'Система подвески\', cost: 500.24},
//                    {text: \'Тормозная система\', cost: 112.99},
//                    {text: \'Кузовные работы\', cost: 1000.77}
//                ]" v-bind:pre-selection=0></form-select-component>
//                <br>
//            <form-select-component id="el114" v-bind:options="[
//                    {text: \'Очистка поверхности\', cost: 11.56},
//                    {text: \'Покраска\', cost: 21.36},
//                    {text: \'Шлифовальные работы\', cost: 45.77}
//                ]" label="Метка 2" v-bind:pre-selection=2></form-select-component>
//                <br>
//            <form-simple-input-component ref="element" id="el501" label="Enter your level" pre-text="" v-bind:only-number="true" required></form-simple-input-component>
//                <br>
//            <form-simple-input-component id="el505" label="Enter your age" pre-text=""></form-simple-input-component>
//                <br>
//        </form-component>';

        return view('welcome', ['form' => $form]);
    }
}
