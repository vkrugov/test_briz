import VueRouter from "vue-router";

import Home from "./Pages/Home";
import NotFound from "./components/NotFound";
import CreateUser from "./Pages/CreateUser";
import UpdateUser from "./Pages/UpdateUser";

const router =  new VueRouter ({
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home',
        },
        {
            path: "/create-user",
            component: CreateUser,
            name: "createUser",
        },
        {
            path: "/update-user/:id",
            component: UpdateUser,
            name: "updateUser",
        },
        {
            path: '/*',
            component: NotFound,
            name: 'notfound',
        },
    ],
    mode: 'history'
});


export default router
