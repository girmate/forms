<template>
    <div class="container">
        <form action="/" method="get">
            <h3>Форма оплаты за услуги</h3>
            <p>Базовая цена: {{ basePrice }}$</p>
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
            }
        },
        props: {
            basePrice: Number
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
            }
        }
    }
</script>
