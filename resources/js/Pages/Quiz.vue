<template>
    <Head title="Quiz Time" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Quiz Time
            </h2>
        </template>

        <div
            class="quiz-background relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-stone-900 sm:items-center sm:pt-0"
        >
            <section class="quiz" v-if="!quizCompleted">
                <div class="quiz-info">
                    <h6 id="questionData" class="questions">{{
                        getCurrentQuestion.value
                    }}</h6>
                    <span class="score"
                        >Score {{ score }} /
                        {{ props.quiz.questions.length }}</span
                    >
                </div>

                <div class="options">
                    <input v-model="answer" />
                </div>

                <button className="submitBtn"
                    @click="
                        nextQuestion();
                        answerQuestion();
                    "
                >
                    Next
                </button>
            </section>

            <section v-else>
                <h2>You have finished the Quiz</h2>
                <p>
                    Your score is {{ score }} /
                    {{ props.quiz.questions.length }}
                </p>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, computed } from "vue";

const props = defineProps(["quiz"]);

const quizCompleted = ref(false);
console.log(props);
const currentQuestion = ref(0);
let score = ref(0);
const answer = ref("");
const getCurrentQuestion = computed(() => {
    let question = props.quiz.questions[currentQuestion.value];
    question.index = currentQuestion.value;
    return question;
});
const nextQuestion = () => {
    if (currentQuestion.value < props.quiz.questions.length - 1) {
        currentQuestion.value++;
    } else {
        quizCompleted.value = true;
    }
};
const answerQuestion = () => {
    if (answer.value == props.quiz.questions[0].correct_answer) {
        score.value++;
        console.log(score);
    }
    return score;
};
</script>

<style>
#questionData {
    color: #2cce7d;
}

input {
    color: #2cce7d;
    background-color: #1c1917;
    border: 1px solid #2cce7d;
    border-radius: 5px;
}

.quiz-background {
    background-color: #1c1917;
    color: #fff;
    border: 1px solid #2cce7d
}

h1 {
    font-size: 2rem;
    margin-bottom: 2rem;
}
.quiz {
    background-color: #5e5c5b;
    padding: 1rem;
    width: 100%;
    max-width: 640px;
    border: 1px solid #2cce7d;
    border-radius:20px;
}
.quiz-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}
.quiz-info .question {
    color: #8f8f8f;
    font-size: 1.25rem;
}
.quiz-info.score {
    color: #fff;
    font-size: 1.25rem;
}
.options {
    margin-bottom: 1rem;
}
.option {
    padding: 1rem;
    display: block;
    background-color: #1c1917;
    margin-bottom: 0.5rem;
    border-radius: 0.5rem;
    cursor: pointer;
}
.option:hover {
    background-color: #1c1917;
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
.submitBtn {
    appearance: none;
    outline: none;
    border: none;
    cursor: pointer;
    padding: 0.5rem 1rem;
    background-color: #2cce7d;
    color: #1c1917;
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
    color: #8f8f8f;
    font-size: 1.5rem;
    text-align: center;
}

h6 {
    font-size: clamp(1rem, 1vw + .3rem, 2rem);
    position: relative;
    font-family: "Source Code Pro", monospace;
    position: relative;
    width: max-content;
    color: #22c55e;
}

h6::before,
h6::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

h6::before {
    background: #5f5c5b;
    animation: typewriter 6.5s steps(32) 1s forwards;
}

h6::after {
    width: 0.125em;
    background: #22c55e;
    animation: typewriter 6.5s steps(32) 1s forwards,
        blink 750ms steps(32) infinite;
}
/* typewriter animation */
@keyframes typewriter {
    to {
        left: 100%;
    }
}
/* cursor animation */
@keyframes cursor {
    to {
        background: transparent;
    }
}

@keyframes blink {
    to {
        background: transparent;
    }
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
