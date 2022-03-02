<template>
    <Head :title="$t('pages.wizards.submission.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.wizards.submission.header') }}
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <SelectParameterTargetForm :rating="$page.props.arcanist.step.rating" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import SelectParameterTargetForm from './Partials/SelectParameterTargetForm.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            SelectParameterTargetForm,
            Head,
        },
    }
</script>
