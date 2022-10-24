<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    questions: {
        type: Object,
        default: () => ({}),
    }
});


</script>

<template>
    <Head title="Quiz Questions" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List of Questions
            </h2>
        </template>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 pt-5">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" flex items-center justify-between pb-6">
		<div>
			<h2 class="text-gray-600 font-semibold">Quiz Questions</h2>
			<span class="text-xs">All Questions</span>
		</div>
		<div class="flex items-center justify-between">		
				<div class="lg:ml-40 ml-10 space-x-8">
					<PrimaryButton class="px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"><a :href="route('questions.create')">Create</a></PrimaryButton>
				</div>
			</div>
		</div>
		<div>
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Question
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Category
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Created at
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Answer
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<div class="flex items-center">
                                        <div class="ml-3">
											<p class="text-gray-900 whitespace-no-wrap">
												What is the most common surname in the United States?
											</p>
										</div>	
			
									</div>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">General Knowledge</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
										Jan 21, 2020
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
										Smith
									</p>
								</td>
							</tr>
							
							<tr>
								<td class="px-5 py-5 bg-white text-sm">
									<div class="flex items-center">
                                        <div class="ml-3">
											<p class="text-gray-900 whitespace-no-wrap">
												Queen guitarist Brian May is also an expert in what scientific field?
											</p>
										</div>			
									</div>
								</td>
								<td class="px-5 py-5 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">History</p>
								</td>
								<td class="px-5 py-5 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">Jan 18, 2020</p>
								</td>
								<td class="px-5 py-5 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">Astrophysics</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>   
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
