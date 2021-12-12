<template>
    <div class="container home-content">
        <h1>
            Users
        </h1>
        <div class="p-2 row">
            <div class="col-lg-7 mb-2">
                <b-input
                    placeholder="Input name of user"
                    @input="getUsers"
                    v-model="filter.user_search"
                />
            </div>
            <div class="col-lg-3 mb-2">
                <b-form-select
                    @change="getBySelect"
                    v-model="sort"
                    :options="options"
                    class="pull-right"
                    value-field="item"
                    text-field="name"
                    disabled-field="notEnabled"
                />
            </div>
            <div class="col-lg-2 mb-2">
                <router-link :to="{name: 'createUser'}" class="btn btn-block site-btn-over">
                    Create new
                </router-link>
            </div>
        </div>
        <div v-if="users.length" v-for="user in users" class="mb-2">
            <preview-user
                :user="user"
                @deleteUser="getUsers"
            ></preview-user>
        </div>
        <div>
            <nav>
                <ul class="pagination justify-content-center justify-content-lg-center">
                    <li v-if="userMeta.current_page > 1" userMeta.current_page class="cursor-pointer">
                        <span @click="getByPage(userMeta.current_page - 1)"
                              class="page-link"
                              aria-label="Previous"><span aria-hidden="true">«</span>
                        </span>
                    </li>
                    <li v-for="key in userMeta.last_page"
                        v-show="key >= userMeta.current_page - 2 && key <= userMeta.current_page + 2"
                        class="cursor-pointer cian-text"
                        :class="key === userMeta.current_page ? 'active-pagination' : ''">
                        <span class="page-link" @click="getByPage(key)"> {{ key }} </span>
                    </li>
                    <li v-if="userMeta.current_page < userMeta.last_page" class="cursor-pointer">
                        <span
                            @click="getByPage(userMeta.current_page + 1)"
                            aria-label="Next">
                            <span class="page-link" aria-hidden="true">»</span>
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>

import {mapState} from "vuex";
import {GET_USERS} from "../store/actions/user.actions";
import PreviewUser from '../components/PreviewUser';

export default {
    name: "Home",
    computed: mapState({
        users: (state) => state.user.users,
        userMeta: (state) => state.user.meta,
    }),
    components: {
        PreviewUser
    },
    data() {
        return {
            filter: {
                user_search: '',
            },
            sort: '-created_at',
            page: 1,
            options: [
                { item: '-created_at', name: 'From Newest'},
                { item: 'created_at', name: 'From Oldest' }
            ],
        }
    },
    methods: {
        getBySelect() {
            this.page = 1;
            this.getUsers();
        },
        getByPage(page) {
            this.page = page;
            this.getUsers();
        },
        getUsers()
        {
            this.$store.dispatch(GET_USERS, {
                filter: this.filter,
                sort: this.sort,
                page: this.page
            })
        }
    },
    mounted() {
        this.getUsers();
    }
}
</script>

