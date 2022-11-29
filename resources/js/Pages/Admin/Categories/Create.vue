<script setup>
	import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
	import PrimaryButton from '@/Components/PrimaryButton.vue';
	import InputLabel from '@/Components/InputLabel.vue';
	import TextInput from '@/Components/TextInput.vue';
	import InputError from '@/Components/InputError.vue';
	import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
	
	const form = useForm({
		'name' : '',
		'status': ''
	});

	function submit() {
		form.post(route('categories.store'), {

		});
	}

</script>

<template>

    <AuthenticatedLayout>
        <template #header>
						<div class="flex justify-between align-center w-full">
							<h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Category</h2>
							<Link :href="route('categories.index')" class="ml-auto">Back to categories</Link>
						</div>
            
        </template>

				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
						<form class="space-y-8" @submit.prevent="submit">
							<div>
								<InputLabel for="name" value="Name" class="block mb-2 text-sm font-medium text-gray-900" />

                <TextInput
                    id="name"
                    type="text"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    v-model="form.name"
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
							</div>

							
							<div>
								<InputLabel for="status" value="Active" class="block mb-2 text-sm font-medium text-gray-900" />
								<input type="checkbox" name="status" value="1" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5"/>
							</div>

							<button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Create Category</button>
						</form>
				</div>
    </AuthenticatedLayout>
</template>