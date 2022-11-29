<script setup>
	import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
	import InputLabel from '@/Components/InputLabel.vue';
	import TextInput from '@/Components/TextInput.vue';
	import InputError from '@/Components/InputError.vue';
	import '@vuepic/vue-datepicker/dist/main.css'
	import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
  import { ref } from 'vue';

	const confirmingCategoryDeletion = ref(false);

	const props = defineProps({
		category: {
			type: Object,
			default: () => ({})
		},
	});

	const form = useForm({
		'name' : props.category.name,
		'status': props.category.status,
	});

	function submit() {
		form.patch(route('categories.update', {category: props.category.id}), {

		});
	}

</script>

<template>

    <AuthenticatedLayout>
			<Modal :show="confirmingCategoryDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure your want to delete this post?
                </h2>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="doDelete"
                    >
                        Delete Post
                    </DangerButton>
                </div>
            </div>
        </Modal>
        <template #header>
						<div class="flex justify-between align-center w-full">
							<h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Category</h2>
							<Link :href="route('posts.index')" class="ml-auto">Back to categories</Link>
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
								<input type="checkbox" name="status" v-model="form.status" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5"/>
							</div>

							<button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit Category</button>
						</form>
				</div>
    </AuthenticatedLayout>
</template>