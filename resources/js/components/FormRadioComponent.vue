<template>
    <div>
        <template v-for="(option, index) in options">
            <input type="radio" v-bind:value="index" :key="index" v-model="picked" v-on:change="onChanged" v-bind:name="id"/>{{ option.text }} - {{ option.cost }}$<br>
        </template>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                picked: 0,
            }
        },
        props: {
            id: {
                type: String,
                required: true
            },
            options: Array,
            preselection: {
                type: Number,
                required: false,
                default: 0
            }
        },
        mounted() {
            EventBus.$on('tell-your-cost', () => {
                this.onChanged()
            });
            this.picked = this.preselection ? this.preselection : 0
        },
        computed: {
            cost: function () {
                return this.options[this.picked].cost
            }
        },
        methods: {
            onChanged: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost});
            }
        }
    }
</script>
