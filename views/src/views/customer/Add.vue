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
                <li class="inline-block text-gray-600">新增</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden mt-5 shadow-sm bg-white">
            <div
                class="card-header p-4 md:py-3 border-b bg-gray-800 text-white"
            >
                <h1 class="text-xl">新增</h1>
            </div>
            <div class="card-body p-4">
                <form class="form-box w-full md:w-2/3 lg:w-1/2">
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
                            v-model.trim="create.code"
                            required
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
                            v-model.trim="create.name"
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
                            v-model.trim="create.tax"
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
                            v-model.trim="create.mobile"
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
                            v-model.trim="create.fax"
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
                            v-model.trim="create.address"
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
                            v-model.trim="create.contact"
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
                            v-model.trim="create.defective_rate"
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
                        <!-- <router-link
                            :to="{ name: 'CustomerList' }"
                            class="btn mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
                            >儲存</router-link> -->
                        <button
                            class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
                            type="button"
                            @click="cancelHandler"
                        >
                            取消
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
// import axios from "axios";
import { apiCustomerAdd } from "@/api/api.js";
export default {
    name: "addTool",
    // inject:['reload'],
    data() {
        return {
            create: {
                code: "",
                name: "",
                tax: "",
                mobile: "",
                fax: "",
                address: "",
                contact: "",
                defective_rate: ""
            }
        };
    },
    methods: {
        async saveHandler() {
            const data = {
                code: this.create.code,
                name: this.create.name,
                tax: this.create.tax,
                mobile: this.create.mobile,
                fax: this.create.fax,
                address: this.create.address,
                contact: this.create.contact,
                defective_rate: this.create.defective_rate
            };
            // console.log(data);
            // axios
            //     .post("http://127.0.0.1:8000/api/customer/create", data)
            // axios.post('http://139.162.107.53/api/customer/create',data)
            await apiCustomerAdd(data)
                .then(res => {
                    console.log(res.data);
                    console.log(data);
                    this.$router.push({
                        name: "CustomerList",
                        query: {
                            customeritem: data
                        }
                    });
                    // this.reload();
                    // console.log("已刷新");
                })
                .catch(err => {
                    console.log(err);
                });
        },
        cancelHandler() {
            this.create.code = "";
            this.create.name = "";
            this.create.tax = "";
            this.create.mobile = "";
            this.create.fax = "";
            this.create.address = "";
            this.create.contact = "";
            this.create.defective_rate = "";
        }
    }
};
</script>
