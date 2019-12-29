<template>
    <div>
        <template v-for="(option, index) in options.items">
            <input type="radio" v-bind:value="index" :key="index" v-model="selected" v-on:change="onChanged" v-bind:name="id"/>{{ option.text }} - {{ option.cost }}$<br>
        </template>
        <span v-if="errors.length" style="color:red; font-weight: 600">{{ errors[0] }}</span>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                selected: 0,
                errors: []
            }
        },
        props: {
            id: {
                type: String,
                required: true
            },
            options: {
                type: Object,
                required: true,
            },
        },
        mounted() {
            this.init()
            EventBus.$on('tell-your-cost', () => {
                this.sendStatus()
            })
            EventBus.$on('show-errors', () => {
                this.showErrors()
            })
        },
        computed: {
            cost: function () {
                return this.options.items[this.selected].cost
            }
        },
        methods: {
            init: function () {
                this.selected = this.options.preselection ? this.options.preselection : this.selected
            },
            onChanged: function () {
                this.sendStatus()
            },
            isValid: function () {
                return this.ruleInvalidRange()
            },
            ruleInvalidRange: function () {
                return this.selected >= 0 && this.selected < this.options.items.length
            },
            showErrors: function () {
                this.errors = []
                if (!this.ruleInvalidRange()) {
                    this.errors.push('Check your select');
                }
            },
            sendStatus: function () {
                EventBus.$emit('form-component-changed', {id: this.id, value: this.selected, cost: this.cost, valid: this.isValid()});
            }

        }
    }
</script>
