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
        created() {
            EventBus.$on('componentchanged', clickCount => {
                console.log(`Oh, that's nice. It's gotten ${clickCount} clicks! :)`)
            });
        },
        mounted() {
            console.log('Form Component mounted.');
            this.amount = this.baseAmount

        },
        methods: {
            checksum: function (number) {
                console.log('child was changed' + number)
            }
        }
    }
</script>
