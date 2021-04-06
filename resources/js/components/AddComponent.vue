<template>
    <div>
<!--        <h1>{{ msgFromMyComponent }}</h1>-->
<!--        <p>Hello, nigga!</p><br>-->

        <p>{{ msgFromMyComponent }}</p><br>
        <input type="text" @input="changeMess">
        <p>{{ mmm }}</p>

    </div>
</template>

<script>
export default {
    name: "AddComponent",
    props: [
        'msgFromMyComponent'
    ],
    data() {
        return {
            'msgFromAddComponent': '',
            'mmm': ''
        }
    },
    methods: {
        changeMess(event) {
            this.mmm = event.target.value;
            this.$emit('messChange', this.mmm)
        }
    }
}
</script>

<style scoped>

</style>
