<template>
	<BreezeButtonSecondary @click="open = true">
		Миграция ответа
	</BreezeButtonSecondary>

	<BreezeModalDialog :show="open" :content-class="'max-h-96 -mx-5'" @close="closeModal">
        <template #title>
        	Миграция ответа
        </template>

        <template #content>

        </template>

        <template #footer>
            <BreezeButtonSecondary type="button" @click="open = false">
                {{ $t('components.select.closeButton') }}
            </BreezeButtonSecondary>
        </template>
    </BreezeModalDialog>
</template>

<script>
	import BreezeModalDialog from '@/Components/ModalDialog'
	import BreezeButtonSecondary from '@/Components/ButtonSecondary'

	export default {
		components: {
			BreezeModalDialog,
			BreezeButtonSecondary,
		},

		props: ['verification', 'parameters'],

		data() {
			return {
				open: false
			};
		},

		methods: {
			closeModal() {
				this.open = false;
			}
		}
	};
</script>