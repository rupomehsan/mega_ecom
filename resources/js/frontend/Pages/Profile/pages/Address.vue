<template>
    <ProfileLayout :bread_cumb="bread_cumb">
        <div class="dashboard">
            <div class="page-title">
                <h2>
                    Edit Address
                </h2>
            </div>
            <div class="box-account box-info">
                <form action="" method="post" @submit.prevent="addressFormSubmitHandler($event)"
                    enctype="multipart/form-data" class="form-horizontal">
                    <input type="text" name="id" :value="user_address_info.id" class="d-none" />
                    <div class="form-group required">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" :value="user_address_info.address"
                            placeholder="Address" class="form-control" />
                    </div>
                    <div class="form-group required">
                        <label for="country_id">Country</label>
                        <select name="country_id" id="country_id" class="form-control">
                            <option value=""> --- Please Select --- </option>
                            <option selected value="216">Bangladesh</option>
                        </select>
                    </div>
                    <div class="form-group required">
                        <label for="state_division_id">Division</label>
                        <select name="state_division_id" id="state_division_id" class="form-control"
                            v-model="state_division_id">
                            <option value=""> --- Please Select --- </option>
                            <option v-for="(division, index) in divisions" :key="index" :value="division.id"
                                :selected="division.id == user_address_info?.state_division_id ? 'selected' : ''">{{
        division.name }}</option>
                        </select>
                    </div>
                    <div class="form-group required">
                        <label for="district_id">District</label>
                        <select name="district_id" id="district_id" class="form-control" v-model="district_id"
                            :disabled="isSelectDistrictDisabled">
                            <option value=""> --- Please Select --- </option>
                            <option v-for="(district, index) in districts" :key="index" :value="district.id"
                                :selected="false">{{ district.name }}</option>
                        </select>
                    </div>

                    <div class="form-group required">
                        <label for="station_id">Station</label>
                        <select name="station_id" id="station_id" class="form-control" v-model="station_id"
                            :disabled="isSelectStationDisabled">
                            <option value=""> --- Please Select --- </option>
                            <option v-for="(station, index) in stations" :key="index" :value="station.id"
                                :selected="false">{{ station.name }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Continue</button>
                </form>
            </div>
        </div>
    </ProfileLayout>
</template>

<script>
import axios from "axios";
import ProfileLayout from "../shared/ProfileLayout.vue";
import { auth_store } from "../../../Store/auth_store.js";

export default {
    components: { ProfileLayout },
    props: {
        user_address: Object,
    },
    data: () => ({
        user_address_info: {},
        bread_cumb: [
            {
                title: 'profile',
                url: '/profile',
                active: false,
            },
            {
                title: 'address',
                url: '/profile/address',
                active: true,
            },
        ],

        isSelectDistrictDisabled: true,
        isSelectStationDisabled: true,

        divisions: null,
        districts: null,
        stations: null,

        state_division_id: '',
        district_id: '',
        station_id: '',


    }),
    created: async function () {
        const authStore = auth_store();
        await this.all_division();
        await authStore.check_is_auth();
        if (authStore.auth_info) {
            this.user_address_info = authStore.auth_info?.user_delivery_address
            this.state_division_id = this.user_address_info?.state_division_id
            this.district_id = this.user_address_info?.district_id
            this.station_id = this.user_address_info?.station_id
        }
    },
    watch: {
        state_division_id: function (divisionId) {
            this.get_district_by_state_division_id(divisionId);
        },
        district_id: function (districtId) {
            this.get_station_by_district_id(districtId);
        }
    },
    methods: {
        addressFormSubmitHandler: async function (event) {
            let formData = new FormData(event.target);
            let response = await window.privateAxios('/customers/address-info-update', 'post', formData);
            if (response.status === "success") {
                window.s_alert(response.message);
            }
        },

        all_division: async function () {
            let response = await axios.get('/state-divisions', {
                params: {
                    sort_by_col: 'id',
                    sort_type: 'asc',
                    status: 'active',
                    fields: ['id', 'name'],
                    get_all: 1,
                }
            })
            if (response.data.status === 'success') {
                this.divisions = response.data.data
            }
        },
        get_district_by_state_division_id: async function (state_division_id) {
            let response = await axios.get(`/get-district-by-division-id/${state_division_id}`, {
                params: {
                    sort_by_col: 'id',
                    sort_type: 'asc',
                    status: 'active',
                    fields: ['id', 'name']
                }
            })
            if (response.data.status === 'success') {
                this.districts = response.data.data
                this.isSelectDistrictDisabled = false;
            }

        },
        get_station_by_district_id: async function (district_id) {
            let response = await axios.get(`/get-station-by-district-id/${district_id}`, {
                params: {
                    sort_by_col: 'id',
                    sort_type: 'asc',
                    status: 'active',
                    fields: ['id', 'name']
                }
            })
            if (response.data.status === 'success') {
                this.stations = response.data.data
                this.isSelectStationDisabled = false;
            }

        }
    },


};
</script>

<style></style>
