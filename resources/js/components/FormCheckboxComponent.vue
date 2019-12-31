<template>
    <div>
        <input type="checkbox" v-bind:name="id" v-bind:id="id" v-model="checked" @change="onChanged" :title="title">
        <label v-bind:for="options.id">Чекбокс {{ cost }}$</label>
    </div>
</template>

<script>
    import {EventBus} from "../app";

    export default {
        data: function () {
            return {
                checked: false,
                title: ''
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
        },
        computed: {
            cost: function () {
                return this.checked ? this.options.cost : 0
            }
        },
        methods: {
            init: function () {
                this.checked = this.options.checked ? this.options.checked : this.checked
                this.title = this.options.title ? this.options.title : this.title
            },
            onChanged: function () {
                this.sendStatus()
            },
            sendStatus: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost, valid: true});
            }

        }
    }
</script>
