<script setup>
	import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
	import PrimaryButton from '@/Components/PrimaryButton.vue';
	import InputLabel from '@/Components/InputLabel.vue';
	import TextInput from '@/Components/TextInput.vue';
	import InputError from '@/Components/InputError.vue';
	import { QuillEditor } from '@vueup/vue-quill'
	import Editor from '@tinymce/tinymce-vue'
	import '@vueup/vue-quill/dist/vue-quill.snow.css';
	import Datepicker from '@vuepic/vue-datepicker';
	import '@vuepic/vue-datepicker/dist/main.css'
	import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
	import { watch, ref } from 'vue';


	const props = defineProps({
		categories: {
			type: Array,
			default: () => ([])
		}
	});

	const form = useForm({
		'title' : '',
		'content': '',
		'publish_date': ''
	});

	function submit() {
		form.post(route('posts.store'), {

		});
	}

</script>

<template>

    <AuthenticatedLayout>
        <template #header>
						<div class="flex justify-between align-center w-full">
							<h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Post</h2>
							<Link :href="route('posts.index')" class="ml-auto">Back to posts</Link>
						</div>
            
        </template>

				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
						<form class="space-y-8" @submit.prevent="submit">
							<div>
								<InputLabel for="title" value="Title" class="block mb-2 text-sm font-medium text-gray-900" />

                <TextInput
                    id="title"
                    type="text"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    v-model="form.title"
                    autofocus
                    autocomplete="title"
                />
                <InputError class="mt-2" :message="form.errors.title" />
							</div>

							<div>
								<InputLabel for="content" value="Content" class="block mb-2 text-sm font-medium text-gray-900" />
								<editor
									:initial-value="form.content"
									ref="editor"
       						api-key="3cblz2163kb2jnj8fwqddthwxunfw2d7eqeyebfm6xvkx6av"
									v-model="form.content"
									output-form="html"
									:init="{
										height: 500,
										menubar: false,
										plugins: [
											'advlist autolink lists link image charmap print preview anchor',
											'searchreplace visualblocks code fullscreen',
											'insertdatetime media table paste code help wordcount'
										],
										toolbar:
											'undo redo | formatselect | bold italic backcolor | \
											alignleft aligncenter alignright alignjustify | \
											bullist numlist outdent indent | removeformat | help'
									}"
     						/>
								<!-- <editor-content v-model="form.content" :editor="editor" class="h-72 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" /> -->
								<InputError class="mt-2" :message="form.errors.content" />
							</div>

							<div>
								<InputLabel for="publish_date" value="Publish Date" class="block mb-2 text-sm font-medium text-gray-900" />
								<Datepicker :placeholder="new Date().toLocaleDateString('en-GB')" modelType="string" :value="new Date()" v-model="form.publish_date" :time-picker="false" format="yyyy-MM-dd HH:mm:ss"></Datepicker>
								<InputError class="mt-2" :message="form.errors.publish_date" />
							</div>

							<div>
								<InputLabel for="category" value="Category" class="block mb-2 text-sm font-medium text-gray-900" />
								<select name="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
									<option value="">Please select a category</option>
									<option v-for="category in categories" :key="category.name" :value="category.id">{{ category.name}}</option>
								</select>
								<InputError class="mt-2" :message="form.errors.category" />
							</div>

							<div>
								<InputLabel for="status" value="Active" class="block mb-2 text-sm font-medium text-gray-900" />
								<input type="checkbox" name="status" value="1" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5"/>
							</div>

							<button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Create Post</button>
						</form>
				</div>
    </AuthenticatedLayout>
</template>