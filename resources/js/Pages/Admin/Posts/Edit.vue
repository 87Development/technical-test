<script setup>
	import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
	import PrimaryButton from '@/Components/PrimaryButton.vue';
	import InputLabel from '@/Components/InputLabel.vue';
	import DangerButton from '@/Components/DangerButton.vue';
	import Modal from '@/Components/Modal.vue';
	import SecondaryButton from '@/Components/SecondaryButton.vue';
	import TextInput from '@/Components/TextInput.vue';
	import InputError from '@/Components/InputError.vue';
	import Editor from '@tinymce/tinymce-vue'
	import Datepicker from '@vuepic/vue-datepicker';
	import '@vuepic/vue-datepicker/dist/main.css'
	import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
	import { Inertia } from "@inertiajs/inertia";
	import { ref } from 'vue';

	const confirmingPostDeletion = ref(false);

	const props = defineProps({
		post: {
			type: Object,
			default: () => ({})
		},
		categories: {
			type: Object,
			default: () => ({})
		}
	});

	const form = useForm({
		'title' : props.post.title,
		'content': props.post.content,
		'category': props.post.category_id,
		'status': !!props.post.status,
		'publish_date': props.post.publish_date
	});

	function deletePost() {
		confirmingPostDeletion.value = true;
	}

	function submit() {
		form.patch(route('posts.update', {post: props.post.id}), {

		});
	}

	function onEditorReady(e) {
		e.container.querySelector('.ql-blank').innerHTML = form.content;
	}

	function doDelete() {
		Inertia.delete(route('posts.destroy', props.post.id));
	}

	function closeModal() {
		confirmingPostDeletion.value = false;
	}

</script>

<template>

    <AuthenticatedLayout>
			<Modal :show="confirmingPostDeletion" @close="closeModal">
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
						<div class="flex justify-between align-center items-center w-full">
							<h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Post</h2>
							<Link :href="route('posts.index')" class="ml-auto">&lt; Back to posts</Link>
							<DangerButton class="ml-2" @click="deletePost">Delete Post</DangerButton>
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
								<InputError class="mt-2" :message="form.errors.content" />
							</div>

							<div>
								<InputLabel for="publish_date" value="Publish Date" class="block mb-2 text-sm font-medium text-gray-900" />
								<Datepicker :placeholder="form.publish_date" :value="form.publish_date" v-model="form.publish_date" :enableTimePicker="false" format="dd/MM/yyyy" preview-format="dd/MM/yyyy"></Datepicker>
								<InputError class="mt-2" :message="form.errors.publish_date" />
							</div>

							<div>
								<InputLabel for="category" value="Category" class="block mb-2 text-sm font-medium text-gray-900" />
								<select name="category" v-model="form.category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
									<option value="">Please select a category</option>
									<option v-for="category in categories"
													:key="category.name"
													:value="category.id">{{category.name}}</option>
								</select>
								<InputError class="mt-2" :message="form.errors.category" />
							</div>

							<div>
								<InputLabel for="status" value="Active" class="block mb-2 text-sm font-medium text-gray-900" />
								<input type="checkbox" name="status" v-model="form.status" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5"/>
							</div>

							<button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit message</button>
						</form>
				</div>
    </AuthenticatedLayout>
</template>