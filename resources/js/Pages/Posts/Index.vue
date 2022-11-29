<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Layout.vue';
import PostExcerpt from '@/Components/PostExcerpt.vue';
import Pagination from '@/Components/Pagination.vue'
defineProps({
    posts: {
			type: Object,
			default: () => ([])
		},
		categories: {
			type: Array,
			default: () => ([])
		}
});

</script>

<template>

	<Layout :categories="categories">

		<template #post>
			<PostExcerpt v-for="post in posts.data" :key="post.id" :post="post" :isExcerpt="true"/>
			<div class="mx-auto flex align-center justify-center">
				<pagination class="mt-6" :links="posts.links" />
			</div>
		</template>

	</Layout>
    
</template>
