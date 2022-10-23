<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    questions: {
        type: Object,
        default: () => ({}),
    }
});


const form = useForm({
    question: '',
    category: '',
    type: '',
    options: [
        {
            option: "",
        },
        {
            option: "",
        },
    ],
    correctAnswer: []
    
});

const addMore = () => {
    form.options.push({
        option: "",
      });
}

const remove = (index) => {
    form.options.splice(index, 1);
}

const optionType = () => {
    
    if (form.type === 'tf') {
        form.options = []
        form.options.push({option : 'True'})
        form.options.push({option : 'False'})
    } else {
        form.options = [
            {
                option: "",
            },
            {
                option: "",
            },
        ]
    }
}

const submit = () => {
    console.log(form.options)
    console.log(form.correctAnswer)
}


</script>

<template>
    <Head title="Quiz Upload" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Quiz Question Upload
            </h2>
        </template>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 pt-5">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Question"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Question</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.question"
                                    name="content"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>
                                <div
                                    v-if="form.errors.question"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.question }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Category</label
                                >
                                <input
                                    type="text"
                                    v-model="form.category"
                                    name="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.category"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.category }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Type</label
                                >
                                <select 
                                    v-model="form.type"
                                    name="type"
                                    @change="optionType()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                                    <option value="tf">True or False</option>
                                    <option value="multiple" selected>Mutliple Choice</option>
                                </select> 
                                <div
                                    v-if="form.errors.type"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.type }}
                                </div>
                            </div>
                            <div class="mb-6" v-show="form.type === 'multiple'">
                                <div v-for="(options, index) in form.options" :key="index">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Option {{index + 1}}
                                    </label>
                                    <div class="grid grid-cols-12 gap-4">
                                        <div class="col-span-11">
                                            <textarea
                                                type="text"
                                                v-model="options.option"
                                                name="option"
                                                class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            ></textarea>
                                        </div>
                                        <div class="justify-end">
                                            <button
                                                type="button"
                                                class="px-3 py-1 rounded-md bg-red-600 text-white text-sm"
                                                @click="remove(index)"
                                                v-show="form.options.length > 2"
                                            >
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="mb-6 flex justify-end" v-show="form.type === 'multiple'">
                                <button
                                    type="button"
                                    class="text-white bg-blue-600 focus:outline-none  font-sm rounded-md text-sm px-3 py-1.5 "
                                    @click="addMore()"
                                    >
                                    Add New Option
                            </button>
                            </div>
                            <div class="mb-6" v-show="form.type === 'multiple' || form.type === 'tf' ">
                                <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Correct Answer
                                    </label>
                                    <div v-if="form.type === 'multiple'">
                                        <select 
                                            v-model="form.correctAnswer"
                                            multiple="true"
                                            name="correctAnswer"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            >
                                            <option v-for="(value, key) in form.options" 
                                                    :value="key"
                                                    :key="key">
                                            Option {{key + 1}} : {{value.option}}
                                            </option>
                                        </select> 
                                    </div>
                                    <div v-else-if="form.type === 'tf'">
                                        <select 
                                            v-model="form.correctAnswer"
                                            name="correctAnswer"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            >
                                            <option v-for="(value, key) in form.options" 
                                                    :value="key"
                                                    :key="key">
                                            Option {{key + 1}} : {{value.option}}
                                            </option>
                                        </select> 
                                    </div>
                            </div>
                            <PrimaryButton
                                type="submit"
                                class="text-white focus:outline-none font-medium text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
