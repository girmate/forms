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
            }
        },
        props: ['baseAmount'],
        mounted() {
            console.log('Form Component mounted.');
            this.totalCost = this.baseAmount

            EventBus.$on('form-component-changed', clickCount => {
                console.log(`Component has ${clickCount} amount! :)`)
                this.checksum(clickCount)
            });
        },
        methods: {
            checksum: function (number) {
                console.log('child was changed ' + number)
            }
        }
    }
</script>
