<script setup>
    import { ref, computed } from 'vue'
    import { Head, Link } from "@inertiajs/inertia-vue3";
    
    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    });

    const questions = ref([
        {
            question: 'What is Vue JS?',
            answer: 0,
            options: [
                'A front end framework',
                'A library',
                'An ice cream maker'
            ],
            selected: null
        },
        {
            question: 'What is Vuex?',
            answer: 2,
            options: [
                'Vue with an x',
                'A cheese seletion',
                'State management library'
            ],
            selected: null
        },
        {
            question: 'What is Vue Router used for?',
            answer: 1,
            options: [
                'Walking in space',
                'A routing library for Vue JS',
                'Burger sauce',
                'Quizzes'
            ],
            selected: null
        }
    ])

    const quizCompleted = ref(false)
    const currentQuestion = ref(0)
    const score = computed(() => {
        let value = 0
        questions.value.map(q => {
            if (q.selected == q.answer) {
                value++
            }
        })
        return value
    })

    const getCurrentQuestion = computed(() => {
        let question = questions.value[currentQuestion.value]
        question.index = currentQuestion.value
        return question
    })

    const setAnswer = evt => {
        questions.value[currentQuestion.value].selected = evt.target.value
        evt.target.value = null
    }

    const nextQuestion = () => {
        if (currentQuestion.value < questions.value.length - 1) {
            currentQuestion.value++
        } else {
            quizCompleted.value = true
        }
    }
</script>
    
    <template>
        <Head title="Untitled Quiz Game!" />
        
        <div class="quiz-background relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-stone-900 sm:items-center sm:pt-0">
            <section class ="quiz" v-if="!quizCompleted">
                <div class = "quiz-info">
                    <span class="questions">{{ getCurrentQuestion.question}}</span>
                    <span class="score">Score {{ score}} / {{questions.length}}</span>
                </div>

                <div class="options">
                    <label v-for="(option, index) in getCurrentQuestion.options" 
                    :key="index"
                    :class="`option ${
                        getCurrentQuestion.selected == index 
                            ? index == getCurrentQuestion.answer 
                                ? 'correct' : 'wrong'
                            : ''
                    } ${
                        getCurrentQuestion.selected != null && index != getCurrentQuestion.selected
                            ? 'disabled'
                            : ''
                    }`">

                        <input type="radio" 
                        :name="getCurrentQuestion.index"
                        :value="index"
                        v-model="getCurrentQuestion.selected"
                        :disabled="getCurrentQuestion.selected"
                        @change="setAnswer">

                        <span>{{option}}</span>
                    </label>
                </div>

                <button
                    @click="nextQuestion"
                    :disabled="!getCurrentQuestion.selected">
                {{
                    getCurrentQuestion.index == questions.length - 1
                        ? 'Finish'
                        : getCurrentQuestion.selected == null
                            ? 'Select an option'
                            : 'Next Question'
                }}</button>
            </section>

            <section v-else>
                <h2> You have finished the Quiz</h2>
                <p>
                    Your score is {{ score}} / {{questions.length}}
                </p>
            </section>
        </div>
        
    </template>

<style>
    
    .quiz-background {
        background-color: #271c36;
        color: #FFF;
    }
    
    h1 {
        font-size: 2rem;
        margin-bottom: 2rem;
    }
    .quiz {
        background-color: #382a4b;
        padding: 1rem;
        width: 100%;
        max-width: 640px;
    }
    .quiz-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    .quiz-info .question {
        color: #8F8F8F;
        font-size: 1.25rem;
    }
    .quiz-info.score {
        color: #FFF;
        font-size: 1.25rem;
    }
    .options {
        margin-bottom: 1rem;
    }
    .option {
        padding: 1rem;
        display: block;
        background-color: #271c36;
        margin-bottom: 0.5rem;
        border-radius: 0.5rem;
        cursor: pointer;
    }
    .option:hover {
        background-color: #2d213f;
    }
    .option.correct {
        background-color: #2cce7d;
    }
    .option.wrong {
        background-color: #ff5a5f;
    }
    .option:last-of-type {
        margin-bottom: 0;
    }
    .option.disabled {
        opacity: 0.5;
    }
    .option input {
        display: none;
    }
    button {
        appearance: none;
        outline: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem 1rem;
        background-color: #2cce7d;
        color: #2d213f;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.2rem;
        border-radius: 0.5rem;
    }
    button:disabled {
        opacity: 0.5;
    }
    h2 {
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
    }
    p {
        color: #8F8F8F;
        font-size: 1.5rem;
        text-align: center;
    }
    </style>
    