<script setup>
	import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
	import PrimaryButton from '@/Components/PrimaryButton.vue';
	import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
	import StatusLabel from '@/Components/StatusLabel.vue';
	const props = defineProps({
		posts: {
			type: Object,
			default: () => ({})
		},
		headers: {
			type: Array,
			default: () => ([])
		}
	});

</script>

<template>

    <AuthenticatedLayout>
        <template #header>
						<div class="flex justify-between align-center w-full">
							<h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
							<Link :href="route('posts.create')" class="ml-auto">Create Post</Link>
						</div>
            
        </template>

				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
					<table class="min-w-full leading-normal" v-if="posts.length">
						<thead>
							<tr>
								<td v-for="(header, index) in headers" 
										:key="index"
										class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
											{{ header }}
								</td> 
							</tr>
						</thead>
						<tbody>
							<tr v-for="post in posts" :key="post.id">
								<td class="px-5 py-5 border-b border-gray-200 text-sm">
									<Link :href="route('posts.edit', {post: post.id})" class="hover:underline">{{ post.title }}</Link>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 text-sm">{{ post.category.name }}</td>
								<td class="px-5 py-5 border-b border-gray-200 text-sm"><StatusLabel :active="!!post.status" /></td>
								<td class="px-5 py-5 border-b border-gray-200 text-sm">{{ post.publish_date}}</td>
							</tr>
						</tbody>
					</table>
					<div v-else>
						There are currently no posts
					</div>
				</div>
    </AuthenticatedLayout>
</template>
