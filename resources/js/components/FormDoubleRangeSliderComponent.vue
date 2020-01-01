<template>
    <input type="text" name="slider" v-bind:name="id" v-bind:id="id">
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            let vm = this
            return {
                data: {
                    skin: "big",
                    type: "double",
                    grid: true,
                    from: 0,
                    to: 1,
                    onStart: function (data) {
                        vm.onStart(data)
                    },
                    onFinish: function (data) {
                        vm.onChange(data)
                    },
                },
                values: [],
                prices: [],
                cost: 0
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
        mounted: function () {
            this.init()
            $(this.$el).ionRangeSlider(this.data)
            EventBus.$on('tell-your-cost', () => {
                this.sendStatus()
            })
        },
        methods: {
            init: function () {
                for (let i = 0; i < this.options.items.length; i++) {
                    this.values[i] = this.options.items[i].point
                    this.prices[i] = this.options.items[i].cost
                }
                this.data.values = this.values
            },
            onStart: function (data) {
                this.cost = this.prices[data.to] - this.prices[data.from]
            },
            onChange: function (data) {
                this.cost = this.prices[data.to] - this.prices[data.from]
                this.sendStatus()
            },
            sendStatus: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost, valid: true});
            }
        }
    }
</script>

