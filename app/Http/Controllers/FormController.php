<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $form =
            '<form-component base-amount="21.77">
            <form-select-component v-bind:options="[
                    {text: \'Выберите один из вариантов\', cost: 0},
                    {text: \'Шаровая опора\', cost: 100.56},
                    {text: \'Система подвески\', cost: 500.24},
                    {text: \'Томозная система\', cost: 112.99},
                    {text: \'Кузовные работы\', cost: 1000.77}
                ]"></form-select-component>
            <form-select-component v-bind:options="[
                    {text: \'Очистка поверхности\', cost: 11.56},
                    {text: \'Покраска\', cost: 21.36},
                    {text: \'Шлифовальные работы\', cost: 45.77}
                ]"></form-select-component>
        </form-component>';

        return view('welcome', ['form' => $form]);
    }
}