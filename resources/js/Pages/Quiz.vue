<template>
    <Head title="Quiz Time" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-bol text-xl text-gray-800 leading-tight">
                Quiz Time
            </h2>
        </template>

        <div
            class="quiz-background relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-stone-900 sm:items-center sm:pt-0"
        >
            <section class="quiz" v-if="!quizCompleted">
                <div class="quiz-info">
                    <h6 id="questionData">{{
                        getCurrentQuestion.value
                    }}</h6>
                    <span class="score"
                        >Question #{{ currentQuestion+1 }}  out of
                        {{ props.quiz.questions.length }}</span
                    >
                </div>

                <div class="options">
                    <input v-model="answer" />
                </div>

                <button className="submitBtn"
                    @click="
                        answerQuestion();
                        nextQuestion();
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
                <p>
                <button className="resultsBtn" @click="showResults()">View Results</button>
                </p>

                <table id="resultsTable" className="resultsTable" style="display:none">
                    <thead class="border-b">
                        <tr>
                            <th colspan="2" class="text-sm font-medium text-white-900 px-6 py-4 text-left">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white-900">Question #</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white-900">Your Answer</td>
                            <td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white-900">Correct Answer</td>
                        </tr>
                        <tr>
                            <td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white-900">
                                1
                            </td>
                            <td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white-900">
                                false
                            </td>
                            <td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white-900">
                                true
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from '@inertiajs/inertia';
import { Head } from "@inertiajs/inertia-vue3";
import { ref, computed } from "vue";

const props = defineProps(["quiz"]);

const quizCompleted = ref(false);
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
        window.axios.post('api/quiz/' + props.quiz.id, {earned_points: score.value});
        quizCompleted.value = true;
    }
};
const answerQuestion = () => {
    if (answer.value == props.quiz.questions[currentQuestion.value].correct_answer) {
        score.value++;
    }
    window.axios.post('api/quiz/' + props.quiz.id + '/question/' + props.quiz.questions[currentQuestion.value].id + '/answer', 
    {answer: answer.value});
    answer.value = "";
    return score;
};

const showResults = () => {
    let table = document.getElementById("resultsTable");
    if(table.style.display === "none"){
        table.style.display = "block";
    }else{
        table.style.display = "none";
    }
}





</script>

<style>


.resultsTable{
    margin-top:2em;
    border: 1px solid #22c55e;
    border-radius: 20px;
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

.resultsBtn {
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
    margin-top:.5em;
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

#questionData{
    font-size: clamp(1rem, 1vw + .3rem, 2rem);
    position: relative;
    font-family: "Source Code Pro", monospace;
    position: relative;
    width: max-content;
    color: #22c55e;
}

#questionData::before,
#questionData::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

#questionData::before {
    background: #5f5c5b;
    animation: typewriter 6.5s steps(32) 1s forwards;
}

#questionData::after {
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
</style>
