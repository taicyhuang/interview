<template>
    <div class="">
        <div class="flex justify-between items-center mb-3 md:mt-2 md:mb-6">
            <a
                href="javascript:history.back()"
                class="btn btn-back border border-gray-500 bg-white-300 hover:bg-gray-500 text-gray-800 rounded focus:outline-none focus:shadow-outline"
                ><i class="fas fa-chevron-left mr-2"></i>返回</a
            >
            <ul class="breadcrumbs ml-auto">
                <router-link
                    :to="{ name: 'Home' }"
                    tag="li"
                    class="inline-block cursor-pointer"
                    >首頁</router-link
                >
                <li class="inline-block">客戶列表</li>
                <li class="inline-block text-gray-600">修改</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden mt-5 shadow-sm bg-white">
            <div
                class="card-header p-4 md:py-3 border-b bg-gray-800 text-white"
            >
                <h1 class="text-xl">修改</h1>
            </div>
            <div class="card-body p-4">
                <form class="form-box w-full md:w-2/3 lg:w-1/2">
                    <input type="hidden" name="id" value="36" />
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0 required"
                        >
                            客戶編號
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="code"
                            v-model.trim="edit.code"
                            required
                            disabled
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0 required"
                        >
                            客戶名稱
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="name"
                            v-model.trim="edit.name"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            統一編號
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="tax"
                            v-model.trim="edit.tax"
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            電話
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="mobile"
                            v-model.trim="edit.mobile"
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            傳真
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="fax"
                            v-model.trim="edit.fax"
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            地址
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="address"
                            v-model.trim="edit.address"
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            聯絡窗口
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="contact"
                            v-model.trim="edit.contact"
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0 required"
                        >
                            容許不良率
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                            name="defective_rate"
                            v-model.trim="edit.defective_rate"
                            required
                        />
                    </div>
                    <div class="form-btn flex w-full sm:pl-32">
                        <button
                            class="btn mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
                            @click.prevent="saveHandler"
                        >
                            儲存
                        </button>
                        <router-link
                            :to="{ name: 'CustomerList' }"
                            class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
                            type="button"
                        >
                            取消
                        </router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
// import axios from "axios";
import { apiCustomerList, apiCustomerEdit } from "@/api/api.js";
export default {
    name: "customerEdit",
    data() {
        return {
            edit: {
                code: "",
                name: "",
                tax: "",
                mobile: "",
                fax: "",
                address: "",
                contact: "",
                defective_rate: ""
            },
            filterInfo: ""
        };
    },
    created() {
        this.id = this.$route.query.id;
        this.getInfo();
    },
    methods: {
        // TODO::後端API要改JSON檔案給我
        async getInfo() {
            await apiCustomerList()
                .then(res => {
                    this.getInfo = res.data.data;
                    this.filterInfo = this.getInfo.filter(
                        item => item.id == this.id
                    );
                    // console.log(this.filterInfo);
                    this.edit.id = this.filterInfo[0].id;
                    this.edit.code = this.filterInfo[0].code;
                    this.edit.name = this.filterInfo[0].name;
                    this.edit.tax = this.filterInfo[0].tax;
                    this.edit.mobile = this.filterInfo[0].mobile;
                    this.edit.fax = this.filterInfo[0].fax;
                    this.edit.address = this.filterInfo[0].address;
                    this.edit.contact = this.filterInfo[0].contact;
                    this.edit.defective_rate = this.filterInfo[0].defective_rate;
                })
                .catch(err => {
                    console.log(err);
                });
            // axios
            //     // .post('http://139.162.107.53/api/customer')
            //     .post("http://127.0.0.1:8000/api/customer")
            //     .then(res => {
            //         this.getInfo = res.data.data;
            //         this.filterInfo = this.getInfo.filter(
            //             item => item.id == this.id
            //         );
            //         // console.log(this.filterInfo);
            //         this.edit.id = this.filterInfo[0].id;
            //         this.edit.code = this.filterInfo[0].code;
            //         this.edit.name = this.filterInfo[0].name;
            //         this.edit.tax = this.filterInfo[0].tax;
            //         this.edit.mobile = this.filterInfo[0].mobile;
            //         this.edit.fax = this.filterInfo[0].fax;
            //         this.edit.address = this.filterInfo[0].address;
            //         this.edit.contact = this.filterInfo[0].contact;
            //         this.edit.defective_rate = this.filterInfo[0].defective_rate;
            //     })
            //     .catch(err => {
            //         console.log(err);
            //     });
        },
        async saveHandler() {
            const data = {
                id: this.id,
                code: this.edit.code,
                name: this.edit.name,
                tax: this.edit.tax,
                mobile: this.edit.mobile,
                fax: this.edit.fax,
                address: this.edit.address,
                contact: this.edit.contact,
                defective_rate: this.edit.defective_rate
            };
            console.log(data);
            await apiCustomerEdit(data)
                .then(res => {
                    console.log(res.data);
                    this.$router.push({
                        name: "CustomerList",
                        query: {
                            customeritem: data
                        }
                    });
                })
                .catch(err => {
                    console.log(err);
                });
            // axios
            //     // .post('http://139.162.107.53/api/customer/update',data)
            //     .post("http://127.0.0.1:8000/api/customer/update", data)
            //     .then(res => {
            //         console.log(res.data);
            //         this.$router.push({
            //             name: "CustomerList",
            //             query: {
            //                 customeritem: data
            //             }
            //         });
            //     })
            //     .catch(err => {
            //         console.log(err);
            //     });
        }
    }
};
</script>
