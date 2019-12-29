<template>
    <div>
        <label v-if="label" v-bind:for="id">{{ label }}</label>
        <input v-bind:type="type" v-model="message" v-bind:placeholder="placeholder" v-bind:name="id" v-bind:id="id" autocomplete="off" @blur="showErrors">
        <p v-if="errors.length" style="color:red; font-weight: 600">{{ errors[0] }}</p>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                type: 'text',
                label: '',
                message: '',
                placeholder: 'enter here...',
                required: false,
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
                this.onChanged()
            })
        },
        methods: {
            init: function () {
                this.type = this.options.type ? this.options.type : this.type
                this.label = this.options.label ? this.options.label : this.label
                this.placeholder = this.options.placeholder ? this.options.placeholder : this.placeholder
                this.message = this.options.message ? this.options.message : this.message
                this.required = this.options.required ? this.options.required : this.required
            },
            onChanged: function () {
                EventBus.$emit('form-component-changed', {id: this.id, value: this.selected, cost: 0, valid: this.isValid()});
            },
            isValid: function () {
                console.log(this.ruleIsNumber())
                return this.ruleRequired() && this.ruleIsNumber()
            },
            ruleRequired: function () {
                if (this.required) {
                    return this.message !== ''
                }
                return true
            },
            ruleIsNumber: function () {
                if (this.message !== '' && this.type === 'number') {
                    return isFinite(this.message)
                }
                return true
            },
            showErrors: function () {
                this.errors = []
                if (!this.ruleRequired()) {
                    this.errors.push('Please fill this field');
                }
                if (!this.ruleIsNumber()) {
                    this.errors.push('Please enter only number');
                }
            },
        }
    }
</script>
