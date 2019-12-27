<template>
    <div class="container">
        <form action="/" method="get" @submit.prevent="checkForm">
            <h3>Форма оплаты за услуги</h3>
            <p>Базовая цена: {{ basePrice }}$</p>
            <template v-for="(item, index) in data">
                <component :is="item.name" :id="item.id" :options="item.options"></component><br>
            </template>
            <br>
            <input type="submit" value="К оплате:"/> {{ totalCost }}$
            <p v-if="componentsValidateFalse.size" style="color:red; font-weight: 600">Форма невалидна!</p>
        </form>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                totalCost: 0,
                componentsCost: new Map(),
                componentsValidateFalse: new Set()
            }
        },
        props: {
            basePrice: Number,
            data: {
                type: Array,
                required: true
            },
        },
        mounted() {
            EventBus.$on('form-component-changed', component => {
                this.componentsCost.set(component.id, component.cost)
                this.checksum()
                if (!component.valid) {
                    this.componentsValidateFalse.add(component.id)
                } else {
                    this.componentsValidateFalse.delete(component.id)
                }
            });
            // EventBus.$on('validation', component => {
            //     if (component.validate) {
            //         this.componentsValidateFalse.add(component.id)
            //     } else {
            //         this.componentsValidateFalse.delete(component.id)
            //     }
            // });
            // EventBus.$emit('registration-of-invalid');
            EventBus.$emit('tell-your-cost');
            this.checksum()
        },
        methods: {
            checksum: function () {
                let summary = Number(this.basePrice)
                for (let amount of this.componentsCost.values()) {
                    summary = summary + amount;
                }
                this.totalCost = summary.toFixed(2)
            },
            checkForm: function () {
                // console.log(this.$refs.children.test())
                this.$refs['el751'][0].test()
                console.log(this.$refs['el751'][0].id)
                EventBus.$emit('validate');
            }
        }
    }
</script>
