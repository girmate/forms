<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $form =
            '<form-component v-bind:base-price=100.33>

            <form-radio-component id="el9" v-bind:options="[
                    {text: \'Сервер Европа\', cost: 11.56},
                    {text: \'Сервер Америка\', cost: 27.22},
                    {text: \'Сервер Континент\', cost: 0},
                    {text: \'Сервер Космос\', cost: -1000.01}
                ]"></form-radio-component>
                <br>
            <form-select-component id="el27" v-bind:options="[
                    {text: \'Выберите один из вариантов\', cost: 0},
                    {text: \'Шаровая опора\', cost: 100.56},
                    {text: \'Система подвески\', cost: 500.24},
                    {text: \'Тормозная система\', cost: 112.99},
                    {text: \'Кузовные работы\', cost: 1000.77}
                ]" v-bind:preselection=0></form-select-component>
                <br>
            <form-select-component id="el114" v-bind:options="[
                    {text: \'Очистка поверхности\', cost: 11.56},
                    {text: \'Покраска\', cost: 21.36},
                    {text: \'Шлифовальные работы\', cost: 45.77}
                ]" label="Метка 2" v-bind:preselection=2></form-select-component>
        </form-component>';

        return view('welcome', ['form' => $form]);
    }
}
