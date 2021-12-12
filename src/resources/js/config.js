import axios from 'axios'
import toastr from "toastr";

toastr.options.closeButton = true;
toastr.options.positionClass = 'toast-top-center';

const api = axios.create({
    baseURL: process.env.MIX_APP_URL ? process.env.MIX_APP_URL :
        'http://test_briz.loc/api/',
    timeout: 10000,
    params: {}
});

api.interceptors.request.use(function (config) {
    const token = localStorage.getItem("token");
    if (token) {
        config.headers['Authorization'] = 'Bearer ' + token;
    }

    const cartToken = localStorage.getItem("cartToken");

    if (cartToken) {
        config.headers['Cart-Token'] = cartToken;
    }

    config.headers['Content-Type'] = 'application/json';


    return config;
}, function (err) {
    return Promise.reject(err)
});

api.interceptors.response.use(function (res) {
    let resCartToken = res.headers['cart-token'];
    if (resCartToken) {
        localStorage.setItem('cartToken', resCartToken);
    }

    return res;
}, function (error) {
    return Promise.reject(error);
})

export default api
