<script setup>
	import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
	import PrimaryButton from '@/Components/PrimaryButton.vue';
	import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
	import StatusLabel from '@/Components/StatusLabel.vue';

	const props = defineProps({
		categories: {
			type: Object,
			default: () => ({})
		}
	});

</script>

<template>

    <AuthenticatedLayout>
        <template #header>
						<div class="flex justify-between align-center w-full">
							<h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
							<Link :href="route('categories.create')" class="ml-auto">Create Category</Link>
						</div>
            
        </template>

				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
					<table class="min-w-full leading-normal" v-if="categories.length">
						<thead>
							<tr>
								<td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Name
								</td> 
								<td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Status
								</td> 
							</tr>
						</thead>
						<tbody>
							<tr v-for="category in categories" :key="category.id">
								<td class="px-5 py-5 border-b border-gray-200 text-sm">
									<Link :href="route('categories.edit', {category: category.id})" class="hover:underline">{{ category.name }}</Link>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 text-sm"><StatusLabel :active="!!category.status" /></td>
							</tr>
						</tbody>
					</table>
					<div v-else>
						There are currently no posts
					</div>
				</div>
    </AuthenticatedLayout>
</template>
