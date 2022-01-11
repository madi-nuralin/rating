<template>
    <Head :title="$t('pages.dashboard.assignments.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.dashboard.assignments.header') }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <draggable v-model="$page.props.ratings" tag="transition-group" item-key="id" @start="drag = true" @end="drag = false" v-bind="dragOptions">
                    <!-- Each element from here will be draggable and animated. Note :key is very important here to be unique both for draggable and animations to be smooth & consistent. -->
                    <template #item="{element}">
                        <div class="bg-white shadow rounded px-3 pt-3 pb-5 mb-4 border border-white">
                            <div class="flex justify-between">
                                <Link class="text-gray-700 font-semibold font-sans tracking-wide text-base hover:underline" :href="route('submission.index', {'rating': element.id})">
                                    {{element.name}}
                                </Link>

                                <img
                                class="w-6 h-6 rounded-full ml-3"
                                :src="$page.props.auth.user.profile_photo_path"
                                alt="Avatar"
                                >
                            </div>
                            <div class="flex mt-4 justify-between items-center">
                                <div class="flex flex-col text-sm text-gray-600">
                                    <div>{{new Date(element.submission_begin_time_at)}}</div>
                                    <div>{{new Date(element.submission_end_time_at)}}</div>
                                    <!--div>{{new Date(element.verification_begin_time_at)}}</div>
                                    <div>{{new Date(element.verification_end_time_at)}}</div>
                                    <div>{{new Date(element.approvement_begin_time_at)}}</div>
                                    <div>{{new Date(element.approvement_end_time_at)}}</div-->
                                </div>
                                <BreezeBadge :color="'green'">Активно</BreezeBadge>
                            </div>
                        </div>
                    </template>
                </draggable>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import draggable from "vuedraggable";
    import { Link } from '@inertiajs/inertia-vue3';
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            BreezeBadge,
            draggable,
            Link,
            Head,
        },

        computed: {
            badgeColor() {
                const mappings = {
                    Design: "purple",
                    "Feature Request": "teal",
                    Backend: "blue",
                    QA: "green",
                    default: "teal"
                };
                return mappings[this.task.type] || mappings.default;
            },
            dragOptions() {
                return {
                    animation: 200,
                    group: "description",
                    disabled: false,
                    ghostClass: "ghost"
                };
            }
        }
    }
</script>
