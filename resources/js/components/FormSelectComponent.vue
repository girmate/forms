<template>
    <div class="row justify-content-center">
        <div>
            <p><select name="hero[]">
                <option disabled>Выберите героя</option>
                <option value="100">Чебурашка</option>
                <option selected value="200">Крокодил Гена</option>
                <option value="500">Шапокляк</option>
                <option value="1000">Крыса Лариса</option>
            </select></p>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                count: 0
            }
        },
        mounted() {
            console.log('Form Select Component mounted!.')
        }
    }
</script>
