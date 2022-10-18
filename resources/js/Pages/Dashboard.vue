<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div class="bg-stone-900">
        <template>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
        <div id="mainDiv" class="max-w-7xl mx-auto">
            <div class="grid grid-cols-3">
                <div id="object">
                    <button id="bgButton">
                        <img id="quizImg" src="../../imgs/quiz.png" />
                        <b><a id="ref">Generate Quiz</a></b>
                    </button>
                </div>
                <div id="object">
                    <button id="bgButton">
                        <img id="quizImg" src="../../imgs/accountIcon.webp" />
                        <b><a id="ref">Account Information</a></b>
                    </button>
                </div>
                <div id="object">
                    <button id="bgButton">
                        <img id="quizImg" src="../../imgs/addQuestion.webp" />
                        <b><a id="ref">Create Question(s)</a></b>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
#mainDiv{
    text-align: -webkit-center;
    margin-top:5em;
}

#object{
    margin-bottom: 3em;
}

#bgButton:hover{
    box-shadow: 4px 8px #24c55e;
    transform: translateY(-10px);
    color:#24c55e;
    width: 13.5em;
    height: 13.5em;
}

#bgButton {
    background-color: white;
    border-radius: 25px;
    width: 13em;
    height: 13em;
    text-align: -webkit-center;
    box-shadow: 2px 4px #24c55e;
    transition: all ease 0.25s;
}

#quizImg {
    width: 10em;
    height: 10em;
}

</style>
