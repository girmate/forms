<template>
    <div>
        <template v-for="(option, index) in options.items">
            <input type="checkbox" :value="index" v-model="checked" :disabled="!option.checked ? false : true">{{ option.label}}-{{ option.cost }}$
        </template>
        <span>Отмеченные имена: {{ checked }}</span>
    </div>
</template>

<script>
    import {EventBus} from "../app";

    export default {
        data: function () {
            return {
                checked: []
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
            // this.init()
            EventBus.$on('tell-your-cost', () => {
                // this.sendStatus()
            })
        },
        // computed: {
        //     cost: function () {
        //         return this.options.items[this.checked].cost
        //     }
        // },
        // methods: {
        //     init: function () {
        //         this.checked = this.options.checked ? this.options.checked : this.checked
        //     },
        //     onChanged: function () {
        //         this.sendStatus()
        //     },
        //     sendStatus: function () {
        //         EventBus.$emit('form-component-changed', {id: this.id, value: this.checked, cost: this.cost, valid: true});
        //     }
        //
        // }
    }
</script>
