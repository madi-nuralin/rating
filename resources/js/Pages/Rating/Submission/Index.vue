<template>
    <Head :title="$t('pages.submission.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.submission.header') }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <ResourceList :rating="$page.props.rating"/>
                <!--div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h4>{{$page.props.rating.name}}</h4>
                        <ul>
                            <li v-for="(target, i) in $page.props.rating.targets">
                                <div>{{target.name}}</div>
                            </li>
                        </ul>
                    </div>
                </div-->
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import ResourceList from './Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            ResourceList,
            Head,
        },
    }
</script>
