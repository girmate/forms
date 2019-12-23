<template>
    <div>
        <p><select v-model="selectedItem" v-on:change="changed" v-bind:name="id">
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
                //     {text: 'Дракон Гриша', cost: 100.56},
                //     {text: 'Дракон Гоша', cost: 500.24},
                //     {text: 'Дракон Мастер', cost: 1000.77}
                // ],
            }
        },
        props: ['id', 'options'],
        mounted() {
            console.log('Form Select Component mounted.' + this.id)

            EventBus.$on('tell-your-cost', () => {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost});
                //console.log(`!Моя стоимость: ` + this.cost)
            });
        },
        computed: {
            cost: function () {
                return this.options[this.selectedItem].cost
            }
        },
        methods: {
            changed: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost});
            }
        }
    }
</script>
