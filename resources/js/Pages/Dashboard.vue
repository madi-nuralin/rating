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

                            <div class="bg-gray-200 bg-opacity-25 flex justify-end flex-col md:flex-row text-sm text-left md:text-center text-gray-500 cursor-pointer">
                                <div class="px-2 py-3 transition duration-500 border-b-2" @click="content = 'assignments'" :class="content == 'assignments' ? 'border-indigo-400 text-indigo-400' : ''">
                                    <p>Мои задания</p>
                                </div>
                                <div class="px-2 py-3 transition duration-500 border-b-2" @click="content = 'confirmation'" :class="content == 'confirmation' ? 'border-indigo-400 text-indigo-400' : ''">
                                    <p>Оценивания для подтверждения</p>
                                </div>
                            </div>

                            <div class="bg-gray-200" v-if="content == 'assignments'">
                                <Link v-for="(assignment, i) in $page.props.assignments" class="grid grid-cols-1 md:grid-cols-3 p-6 text-sm text-gray-500 hover:bg-gray-100" :href="route('assignment.show', {'id': assignment.id})">
                                    <div>
                                        {{ assignment.assessment.name }}
                                    </div>
                                    <div>
                                        {{ assignment.assessment.description }}
                                    </div>
                                    <div class="text-gray-400 underline">
                                        <p>{{ assignment.employement.department.name }}</p>
                                        <p>{{ assignment.employement.position.name }}</p>
                                    </div>
                                </Link>
                            </div>

                            <div class="bg-gray-200" v-if="content == 'confirmation'">
                                <Link v-for="(confirmation, i) in $page.props.confirmations" class="grid grid-cols-1 md:grid-cols-4 p-6 text-sm text-gray-500 hover:bg-gray-100" :href="route('confirmation.show', {'id': confirmation.id})">
                                    <div>
                                        {{ confirmation.assignment.user.name }}
                                    </div>
                                    <div>
                                        {{ confirmation.assignment.assessment.name }}
                                    </div>
                                    <div>
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
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeApplicationLogo,
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
}
</script>
