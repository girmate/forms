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
    export default {
        data: function () {
            return {
                amount: 0
            }
        },
        props: ['baseAmount'],
        mounted() {
            console.log('Form Component mounted.');
            this.amount = this.baseAmount
            console.log('erwr')
        }
    }
</script>
