<template>
    <div class="col-8 offset-2">
        <form id="contact">
            <div class="form-group mb-3">
                <label for="name">Name: </label>
                <input type="text" class="form-control" id="name" v-model="name">
            </div>
            <div class="form-group mb-3">
                <label for="surname">Surname: </label>
                <input type="text" class="form-control" id="surname" v-model="surname">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email: </label>
                <input type="email" class="form-control" id="email" v-model="email">
            </div>
            <div class="form-group mb-3">
                <label for="content">Content: </label>
                <textarea class="form-control" id="content" v-model="content"></textarea>
            </div>
            <div class="form-group mb-3 text-center">
                <button @click="saveContact" type="button" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "ContactComponent",
    methods: {
        saveContact: function () {

        }
    },
    data: function () {
        return {
            name: '',
            surname: '',
            email: '',
            content: ''
        }
    },
}
</script>

<style scoped>

</style>
