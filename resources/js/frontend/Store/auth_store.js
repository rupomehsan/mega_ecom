
import { defineStore } from "pinia";

export const auth_store = defineStore("auth_store", {
    state: () => ({
        is_auth: 0,
        auth_info: {},
        role: {},
    }),
    getters: {},
    actions: {
        user_login: async function (data) {
            let formData = new FormData(data);
            let response = await axios.post('/login', formData)
            if (response.data?.status === "success") {
                window.s_alert(response.data?.message);
                localStorage.setItem("token", response.data?.data?.access_token);
                window.location.href = "/profile";
            }
        },
        set_is_auth: function (status) {
            this.is_auth = status;
        },
        log_out: async function () {
            var data = await window.s_confirm("Are you sure want to logout?")
            if (data) {
                localStorage.removeItem("token");
                return (location.href = "/login");
            }
        },
        check_is_auth: async function () {
            let response = await window.privateAxios("/check_user");
            if (response.status == 'success') {
                this.auth_info = response.data;
                this.is_auth = 1;
                this.role = response.data.role;
            }
        },

    },
});
