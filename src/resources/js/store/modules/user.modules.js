import {
    CREATE_USER, GET_USERS_SUCCESS, GET_USER_SUCCESS, DELETE_USER, GET_USERS, UPDATE_PROFILE, GET_USER,
} from "../actions/user.actions";

import api from "../../config";

const state = {
    users: [],
    meta: [],
    selectedUser: {},
    status: "",
};

const actions = {
    [GET_USERS]: ({commit}, payload) => {
        return new Promise((resolve, reject) => {
            let strParams = '?'
            let stringify = require('qs-stringify')
            strParams += stringify(payload);
            api.get('/users' + strParams)
                .then(({data}) => {
                    commit(GET_USERS_SUCCESS, data);
                    resolve();
                })
                .catch(err => {
                    reject(err);
                })
        });
    },
    [GET_USER]: ({commit}, payload) => {
        return new Promise((resolve, reject) => {
            api.get('/users/' + payload.id)
                .then(({data}) => {
                    commit(GET_USER_SUCCESS, data);
                    resolve();
                })
                .catch(err => {
                    reject(err);
                })
        });
    },
    [UPDATE_PROFILE]: ({commit, rootState}, payload) => {
        return new Promise((resolve, reject) => {
            let userId = payload.id
            let profile = payload.profile
            api.patch("users/" + userId + "/profile", profile)
                .then(({data}) => {
                    resolve(data);
                })
                .catch(err => {
                    reject(err);
                })
        });
    },
    [DELETE_USER]: ({commit}, payload) => {
        return new Promise((resolve, reject) => {
            let url = '/users/' + payload.id;
            api.delete(url)
                .then(({data}) => {
                    resolve(data);
                })
                .catch(err => {
                    reject(err);
                })
        });
    },
    [CREATE_USER]: ({rootState, commit}, payload) => {
        return new Promise((resolve, reject) => {
            let url = '/users';
            api.post(url, payload.profile)
                .then(({data}) => {
                    resolve(data);
                })
                .catch(err => {
                    reject(err);
                })
        });
    },
};

const mutations = {
    [GET_USER_SUCCESS]: (state, data) => {
        state.selectedUser = data.user;
    },
    [GET_USERS_SUCCESS]: (state, data) => {
        state.users = data.users;
        state.meta = data.meta;
    },
};

export default {
    state,
    actions,
    mutations,
}
