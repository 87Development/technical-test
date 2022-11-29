<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const postPreview = computed(() => {
	
	const firstParagraphElement = props.post.content.split("</p>")[0];
	return firstParagraphElement.replace("<p>","");

});

const props = defineProps({
    post: {
        type: Object,
        required: true
    },
		isExcerpt: Boolean
});
</script>

<template>
    <section class="p-2 bg-acsensor-grey mb-4">
			<h3 class="text-xl mb-2">
				<Link :href="route('fe.posts.show', {post: props.post.id})">{{ props.post.title }}</Link>
			</h3>
			<span class="block mb-2">{{ props.post.publish_date }}</span>
			<div v-html="postPreview" v-if="isExcerpt"></div>
			<div class="post-content" v-html="props.post.content" v-else></div>
		</section>
</template>

<style>
 .post-content p {
		margin-bottom: 1rem;
 }
</style>
