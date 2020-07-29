<template>
    <div class="container ">
        <h3 class="text-center mb-3">Add new Package</h3>
        <form class="w-full max-w-sm mx-auto px-4" @submit.prevent="addPack">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Title
                </label>
                </div>
                <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="pack.title" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Description
                </label>
                </div>
                <div class="md:w-2/3">

                <textarea class="resize-y border rounded focus:outline-none focus:shadow-outline bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="pack.description"></textarea>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Link
                </label>
                </div>
                <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="pack.link" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Add
                </button>
                </div>
            </div>
        </form>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                pack: {}
            }
        },
        methods: {
            addPack() {

                this.axios
                    .post('http://localhost:8000/api/package/store', this.pack)
                    .then(response => (
                        this.$router.push({name: 'home'}),
                        this.$swal("Success! Pack added successfully!", {
                        icon: "success",
                    })
                    )).catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
