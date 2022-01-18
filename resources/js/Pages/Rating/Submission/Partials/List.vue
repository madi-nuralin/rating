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
                <div v-for="(target, i) in rating.targets">
                    <BreezeAccordion >

                        <template #trigger>
                            {{target.name}}
                        </template>

                        <template #content>
                            <div class="relative grid grid-cols-4 gap-1 w-full">
                                <!--div class="col-span-1">
                                    <div>Подтверждающие</div>
                                    <BreezeAvatarGroup :space="'-space-x-2'">
                                        <BreezeAvatar :width="'6'" :src="verifier.user.profile_photo_path" v-for="(verifier, j) in target.verifiers" />
                                    </BreezeAvatarGroup>
                                </div-->
                                <div class="col-span-4" v-if="Object.keys(target.submissions).length > 0">
                                    <BreezeList :items="target.submissions">
                                        <template #item="{item}">
                                            <div class="flex flex-between mt-4">
                                                <div>
                                                    <div>{{item.parameter.name}}</div>
                                                    <div class="flex flex-col text-sm text-gray-400">
                                                        <h4 class="line-clamp-3">
                                                            {{item.parameter.description}}
                                                        </h4>
                                                        <div class="md:grid md:grid-cols-3 text-gray-700">
                                                            <div class="md:flex md:space-x-2 grid grid-cols-2 mt-2">
                                                                <p>Подтвердили</p>
                                                                <breeze-avatar-group :space="'-space-x-2'">
                                                                    <breeze-avatar :width="'6'" :src="verification.verifier.user.profile_photo_path" v-for="verification in item.verifications" v-if="verification && verification.status && verification.status.context == 'a'" />
                                                                </breeze-avatar-group>
                                                            </div>
                                                            <div class="md:flex md:space-x-2 grid grid-cols-2 mt-2">
                                                                <p>Не просмотрено</p>
                                                                <breeze-avatar-group :space="'-space-x-2'">
                                                                    <breeze-avatar :width="'6'" :src="verification.verifier.user.profile_photo_path" v-for="verification in item.verifications" v-if="verification && verification.status && verification.status.context == 'n/r'" />
                                                                </breeze-avatar-group>
                                                            </div>
                                                            <div class="md:flex md:space-x-2 grid grid-cols-2 mt-2">Заработано</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <Link class="ml-2 text-sm text-gray-400 underline" :href="route('submission.show', {'id': item.id})">
                                                    Update
                                                </Link>
                                            </div>
                                        </template>
                                    </BreezeList>
                                </div>
                            </div>
                        </template>
                    </BreezeAccordion>

                    <hr class="my-6" />
                </div>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('submission.create', {'rating': rating.id})">
                {{ $t('pages.management.rating.list.actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeList from '@/Components/ListScoped.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'
    import BreezeAvatarGroup from '@/Components/AvatarGroup.vue'
    import BreezeAvatar from '@/Components/Avatar.vue'

    import ShowName from '../../Partials/ShowName.vue'
    import ShowDescription from '../../Partials/ShowDescription.vue'
    import ShowVerifiers from '../../Partials/ShowVerifiers.vue'
    import ShowDate from '../../Partials/ShowDate.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeList,
            BreezeBadge,
            BreezeSectionBorder,
            BreezeSectionTitle,
            BreezeAccordion,
            BreezeAvatarGroup,
            BreezeAvatar,
            ShowName,
            ShowDescription,
            ShowVerifiers,
            ShowDate,
            Link,
        },

        props: ['rating'],

        data() {
            return {
                //
            }
        },

        methods: {
            //
        },
    }
</script>