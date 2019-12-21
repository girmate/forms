<template>
    <div class="container">
        <h3>Форма оплаты за услуги</h3>
        <slot></slot>
        <button>К оплате: {{ amount }}</button>
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
            console.log('Form Component mounted.')
            this.amount = this.baseAmount
        }
    }
</script>
