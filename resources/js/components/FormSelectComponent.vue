<template>
    <div class="row justify-content-center">
        <div>
            <p><select v-model="selectedItem" name="item127" v-on:change="selected(selectedItem)">
                <option v-for="(option, index) in options" v-bind:value="index" :key="index">
                    {{ option.text }} - {{ option.amount }}$
                </option>
            </select></p>
            <span>Стоимость: {{ count }}$</span>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                count: 0,
                selectedItem: 0,
                options: [
                    {text: 'Дракон Гриша', value: 'one', amount: 100.56},
                    {text: 'Дракон Гоша', value: 'two', amount: 500.24},
                    {text: 'Дракон Мастер', value: 'three', amount: 1000.77}
                ],
            }
        },
        methods: {
            selected: function (value) {
                this.count = this.options[this.selectedItem].amount
            }
        },
        mounted() {
            console.log('Form Select Component mounted.')
            this.count = this.options[this.selectedItem].amount
        }
    }
</script>
