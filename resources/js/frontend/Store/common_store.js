import { defineStore } from "pinia";

export const common_store = defineStore("common_store", {
    state: () => ({
        all_cart_data: [],
        all_wish_list_data: [],
        all_compare_list_data: [],
        navbar_menu_data: [],
        website_settings_data: {},
        total_cart_price: 0,
        preloader: false,
        fields: ['title', 'external_link']
    }),

    actions: {
        //cart
        //cart
        get_all_cart_data: async function () {
            let token = localStorage.getItem('token');
            if (token) {
                this.total_cart_price = 0;
                let response = await window.privateAxios(`/get-cart-items?get_all=1`);
                if (response.status == "success") {
                    this.all_cart_data = response.data;
                    if (this.all_cart_data) {
                        let itemTotal = this.all_cart_data.map(
                            (item) => item.quantity * item.product?.current_price
                        );
                        itemTotal.forEach((item2) => {
                            this.total_cart_price = this.total_cart_price + item2;
                        });
                    }
                }
            }
        },

        add_to_cart: async function (productId) {
            console.log(productId);
            const response = await window.privateAxios(`/add-to-cart`, 'post',
                {
                    product_id: productId,
                }
            );

            if (response?.status === "success") {
                window.s_alert(response.message);
                this.get_all_cart_data();
            }

        },

        cart_quantity_update: async function (cartId, action, quantity) {
            const response = await axios.post(
                `/update-cart-item-quantity`,
                {
                    cartId,
                    action,
                    quantity,
                }
            );

            if (response.data.status === "success") {
                window.s_alert(response.data.message);
                this.get_all_cart_data();
            }
            if (response.data.status === "warning") {
                window.w_alert(response.data.message);
            }
        },

        remove_cart_item: async function (cartId) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete(
                    `/remove-cart-item/${cartId}`
                );
                if (response.data.status == "success") {
                    window.s_alert(response.data.message);
                    this.get_all_cart_data();
                }
            }
        },

        //wishlist
        //wishlist
        get_all_wish_list_items: async function () {
            this.total_cart_price = 0;
            let response = await window.privateAxios(`/get-wish-list-items?get_all=1`);
            if (response.status == "success") {
                this.all_wish_list_data = response.data;
            }
        },
        add_to_wish_list: async function (productId) {
            const response = await window.privateAxios(`/add-to-wish-list`, 'post',
                {
                    product_id: productId,
                }
            );

            if (response.status === "success") {
                window.s_alert(response.message);
            }

            if (response.status === "warning") {
                window.w_alert(response.message);
            }
        },
        remove_wish_list_item: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await window.privateAxios(`/remove-wish-list-item/${id}`, 'delete');
                if (response.status == "success") {
                    window.s_alert(response.message);
                    this.get_all_wish_list_items();
                }
            }
        },

        //comparelist
        //comparelist
        get_all_compare_list_items: async function () {
            let response = await window.privateAxios(`/get-compare-list-items?get_all=1`);
            if (response.status == "success") {
                this.all_compare_list_data = response.data;
            }
        },
        add_to_compare_list: async function (productId) {
            const response = await window.privateAxios(`/add-to-compare-list`, 'post',
                {
                    product_id: productId,
                }
            );

            if (response.status === "success") {
                window.s_alert(response.data.message);
            }

            if (response.status === "warning") {
                window.w_alert(response.data.message);
            }
        },
        remove_compare_list_item: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await window.privateAxios(`/remove-compare-list-item/${id}`, 'delete');
                if (response.status == "success") {
                    window.s_alert(response.message);
                    this.get_all_compare_list_items();
                }
            }
        },

        //website settigns
        //website settigns
        get_all_website_settings: async function () {
            this.preloader = true;
            try {
                let response = await axios.get(`/get-website-settings`);
                if (response.data.status == "success") {
                    this.website_settings_data = response.data.data;
                }
            } finally {
                this.preloader = false;
            }

        },


        get_setting_value: function (key, multiple = false) {
            this.preloader = true;
            try {
                if (!multiple) {
                    let data = ''
                    let value = this.website_settings_data.find(item => item.title === key);
                    if (value && value.setting_values.length > 0) {
                        data = value.setting_values[0].value
                        this.preloader = false;
                    }
                    return data
                } else {
                    let values = this.website_settings_data.filter(item => item.title === key);
                    if (values && values.length > 0) {
                        return values[0].setting_values;
                        this.preloader = false;
                    }
                    return [];
                }
            } catch (error) {
                // console.error(error.message);
            }
        },

        //navbar_menu
        //navbar_menu
        get_all_website_navbar_menu: async function () {
            let fieldsQueryString = this.fields.map((field, index) => `fields[${index}]=${field}`).join('&');
            let response = await axios.get(`/navbar-menus?get_all=1&${fieldsQueryString}`);
            if (response.data.status == "success") {
                this.navbar_menu_data = response.data.data;
            }
        },

    },
});
