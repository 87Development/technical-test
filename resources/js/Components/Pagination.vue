<script setup>
import { Link } from '@inertiajs/inertia-vue3';
	defineProps({
		links: Array
	})
</script>

<template>
	<div v-if="links.length > 3">
		<div class="flex flex-wrap -mb-1">
			<template v-for="(link, index) in links" :key="index">
				<div v-if="link.url === null" class="hidden mr-1 mb-1 px-4 py-3 text-md leading-4 text-white border rounded" v-html="link.label"/>
				<Link v-else
        	class="mr-1 mb-1 px-4 py-3 text-md bg-acensor-orange text-white leading-4 border hover:bg-white hover:text-acensor-orange"
          :class="{ 'acensor-orange text-white': link.active }" :href="link.url" v-html="link.label" />
			</template>
		</div>
	</div>
</template>