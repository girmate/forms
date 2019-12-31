<template>
    <div>
        <template v-for="(option, index) in options.items">
            <input type="checkbox" :value="index" :name="id" v-model="checked" @change="onChanged($event)" :disabled="disabled(index)">{{ option.label}}-{{ option.cost }}$
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
            this.init()
            EventBus.$on('tell-your-cost', () => {
                // this.sendStatus()
            })
        },
        computed: {
            cost: function () {
                return this.checked.length ? this.options.items[this.checked[0]].cost : 0
            }

        },
        methods: {
            init: function () {
                this.checked = []
            },
            onChanged: function (event) {
                console.log(event.target.value)
                this.checked = [event.target.value]

                this.sendStatus()
            },
            disabled: function (index) {
                if(!this.checked.length){
                    return false
                } else if (this.checked[0] === index) {
                    return false
                }
                return false
            },
            sendStatus: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost, valid: true});
                console.log(this.cost)
            }

        }
    }
</script>
