<template>
    <div class="container">
        <div>
            <router-link class="float-right site-btn-over btn m-1" :to="{name: 'home'}">Close</router-link>
        </div>
        <h3>
            Create new User
        </h3>
        <div>
            <user-form :user="user"></user-form>
        </div>
    </div>
</template>

<script>
import UserForm from "../Forms/UserForm";

export default {
name: "CreateUser",
    components: {
        UserForm,
    },
    data() {
        return {
            user: {
                profile: {
                    name: '',
                    phone: '',
                },
            }
        }
    }
}
</script>

<style scoped>

</style>
