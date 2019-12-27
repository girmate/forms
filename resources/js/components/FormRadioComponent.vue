<template>
    <div>
        <template v-for="(option, index) in options.items">
            <input type="radio" v-bind:value="index" :key="index" v-model="selected" v-on:change="onChanged" v-bind:name="id"/>{{ option.text }} - {{ option.cost }}$<br>
            <p v-if="errors.length" style="color:red; font-weight: 600">{{ errors[0] }}</p>
        </template>
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
            EventBus.$on('tell-your-cost', () => {
                this.onChanged()
            })
            // // EventBus.$on('validate', () => {
            // //     this.validate()
            // // });
            // EventBus.$on('registration-of-invalid', () => {
            //     if (!this.checkValid()) {
            //         EventBus.$emit('validation', {id: this.id, validate: false});
            //     }
            // })
            this.selected = this.options.preselection ? this.options.preselection : 0
        },
        computed: {
            cost: function () {
                return this.options.items[this.selected].cost
            }
        },
        methods: {
            onChanged: function () {
                EventBus.$emit('form-component-changed', {id: this.id, value: this.selected, cost: this.cost, valid: this.isValid()});
            },
            isValid: function () {
                return true
            }


            // validate: function () {
            //     this.errors = [];
            //     this.errors.push('Please enter only number');
            // },
            // checkValid: function () {
            //     //return (this.selected >= 0) && (this.selected <= this.options)
            //     return true
            // },
            // isValid: function () {
            //
            // },
        }
    }
</script>
