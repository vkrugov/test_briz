<template>
<div>
    <div class="row m1-2 block-shadow">
        <div class="col-lg-6">
            <div>
                <strong>Name</strong>
            </div>
            <span>{{ user.profile.name }}</span>
        </div>
        <div class="col-lg-2">
            <div>
                <strong>Phone:</strong>
            </div>
            <span>{{ user.profile.phone }}</span>
        </div>
        <div class="col-lg-3 text-center">
            <div class="actions">
                <strong>Actions:</strong>
                <div class="cian-text">
                    <span class="cursor-pointer site-link" data-title="Delete">
                        <b-icon icon="trash" aria-hidden="true"
                                v-confirm="{
                                loader: true,
                                ok: dialog => deleteUser(dialog, user.id),
                                cancel: null,
                                message: 'Are you sure?'
                        }"/>
                    </span>
                    <span class="cursor-pointer" data-title="Edit">
                        <router-link class="" :to="{name: 'updateUser', params: {id: user.id}}">
                            <b-icon icon="pencil" aria-hidden="true"/>
                        </router-link>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>


import {DELETE_USER} from "../store/actions/user.actions";

export default {
name: "PreviewUser",
    props: {
        user: {
            required: true,
        }
    },
    methods: {
        deleteUser(dialog, id) {
            this.$store.dispatch(DELETE_USER, {
                id: id
            }).then(() => {
                dialog.close()
                this.$emit('deleteUser');
            }).catch(() => {
                    dialog.close();
                    alert('Something went wrong. Try reload page');
                }
            );
        }
    }
}
</script>
