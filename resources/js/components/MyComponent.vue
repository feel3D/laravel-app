<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!--                <span @click="title = 'New title!'">Press</span>-->
                <span @mouseover="changeTitle">Press</span><br>
                <p>{{ title }}</p><br>

                <!--                <input type="text" @input="text = $event.target.value">-->
                <input type="text" @input="changeText($event.target.value)"><br>
                <p>{{ text }}</p><br>
                <p>{{ computedMethod }}</p><br>
                <ul>
                    <li v-for="(car, index) in cars">{{ index }} - {{ car.model }}/{{ car.speed }}</li>
                </ul>
                <br>
                <button @click="show = !show">Показать / Убрать</button>
                <p v-if="show">I can be removed</p><br>
                <p>{{ message | lovercase }}</p><br>

<!--                <input type="text" v-model="vmodel">-->
<!--                <p>{{ vmodel }}</p><br>-->


                <added-hello :msg-from-my-component="message" @messChange="message=$event"></added-hello>
                <br>

            </div>
        </div>
    </div>
</template>

<script>
import Input from './AddComponent.vue'
export default {
    data() {
        return {
            title: 'Hi, Brooo!',
            text: 'This is the text',
            cars: [
                {model: 'Lada', speed: 200},
                {model: 'MBenz', speed: 300},
                {model: 'Infiniti', speed: 400},
            ],
            show: true,
            message: 'Hello, world!',
            // vmodel: '',
            fromAddComponent: '',
        }
    },
    methods: {
        changeTitle() {
            this.title = 'New title from method'
        },
        changeText(value) {
            this.text = value
            if (value === 'stop') {
                this.text = 'Ok, stop'
            }
        }
    },
    computed: {
        computedMethod() {
            return this.text.length;
        }
    },
    filters: {
        lovercase (value) {
            return value.toLowerCase();
        }
    },
    components: {
        'added-hello': Input
    }
}
</script>
