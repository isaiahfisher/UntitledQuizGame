<template>
    <Head title="Add a Question" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add a Question!
            </h2>
        </template>

        <div id="banner" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Please fill all fields with the Correct values!
                </div>
            </div>
        </div>
        <div id="MainDiv">
            <div id="holderDiv">
                <div id="formDiv">
                    <form
                        @submit.prevent="Submit"
                        class="w-full max-w-lg min-h-screen"
                    >
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1 px-3 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-question"
                                    id="questionLabel"
                                >
                                    Question
                                </label>

                                <textarea
                                    type="text"
                                    v-model="form.question"
                                    name="questionContent"
                                    id="textArea"
                                    placeholder="Insert Question Here"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block"
                                ></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-answer"
                                    id="answerLabel"
                                >
                                    Question Answer
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-answer"
                                    v-model="form.answer"
                                    type="text"
                                    placeholder="Insert Answer Here"
                                />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-answer"
                                    id="answerLabel"
                                >
                                    Points
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-answer"
                                    v-model="form.points"
                                    type="number"
                                    min="1"
                                />
                            </div>
                        </div>

                        <button className="submitBtn" type="submit">
                            Submit Question
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";

const form = useForm({
    question: "",
    answer: "",
    points: 1,
});

const Submit = () => {
    form.post("/question/store", form);
    form.reset();
    // form.reset('points');
};
</script>

<style>
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

#banner {
    margin-top: 1em;
}

#MainDiv {
    overflow: hidden;
}

#formDiv {
    margin-top: 2em;
    width: 40em;
    height: 36em;
    background-color: rgb(99, 99, 99);
    border: 1px solid #2cce7d;
    border-radius: 5px;
}

#questionLabel {
    margin-top: 1em;
    font-size: medium;
    color: white;
}

#holderDiv {
    text-align: -webkit-center;
}

#textArea {
    width: 35em;
    height: 10em;
    resize: none;
}

#answerLabel {
    margin-top: 1em;
    font-size: medium;
    color: white;
    text-align: left;
}
</style>
