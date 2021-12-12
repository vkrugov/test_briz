<template>
    <div>
        <b-form @submit.prevent="submitUser" ref="signInForm" data-vv-scope="signInForm">
            <div class="row">
                <b-form-group label="Name" class="col-md-6">
                    <b-form-input
                        v-model="user.profile.name"
                        name="title"
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        :class="{'is-invalid' : errors.name}"
                        @input="delete errors.name"
                    >
                    </b-form-input>
                    <div class="invalid-feedback" v-if="errors.name">{{ errors.name }}</div>
                </b-form-group>
                <b-form-group label="Phone (UA)" class="col-md-6">
                    <b-form-input
                        v-model="user.profile.phone"
                        name="phone"
                        type="text"
                        class="form-control"
                        :class="{'is-invalid' : errors.phone}"
                        placeholder="Phone in UA format (+380...)"
                        @input="delete errors.phone"
                    >
                    </b-form-input>
                    <div class="invalid-feedback" v-if="errors.phone">{{ errors.phone }}</div>
                </b-form-group>
            </div>
            <div class="text-left mt-2">
                <b-button class="btn site-btn-over"
                          type="submit"
                >Submit
                </b-button>
            </div>
        </b-form>
    </div>
</template>

<script>
import {CREATE_USER, UPDATE_PROFILE} from "../store/actions/user.actions";

export default {
    name: "UserForm",
    props: {
        user: {
            required: true,
        }
    },
    data() {
        return {
            errors: {},
        };
    },
    methods: {
        setData() {
            let data = {
                name: this.user.profile.name,
                phone: this.user.profile.phone,
            }

            if (!_.isUndefined(this.user.id )) {
                return data
            }

            let formData = new FormData();

            for ( let key in data ) {
                formData.append(key, data[key]);
            }

            return formData;
        },
        submitUser() {
            let action = this.user.id ? UPDATE_PROFILE : CREATE_USER;

            this.$store.dispatch(action, {
                profile: this.setData(),
                id: this.user.id,
            }).then(() => {
                this.$dialog.alert('Success!').then(() => {
                    this.$router.push({name: 'home'})
                });
            }).catch(error => {
                if (!_.isEmpty(error.response.data.errors)) {
                    let errors = error.response.data.errors;
                    let localErrors = {}
                    for (let error in errors) {
                        localErrors[error] = errors[error][0];
                    }
                    this.errors = localErrors
                }
                this.$dialog.alert('Error !').then(() => {

                });
            }) ;
        },
    }
};
</script>

<style scoped>

</style>
