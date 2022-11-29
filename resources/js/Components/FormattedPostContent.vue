<script setup>
	import { QuillEditor } from '@vueup/vue-quill'
	import '@vueup/vue-quill/dist/vue-quill.snow.css';
	import { ref } from 'vue';

	const editor = ref(null);

	const props = defineProps({
		postContent: Object
	});

	function onEditorReady(e) {
		console.log(editor);
		editor.setContents(props.postContent, 'api');
	}

	const editorOptions = {
		debug: 'info',
		modules: {
			toolbar: ''
		},
		placeholder: '',
		readOnly: true,
		theme: 'snow'
	}


</script>

<template>
	<QuillEditor :options="editorOptions" output="html" @ready="onEditorReady" ref="editor" />
</template>