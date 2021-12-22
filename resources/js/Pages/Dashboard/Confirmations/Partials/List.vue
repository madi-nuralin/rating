<template>
    <div class="w-full mt-5 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 gap-0 sm:gap-6">
        <Link class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 sm:rounded-md font-semibold text-xs uppercase text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" v-for="(confirmation, i) in confirmations" :href="route('confirmation.show', {'id': confirmation.id})">
            <div class="flex flex-row sm:flex-col items-center h-full text-left sm:text-center">
                <div class="flex-shrink">
                    <img :src="'https://ui-avatars.com/api/?name=' + confirmation.assignment.assessment.name + '&color=FFFFFF&background=0873EB'" class="object-contain rounded-md pointer-events-none sm:m-2 w-20 h-20">
                </div>
                
                <div class="flex items-center h-full ml-2 sm:ml-0">
                    <p class="sm:p-2">
                        {{ confirmation.assignment.assessment.name }}
                    </p>
                </div>
            </div>
        </Link>
    </div>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            Link,
        },

        props: ['confirmations'],
    }
</script>