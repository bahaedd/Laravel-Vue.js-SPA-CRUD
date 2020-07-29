<template>
    <div>
        <h3 class="text-center">Laravel Packages</h3><br/>

        <table class="table-fixed">
            <thead>
            <tr>
                <th class="border w-1/1 px-4 py-2">ID</th>
                <th class="border w-1/1 px-4 py-2">Title</th>
                <th class="border w-1/4 px-4 py-2">Description</th>
                <th class="border w-1/1 px-2 py-2">Link</th>
                <th class="border w-1/1 px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pack in packs" :key="pack.id">
                <td class="border px-4 py-2">{{ pack.id }}</td>
                <td class="border px-4 py-2">{{ pack.title}}</td>
                <td class="border px-4 py-2">{{ pack.description }}</td>
                <td class="border px-4 py-2">{{ pack.link }}</td>
                <td class="border px-4 py-2">
                    <div class="inline-flex" role="group">
                        <router-link :to="{name: 'edit', params: { id: pack.id }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Edit
                        </router-link>
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" @click="deleteBook(pack.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                packs: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/packages')
                .then(response => {
                    this.packs = response.data;
                });
        },
        methods: {
            deleteBook(id) {
                this.axios
                    .delete(`http://localhost:8000/api/package/destroy/${id}`)
                    .then(response => {
                        let i = this.packs.map(item => item.id).indexOf(id); // find index of your object
                        this.packs.splice(i, 1);
                        this.$swal("Success! Pack deleted successfully!", {
                        icon: "error",
                    });
                    });
            }
        }
    }
</script>
