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
                                <div>
                                    <BreezeApplicationLogo class="block h-12 w-auto" />
                                </div>

                                <div class="mt-8 text-2xl">
                                    Welcome to your Dashboard!
                                </div>

                                <div class="mt-6 text-gray-500">
                                    Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                                    to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                                    you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                                    ecosystem to be a breath of fresh air. We hope you love it.
                                </div>
                            </div>

                            <div class="grid grid-cols-2 text-sm text-left md:text-center text-gray-500 cursor-pointer uppercase">
                                <div class="px-5 py-3 transition duration-500 col-span-2 md:col-span-1 border-l-4 md:border-l-0 md:border-b-2" @click="content = 'assignments'" :class="content == 'assignments' ? 'border-indigo-400 text-indigo-400' : ''">
                                    <p>Мои оценивания</p>
                                </div>
                                <div class="px-5 py-3 transition duration-500 col-span-2 md:col-span-1 border-l-4 md:border-l-0 md:border-b-2" @click="content = 'confirmation'" :class="content == 'confirmation' ? 'border-indigo-400 text-indigo-400' : ''" v-if="confirmerContent">
                                    <p>Оценивание других сотрудников</p>
                                </div>
                            </div>

                            <div class="bg-gray-200 bg-opacity-25" v-if="content == 'assignments'">
                                <Link v-for="(assignment, i) in $page.props.assignments" class="grid grid-cols-1 md:grid-cols-9 gap-2 p-6 text-sm border-b-2 border-white text-gray-500 hover:bg-gray-100" :href="route('assignment.show', {'id': assignment.id})">
                                    <div class="md:col-span-1">
                                        {{ i + 1}}.
                                    </div>
                                    <div class="md:col-span-2">
                                        {{ assignment.assessment.name }}
                                    </div>
                                    <div class="md:col-span-4">
                                        {{ assignment.assessment.description }}
                                    </div>
                                    <div class="text-gray-400 underline">
                                        <p>{{ assignment.employement.department.name }}</p>
                                        <p>{{ assignment.employement.position.name }}</p>
                                    </div>
                                    <div>
                                        {{ assignment.score }}
                                    </div>
                                </Link>
                            </div>

                            <div class="bg-gray-200 bg-opacity-25" v-if="content == 'confirmation'">
                                <Link v-for="(confirmation, i) in $page.props.confirmations" class="grid grid-cols-1 md:grid-cols-10 p-6 text-sm border-b-2 border-white text-gray-500 hover:bg-gray-100" :href="route('confirmation.show', {'id': confirmation.id})">
                                    <div class="md:col-span-1">
                                        {{ i + 1}}.
                                    </div>
                                    <div class="md:col-span-1">
                                        {{ confirmation.assignment.user.name }}
                                    </div>
                                    <div class="md:col-span-2">
                                        {{ confirmation.assignment.assessment.name }}
                                    </div>
                                    <div class="md:col-span-4">
                                        {{ confirmation.assignment.assessment.description }}
                                    </div>
                                    <div class="text-gray-400 underline">
                                        <p>{{ confirmation.assignment.employement.department.name }}</p>
                                        <p>{{ confirmation.assignment.employement.position.name }}</p>
                                    </div> 
                                </Link>
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
