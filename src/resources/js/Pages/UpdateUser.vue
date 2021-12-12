<template>
    <div>
        <div class="container">
            <div>
                <router-link class="float-right site-btn-over btn m-1" :to="{name: 'home'}">Close</router-link>
            </div>
            <h3>
                Update User
            </h3>
            <div v-if="selectedUser && selectedUser.id">
                <user-form :user="selectedUser"></user-form>
            </div>
        </div>
    </div>
</template>

<script>

import {mapState} from "vuex";
import UserForm from "../Forms/UserForm";
import {GET_USER} from "../store/actions/user.actions";

export default {
name: "UpdateUser",
    components: {
        UserForm,
    },
    computed: mapState({
        selectedUser: (state) => state.user.selectedUser,
    }),
    methods: {
        loadUser() {
            let id = this.$route.params.id

            if (id) {
                this.$store.dispatch(GET_USER, {id: id})
                    .catch(() => {
                        this.$router.push({name: 'notfound'});
                    });
            }
        }
    },
    created() {
        this.loadUser();
    }
}
</script>

<style scoped>

</style>
