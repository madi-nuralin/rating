<template>
    <BreezeFormSection :has-title="false">
        <template #aside>
            <div>
                <h3 class="text-lg font-medium text-gray-900">
                   Лист оценки
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Заполняйте лист оценки до завершения установленного срока текущего рейтинга
                </p>
            </div>

            <hr class="my-6" />
            <show-name :rating="rating" />
            <hr class="my-6" />
            <show-description :rating="rating" />
            <hr class="my-6" />
            <show-verifiers :rating="rating" />
            <hr class="my-6" />
            <show-date :rating="rating" />

        </template>

        <template #form>
            <div class="col-span-6">
                <div class="relative z-0 mt-1">
                    <BreezeAccordion v-for="(target, i) in rating.targets">

                        <template #trigger>
                            {{target.name}}
                        </template>

                        <template #content>
                            <div class="relative grid grid-cols-4 gap-1 w-full">
                                <div class="col-span-1">
                                    <div>Подтверждающие</div>
                                    <BreezeAvatarGroup :space="'-space-x-2'">
                                        <BreezeAvatar :width="'6'" :src="verifier.user.profile_photo_path" v-for="(verifier, j) in target.verifiers" />
                                    </BreezeAvatarGroup>
                                </div>
                                <div class="col-span-3">
                                    <BreezeList :name="'submission'" :items="items(target.submissions)" />
                                </div>
                            </div>
                        </template>
                    </BreezeAccordion>
                </div>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" >
                {{ $t('pages.management.rating.list.actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeList from '@/Components/List.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'
    import ShowName from '../../Partials/ShowName.vue'
    import ShowDescription from '../../Partials/ShowDescription.vue'
    import ShowVerifiers from '../../Partials/ShowVerifiers.vue'
    import ShowDate from '../../Partials/ShowDate.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'
    import BreezeAvatarGroup from '@/Components/AvatarGroup.vue'
    import BreezeAvatar from '@/Components/Avatar.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeList,
            BreezeBadge,
            BreezeSectionBorder,
            BreezeSectionTitle,
            ShowName,
            ShowDescription,
            ShowVerifiers,
            ShowDate,
            BreezeAccordion,
            BreezeAvatarGroup,
            BreezeAvatar,
            Link,
        },

        props: ['rating'],

        data() {
            return {
            }
        },

        methods: {
            items(submissions) {
                return {
                    'data': submissions.data.map(function(submission) {
                        return {
                            id: submission.id,
                            name: submission.parameter.name,
                            description: 
                                `<div class="flex flex-col">
                                    <div>${submission.parameter.description}</div>
                                    <div class="mt-2 md:grid md:grid-cols-3">
                                        <div>Подтвердили</div>
                                        <div>Не просмотрено</div>
                                        <div>Заработано</div>
                                    </div>
                                </div>`
                        }
                    }),
                    'links': submissions.links
                };
            }
        },
    }
</script>