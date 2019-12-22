<template>
    <div>
        <p><select v-model="selectedItem" name="item127" v-on:change="changed">
            <option v-for="(option, index) in options" v-bind:value="index" :key="index">
                {{ option.text }} - {{ option.cost }}$
            </option>
        </select></p>
        <span>Стоимость: {{ cost }}$</span>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                selectedItem: 0,
                // options: [
                //     {text: 'Дракон Гриша', amount: 100.56},
                //     {text: 'Дракон Гоша', amount: 500.24},
                //     {text: 'Дракон Мастер', amount: 1000.77}
                // ],
            }
        },
        props: ['options'],
        mounted() {
            console.log('Form Select Component mounted.')
        },
        computed: {
            cost: function () {
                return this.options[this.selectedItem].cost
            }
        },
        methods: {
            changed: function () {
                EventBus.$emit('form-component-changed', this.cost);
            }
        }
    }
</script>
