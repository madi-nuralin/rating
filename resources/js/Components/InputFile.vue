<template>
	<input type="file" class="hidden" ref="file" @change="updateFilePreview">

	<div class="max-w-xl" v-if="! uploaded">
        <breeze-button-secondary class="mt-2 mr-2" type="button" @click.prevent="selectNewFile">
            Upload A New File
        </breeze-button-secondary>

        <span class="text-gray-600 text-sm overflow-ellipsis overflow-hidden">
            {{ filePreview ? filePreview : "No file chosen" }}
        </span>
    </div>

    <div class="max-w-xl" v-else>
        <a :href="value" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mr-2">
            Download file
        </a>

        <breeze-button-danger class="mt-2 mr-2" type="button" @click.prevent="deleteFile" v-if="! readonly">
            Remove File
        </breeze-button-danger>
    </div>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary'
    import BreezeButtonDanger from '@/Components/ButtonDanger'

	export default {
        emits: ['input'],

		components: {
            BreezeButton,
            BreezeButtonSecondary,
            BreezeButtonDanger
        },

		props: {
            value: {},
            route: {},
            readonly: {default: false}
        },

		data() {
			return {
				filePreview: null,
                uploaded: this.value
			}
		},

		methods: {
			selectNewFile() {
                this.$refs.file.click();
            },

            updateFilePreview() {
                const file = this.$refs.file.files[0];
                this.$emit('input', file);

                if (! file) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.filePreview = e.target.result;
                    /**/this.filePreview = file['name'];
                };

                reader.readAsDataURL(file);
            },

            deleteFile() {
                this.$inertia.delete(route, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.filePreview = null;
                        this.clearFileInput();
                    },
                });
            },

            clearFileInput() {
                if (this.$refs.file.value) {
                    this.$refs.file.value = null;
                }
            },
		}
	}
</script>