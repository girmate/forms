<template>
    <div>
        <template v-for="(option, index) in options.items">
            <input type="checkbox" :value="index" :name="id" v-model="checked" @change="onChanged($event)" :disabled="disabled[index]" :title="option.title">
            <del v-if="disabled[index]">{{ option.label}}-{{ option.cost }}$</del>
            <span v-if="!disabled[index]">{{ option.label}}-{{ option.cost }}$</span>
        </template>
    </div>
</template>

<script>
    import {EventBus} from "../app";

    export default {
        data: function () {
            return {
                checked: [],
                disabled: [],
                cost: 0
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
        methods: {
            init: function () {
                for (let i = 0; i < this.options.items.length; i++) {
                    if (this.options.items[i].checked === true) {
                        this.checked = [i]
                        this.disabled[i] = false
                        this.cost = this.options.items[i].cost
                    } else {
                        this.disabled[i] = true
                    }
                }
            },
            onChanged: function (event) {
                this.checked = event.target.checked ? [event.target.value] : []
                this.cost = event.target.checked ? this.options.items[event.target.value].cost : 0
                if (event.target.checked) {
                    for (let i = 0; i < this.options.items.length; i++) {
                        this.disabled[i] = Number(event.target.value) === i ? false : true
                    }
                } else {
                    this.disabled.fill(false, 0, this.options.items.length)
                }
                this.sendStatus()
            },
            sendStatus: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost, valid: true});
            }
        }
    }
</script>
