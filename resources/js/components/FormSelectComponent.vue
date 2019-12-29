<template>
    <div>
        <label v-if="options.label" v-bind:for="id">{{ options.label }}</label>
        <select v-model="selected" v-on:change="onChanged" v-bind:name="id" v-bind:id="id">
            <option v-for="(option, index) in options.items" v-bind:value="index" :key="index">
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
                selected: 0,
                label: '',
                prompt: false,
                required: false,
                errors: []
            }
        },
        props: {
            id: {
                type: String,
                required: false
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
                this.selected = this.options.selected ? this.options.selected : this.selected
                this.label = this.options.label ? this.options.label : this.label
                this.prompt = this.options.prompt ? this.options.prompt : this.prompt
                this.required = this.options.required ? this.options.required : this.required
            },
            onChanged: function () {
                this.sendStatus()
            },
            isValid: function () {
                return this.ruleInvalidRange() && this.rulePrompt()
            },
            ruleInvalidRange: function () {
                return this.selected >= 0 && this.selected < this.options.items.length
            },
            rulePrompt: function () {
                if (this.required && this.prompt) {
                    return this.selected !== 0
                }
                return true
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
