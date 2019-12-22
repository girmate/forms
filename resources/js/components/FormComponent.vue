<template>
    <div class="container">
        <form action="/" method="get">
            <h3>Форма оплаты за услуги</h3>
            <slot></slot>
            <br>
            <input type="submit" value="К оплате:"/> {{ amount }}
        </form>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        data: function () {
            return {
                amount: 0,
            }
        },
        props: ['baseAmount'],
        mounted() {
            console.log('Form Component mounted.');
            this.amount = this.baseAmount

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
