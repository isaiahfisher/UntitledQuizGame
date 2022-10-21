<template id="main">
    <Head title="Quiz Time" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Quiz Time
            </h2>
        </template>
        <div id="main">
            <div id="QuestionDiv" v-for="question in $page.props.quiz.questions" :key="question">
                <h1>{{ question.value }}</h1>
                <br/>
                <input type="text" id="answer" />
            </div>
        </div>
    </AuthenticatedLayout>




    
  
</template>


<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";

</script>

<style>

#answer{
    text-align: center;
    margin-bottom: .5em;
}

#QuestionDiv{
    margin-top:1.5em;
    margin-bottom:1.5em;
    text-align: center;
    background: #1c1917;
    width:15em;
    height:10em;
    
}

#header{
    color:#24c55e;
}

#main{
    text-align: -webkit-center;
}


h1 {
    font-size: clamp(.7rem, .65vw + .1rem, 2rem);
    position: center;
    font-family: "Source Code Pro", monospace;
    position: relative;
    width: max-content;
    color: #22c55e;
}

h1::before,
h1::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

h1::before {
    background: #1c1917;
    animation: typewriter 6.5s steps(32) 1s forwards;
}

h1::after {
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