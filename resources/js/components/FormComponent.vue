<template>
    <div class="container">
        <form action="/form" method="get" @submit="onSubmit($event)">
            <h3>Форма оплаты за услуги <span v-if="hasErrors" style="color:red; font-weight: 200">(невалидна!)</span></h3>
            <p>Базовая цена: {{ basePrice }}$</p>
            <template v-for="(item, index) in data">
                <component :is="item.name" :id="item.id" :options="item.options"></component>
                <br>
            </template>
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
                componentsCost: new Map(),
                componentsValidateFalse: new Set(),
                hasErrors: false
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
                    component.valid ? this.componentsValidateFalse.delete(component.id) : this.componentsValidateFalse.add(component.id)
                    this.hasErrors = this.componentsValidateFalse.size > 0
                }
            )

            // test
            EventBus.$on('hi-pixel', component => {
                    console.log(component.to)
                }
            )
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
            onSubmit: function (event) {
                if (this.hasErrors) {
                    EventBus.$emit('show-errors');
                    event.preventDefault()
                    return
                }
                event.target.submit()
            }
        }
    }
</script>
