<template>
    <div class="container">
        <form action="/" method="get" @submit.prevent="checkForm">
            <h3>Форма оплаты за услуги</h3>
            <p>Базовая цена: {{ basePrice }}$</p>
            <template v-for="(item, index) in data">
                <component v-bind:is="item.name" :id="item.id"></component>
            </template>

<!--            <form-simple-input-component ref="children" id="helementus" label="Enter your age" pre-text=""></form-simple-input-component>-->
            <slot></slot>
            <br>
            <input type="submit" value="К оплате:"/> {{ totalCost }}$
        </form>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                totalCost: 0,
                components: new Map(),
                //errors: []
            }
        },
        props: {
            basePrice: Number,
            data: {
                required: false
            },
        },
        mounted() {
            EventBus.$on('form-component-changed', component => {
                this.components.set(component.id, component.cost)
                this.checksum()
            });
            EventBus.$emit('tell-your-cost');
        },
        methods: {
            checksum: function () {
                let summary = Number(this.basePrice)
                for (let amount of this.components.values()) {
                    summary = summary + amount;
                }
                this.totalCost = summary.toFixed(2)
            },
            checkForm: function () {
                //console.log(this.$slots.test())
                //console.log(this.$slots.el505.test())
                //this.$ref.element.test()
                EventBus.$emit('validate');
            }
        }
    }
</script>
