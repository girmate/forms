<template>
    <div>
        <p v-bind:id="id">blabla</p>
<!--        <label v-if="label" v-bind:for="id">{{ label }}</label>-->
<!--        <input v-bind:type="type" v-model="message" v-bind:placeholder="placeholder" v-bind:name="id" v-bind:id="id" autocomplete="off" @blur="validate">-->
<!--        <p v-if="errors.length" style="color:red; font-weight: 600">{{ errors[0] }}</p>-->

    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                message: '',
                type: 'text',
                errors: []
            }
        },
        props: {
            id: {
                type: String,
                required: true
            },
            label: {
                type: String,
                required: false,
                default: ''
            },
            preText: {
                type: String,
                required: false,
                default: ''
            },
            placeholder: {
                type: String,
                required: false,
                default: 'Enter here...'
            },
            onlyNumber: {
                type: Boolean,
                required: false,
                default: false,
            },
            required: {
                type: Boolean,
                default: true
            },
        },
        mounted() {
            EventBus.$on('validate', () => {
                this.validate()
            });
            if (this.onlyNumber) {
                this.type = 'number'
            }
            this.message = this.preText ? this.preText : ''
        },
        methods: {
            validate: function () {
                this.errors = []
                if (this.required && this.message === '') {
                    this.errors.push('Please fill this field');
                }
                if (this.onlyNumber && this.message !== '' && !(isFinite(this.message))) {
                    this.errors.push('Please enter only number');
                }
            },
            test: function () {
                console.log('I AM COMPONENT')
            }
        }
    }
</script>
