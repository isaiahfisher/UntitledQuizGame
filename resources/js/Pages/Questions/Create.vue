<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    questions: {
        type: Object,
        default: () => ({}),
    },
    addMore() {
      this.form.options.push({
        option: "",
      });
    },
    remove(index) {
      this.form.options.splice(index, 1);
    },
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
    ]
    
});

const addMore = () => {
    form.options.push({
        option: "",
      });
    }

const remove = (index) => {
    form.options.splice(index, 1);
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
                            <div class="mb-6">
                                <div v-for="(options, index) in form.options" :key="index">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Option {{index + 1}}
                                    </label>
                                    <textarea
                                        type="text"
                                        v-model="options.options"
                                        name="content"
                                        id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    ></textarea>
                                    <button
                                        type="button"
                                        class="ml-2 rounded-md border px-3 py-2 bg-red-600 text-white"
                                        @click="remove(index)"
                                        v-show="form.options.length > 2"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="mb-6 flex justify-end">
                                <button
                                    type="button"
                                    class="text-white bg-blue-700 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                    @click="addMore()"
                                    >
                                    Add New Option
                            </button>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
