<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Layout.vue';
import PostExcerpt from '@/Components/PostExcerpt.vue';

defineProps({
    post: {
			type: Object,
			default: () => ({})
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
			<PostExcerpt :post="post" :isExcerpt="false" />
		</template>

	</Layout>
    
</template>
