<template>
    <input type="text" class="js-range-slider">
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        mounted: function () {
            let vm = this
            $(this.$el).ionRangeSlider({
                skin: "big",
                type: "double",
                grid: true,
                min: 0,
                max: 1000,
                from: 200,
                to: 800,
                prefix: "$",
                onFinish: function (data) {
                    EventBus.$emit('hi-pixel', {test : 888})
                },
            })
        },
        methods: {
            onDateChange: function (start, end) {
                this.start = start;
                this.end = end;
            }
        }
    }
</script>

