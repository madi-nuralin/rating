<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-0 bg-white border-b border-gray-200">
                        <div>
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                                <div class="flex">
                                    <!--BreezeApplicationLogo class="block h-12 w-auto" /-->
                                    <img :src="$page.props.auth.user.profile_photo_path" class="w-12 h-12 rounded-full shadow" />
                                    <div class="ml-8 flex flex-col">
                                        <div class="text-2xl">
                                            Welcome to your Dashboard!
                                        </div>
                                        <div class="text-sm text-gray-500">
                                           {{ $page.props.auth.user.name }}, {{ $page.props.auth.user.email }}
                                        </div>
                                    </div>
                                </div>

                                <!--div class="mt-8 text-2xl">
                                    Welcome to your Dashboard!
                                </div-->

                                <!--div class="mt-6 text-gray-500">
                                    Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                                    to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                                    you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                                    ecosystem to be a breath of fresh air. We hope you love it.
                                </div-->
                            </div>

                            <div class="flex flex-col md:flex-row md:justify-center w-full md:w-auto text-xs text-left md:text-center text-gray-400 cursor-pointer uppercase">
                                <div class="px-5 py-3 md:flex md:flex-col md:justify-center md:items-center transition duration-500 col-span-2 md:col-span-1 border-l-4 md:border-l-0 md:border-b-2" @click="content = 'assignments'" :class="content == 'assignments' ? 'border-indigo-400 text-indigo-400' : ''">
                                    <svg class="w-5 h-5 hidden _md:block"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/>
                                        <circle cx="12" cy="10" r="3"/>
                                        <circle cx="12" cy="12" r="10"/>
                                    </svg>
                                    <p class="md:pt-2 font-semibold">Мои оценивания</p>
                                </div>
                                <div class="px-5 py-3 md:flex md:flex-col md:justify-center md:items-center transition duration-500 col-span-2 md:col-span-1 border-l-4 md:border-l-0 md:border-b-2"  @click="content = 'confirmation'" :class="content == 'confirmation' ? 'border-indigo-400 text-indigo-400' : ''" v-if="confirmerContent">
                                    <svg class="w-5 h-5 hidden _md:block" 
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                                    </svg>
                                    <p class="md:pt-2 font-semibold">Оценивание других сотрудников</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 overflow-hidden" style="min-height: 900px;">
                    <div class="p-0 border-b border-gray-200">
                        <div>

                            <div class="bg-gray-200 bg-opacity-25" v-if="content == 'assignments'">
                                <template v-if="$page.props.assignments.length <= 0">
                                    No items found
                                </template>
                                <template v-else>
                                    <Link v-for="(assignment, i) in $page.props.assignments" class="flex flex-col md:flex-row p-6 sm:px-20 text-sm border-b border-gray-200 text-gray-500 hover:bg-gray-100" :href="route('assignment.show', {'id': assignment.id})">
                                        <div>
                                            <p class="pr-4">{{ i + 1 }}</p>
                                        </div>
                                        <div>
                                            <p>{{ assignment.assessment.name }}</p>
                                            <p>{{ assignment.assessment.description }}</p>
                                            <p>{{ assignment.employement.department.name }}</p>
                                            <p>{{ assignment.employement.position.name }}</p>
                                            <p>{{ assignment.score }} баллов</p>
                                        </div>
                                    </Link>
                                </template>
                            </div>

                            <div class="bg-gray-200 bg-opacity-25" v-if="content == 'confirmation'">
                                <template v-if="$page.props.confirmations.length <= 0">
                                    No items found
                                </template>
                                <template v-else>
                                    <Link v-for="(confirmation, i) in $page.props.confirmations" class="flex flex-col md:flex-row p-6 sm:px-20 text-sm border-b border-gray-200 text-gray-500 hover:bg-gray-100" :href="route('confirmation.show', {'id': confirmation.id})">
                                        <div>
                                            <p class="pr-4">{{ i + 1 }}</p>
                                        </div>
                                        <div>
                                            <p>{{ confirmation.assignment.assessment.name }}</p>
                                            <p>{{ confirmation.assignment.assessment.description }}</p>
                                            <p>{{ confirmation.assignment.employement.department.name }}</p>
                                            <p>{{ confirmation.assignment.employement.position.name }}</p>
                                            <p>{{ confirmation.assignment.user.name }}</p>
                                            <p>{{ confirmation.assignment.score }} баллов</p>
                                        </div>
                                    </Link>
                                </template>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeCheckbox from '@/Components/Checkbox'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeApplicationLogo,
        BreezeCheckbox,
        Link,
        Head,
    },

    data() {
        return {
            content: 'assignments'
        };
    },

    methods: {
        gridClass(v) {
            switch (v % 4) {
                case 1:
                    return 'p-6';
                case 2:
                    return 'p-6 border-t border-gray-200 md:border-t-0 md:border-l';
                case 3:
                    return 'p-6 border-gray-200';
                case 4:
                    return 'p-6 border-gray-200 md:border-l';
                default:
                    break;
            }
        }
    },
    computed: {
        confirmerContent() {
            var roles = this.$page.props.auth.user.roles;
            if (roles) {
                for (var i=0; i < roles.length; ++i) {
                    if (roles[i].context == 'confirmer') {
                        return true;
                    }
                }
            }
            return false;
        }
    }
}
</script>
