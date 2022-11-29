<script setup>
import { computed } from 'vue';
	defineProps({
		active: Boolean
	});
</script>

<template>
	<span class="relative inline-block px-3 py-1 font-semibold leading-tight" :class="{'text-green-900' : active, 'text-red-900': !active}">
		<span aria-hidden class="absolute inset-0 opacity-50 rounded-full" :class="{'bg-green-200' : active, 'bg-red-200': !active}"></span>
		<span class="relative">{{ active ? 'Active' : 'Inactive'}}</span>
	</span>
</template>