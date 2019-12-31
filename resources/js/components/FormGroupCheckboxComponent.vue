<template>
    <div>
        <template v-for="(option, index) in options.items">
            <input type="checkbox" :value="index" :name="id" v-model="checked" @click="onChanged($event)" @change="onChanged($event)" :disabled="disabled[index]">{{ option.label}}-{{ option.cost }}$
        </template>
        <span>Отмеченные имена: {{ checked }}</span>
        <!--        :disabled="!options.items[index].checked "-->
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
        created: function () {
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
        mounted() {
            //this.init()
            EventBus.$on('tell-your-cost', () => {
                this.sendStatus()
            })
        },
        methods: {
            init: function () {
                // for (let i = 0; i < this.options.items.length; i++) {
                //     if (this.options.items[i].checked === true) {
                //         this.checked = [i]
                //         this.disabled[i] = false
                //         this.cost = this.options.items[i].cost
                //         break
                //     } else {
                //         this.disabled[i] = true
                //     }
                // }
            },
            onChanged: function (event) {
                this.checked = event.target.checked ? [event.target.value] : []
                this.cost = event.target.checked ? this.options.items[event.target.value].cost : 0
                if (event.target.checked) {
                    for (let i = 0; i < this.options.items.length; i++) {
                        this.disabled[i] = event.target.value === i ? false : true
                    }
                } else {
                    this.disabled.fill(false, 0, this.options.items.length)
                }

                this.sendStatus()
            },
            // disabled: function (index) {
            //     if (!this.checked.length) {
            //         return false
            //     } else if (this.checked[0] === index) {
            //         return true
            //     }
            //     return false
            // },
            sendStatus: function () {
                EventBus.$emit('form-component-changed', {id: this.id, cost: this.cost, valid: true});
            }

        }
    }
</script>
