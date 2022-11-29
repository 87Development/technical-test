<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import hero from "../../static/hero.jpg"
const props = defineProps({
	categories: Array
})

const currentYear = new Date().getFullYear();


</script>

<template>
<div class="min-h-screen">
	<!-- Page Heading -->
	<header>
			<div class="py-2 px-4 sm:px-2 lg:px-8 bg-acsensor-black w-full">
					<div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
						<h1 class="text-white">Company Name</h1>
					</div>
			</div>
			<div class="w-full">
				<div class="text-white h-36 overflow-hidden flex items-center justify-center relative">
					<img :src="hero" />
					<h2 class="absolute text-4xl">Blog</h2>
				</div>
			</div>
	</header>

	<!-- Page Content -->
	<main>
		<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
			<div class="grid overflow-hidden grid-cols-12 gap-4">
				<div class="box col-start-1 col-end-9">
					<slot name="post" />
				</div>
				<div class="box col-start-9 col-span-3">
					<nav>
						<Link v-for="category in categories"
									:key="category.id"
									:href="route('fe.category.index', {category: category.id})"
									class="block text-acsensor-green mb-4 w-full border-b-2 border-acsensor-dark-grey pb-1">
							{{category.name}}
						</Link>
					</nav>
				</div>
			</div>
		</div>
	</main>
		<footer class="sticky top-[100vh] py-2 px-4 sm:px-2 lg:px-8 bg-acsensor-black w-full">
			<div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
				<h1 class="text-white">Copyright Acensor {{ currentYear }}</h1>
			</div>
  </footer>
</div>
</template>