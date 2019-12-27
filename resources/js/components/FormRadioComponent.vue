<template>
    <div>
        <template v-for="(option, index) in options">
            <input type="radio" v-bind:value="index" :key="index" v-model="picked" v-on:change="onChanged" v-bind:name="id"/>{{ option.text }} - {{ option.cost }}$<br>
            <p v-if="errors.length" style="color:red; font-weight: 600">{{ errors[0] }}</p>
        </template>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                picked: 0,
                errors: []
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
            })
            // EventBus.$on('validate', () => {
            //     this.validate()
            // });
            EventBus.$on('registration-of-invalid-data', () => {
                if (!this.checkValid()) {
                    EventBus.$emit('validation', {id: this.id, validate: false});
                }
            })
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
            },

            validate: function () {
                this.errors = [];
                this.errors.push('Please enter only number');
            },
            checkValid: function () {
                //return (this.picked >= 0) && (this.picked <= this.options)
                return true
            },
            isValid: function () {

            },
        }
    }
</script>
