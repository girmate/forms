<template>
    <div class="container">
        <form action="/" method="get">
            <h3>Форма оплаты за услуги</h3>
            <slot></slot>
            <br>
            <input type="submit" value="К оплате:"/> {{ totalCost }}
        </form>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                totalCost: 0,
                components: [],
            }
        },
        props: ['baseAmount'],
        mounted() {
            console.log('Form Component mounted.');
            this.totalCost = this.baseAmount

            EventBus.$on('form-component-changed', component => {
                console.log('Пришла стоимость: ' + component.cost)
                this.components.push(component)
                console.log(this.components)
                //this.checksum(clickCount)
            });

            EventBus.$emit('tell-your-cost');
        },
        methods: {
            checksum: function (number) {
                console.log('child was changed ' + number)
            }
        }
    }
</script>
