<template>
    <div class="relative">
    	<input type="file" class="hidden" ref="file" @change="updateFilePreview">

        <div class="max-w-xl flex items-center space-x-4">
            <template v-if="! uploaded">
                <breeze-button-secondary type="button" @click.prevent="selectNewFile">
                    {{ $t('components.fileInput.uploadFileButton') }}
                </breeze-button-secondary>

                <div class="text-gray-600 text-sm overflow-ellipsis overflow-hidden">
                    {{ filePreview ? filePreview : $t('components.fileInput.noFileChosenMessage') }}
                </div>
            </template>

            <template v-else>
                <a :href="value" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" target="_blank" rel="noopener noreferrer">
                    {{ $t('components.fileInput.downloadFileButton') }}
                </a>

                <button class="text-red-500 text-sm hover:underline" type="button" @click="confirmingDeletion = true" v-if="! readonly">
                    {{ $t('components.fileInput.removeFileButton') }}
                </button>

                <breeze-modal-confirmation :show="confirmingDeletion" @close="confirmingDeletion = false">
                    <template #title>
                        {{ $t('components.fileInput.modal.title') }}
                    </template>

                    <template #content>
                        {{ $t('components.fileInput.modal.content') }}
                    </template>

                    <template #footer>
                        <breeze-button-secondary @click="confirmingDeletion = false">
                            {{ $t('components.fileInput.modal.footer.cancelButton') }}
                        </breeze-button-secondary>

                        <breeze-button-danger class="ml-2" @click="deleteFile">
                            <!-- :class="{ 'opacity-25': form.processing }" :disabled="form.processing" -->
                            {{ $t('components.fileInput.modal.footer.deleteButton') }}
                        </breeze-button-danger>
                    </template>
                </breeze-modal-confirmation>
            </template>
        </div>
    </div>
</template>

<script>
    import BreezeModalConfirmation from '@/Components/ModalConfirmation'
    import BreezeButton from '@/Components/Button'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary'
    import BreezeButtonDanger from '@/Components/ButtonDanger'

	export default {
        emits: ['input'],

		components: {
            BreezeModalConfirmation,
            BreezeButton,
            BreezeButtonSecondary,
            BreezeButtonDanger
        },

		props: {
            value: {},
            destroy: {},
            download: {
                type: Boolean,
                default: true
            },
            readonly: {
                type: Boolean,
                default: false
            }
        },

		data() {
			return {
                confirmingDeletion: false,
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
                this.$inertia.delete(this.destroy, {
                    preserveScroll: true,
                    onSuccess: () => {
                        /**/this.uploaded = null;/**/
                        this.confirmingDeletion = false;
                        this.filePreview = null;
                        this.clearFileInput();
                    },
                });
            },

            clearFileInput() {
                if (this.$refs.file.value) {
                    this.$refs.file.value = null;
                }

                this.$emit('input', '');
            },
		}
	}
</script>