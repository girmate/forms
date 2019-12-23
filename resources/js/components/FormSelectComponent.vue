<template>
    <div>
        <label v-if="label" v-bind:for="id">{{ label }}</label>
        <select v-model="selectedItem" v-on:change="onChanged" v-bind:name="id" v-bind:id="id">
            <option v-for="(option, index) in options" v-bind:value="index" :key="index">
                {{ option.text }} - {{ option.cost }}$
            </option>
        </select>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                selectedItem: 0,
            }
        },
        props: ['id', 'options', 'label'],
        mounted() {
            EventBus.$on('tell-your-cost', () => {
                this.onChanged()
            });
        },
        computed: {
            cost: function () {
                return this.options[this.selectedItem].cost
            }
        },
        methods: {
            onChanged: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost});
            }
        }
    }
</script>
