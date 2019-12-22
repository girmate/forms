<template>
    <div class="row justify-content-center">
        <div>
            <p><select v-model="selectedItem" name="item127" v-on:change="selected(selectedItem)">
                <option v-for="(option, index) in options" v-bind:value="index" :key="index">
                    {{ option.text }} - {{ option.amount }}$
                </option>
            </select></p>
            <span>Стоимость: {{ count }}$</span>
        </div>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                count: 0,
                selectedItem: 0,
                options: [
                    {text: 'Дракон Гриша', amount: 100.56},
                    {text: 'Дракон Гоша', amount: 500.24},
                    {text: 'Дракон Мастер', amount: 1000.77}
                ],
            }
        },
        mounted() {
            console.log('Form Select Component mounted.')
            this.count = this.options[this.selectedItem].amount
        },
        methods: {
            selected: function (value) {
                this.count = this.options[this.selectedItem].amount
                EventBus.$emit('componentchanged', this.count);
            }
        }
    }
</script>
