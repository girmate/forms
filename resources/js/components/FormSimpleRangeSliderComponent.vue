<template>
    <input type="text" class="js-range-slider" name="slider">
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        mounted: function () {
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
                    EventBus.$emit('3D-pixel', data)
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

