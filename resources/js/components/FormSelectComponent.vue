<template>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p><select name="hero[]">
                    <option disabled>Выберите героя</option>
                    <option value="Чебурашка">Чебурашка</option>
                    <option selected value="Крокодил Гена">Крокодил Гена</option>
                    <option value="Шапокляк">Шапокляк</option>
                    <option value="Крыса Лариса">Крыса Лариса</option>
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
