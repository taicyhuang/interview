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
                <li class="inline-block text-gray-600">明細</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div
                class="card-header p-4 md:py-3 border-b bg-gray-800 text-white"
            >
                <h1 class="text-xl">明細</h1>
            </div>
            <div class="card-body p-4">
                <form
                    class="form-box form-detail w-full md:w-2/3 lg:w-1/2"
                    v-for="(info, index) in newCustomerInfo"
                    :key="index"
                >
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            客戶編號
                        </label>
                        <div class="form-text">{{ info.code }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            客戶名稱
                        </label>
                        <div class="form-text">{{ info.name }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            統一編號
                        </label>
                        <div class="form-text">{{ info.tax }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            電話
                        </label>
                        <div class="form-text">{{ info.mobile }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            傳真
                        </label>
                        <div class="form-text">{{ info.fax }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            地址
                        </label>
                        <div class="form-text">{{ info.address }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            聯絡窗口
                        </label>
                        <div class="form-text">{{ info.contact }}</div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            容許不良率
                        </label>
                        <div class="form-text">{{ info.defective_rate }}</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
// import axios from "axios";
import { apiCustomerList } from "@/api/api.js";
export default {
    name: "addTool",
    data() {
        return {
            customerInfo: [],
            newCustomerInfo: [],
            id: ""
        };
    },
    created() {
        this.id = this.$route.query.id;
        console.log(this.id);
        this.detailInfoHandler();
    },
    methods: {
        async detailInfoHandler() {
            await apiCustomerList()
                .then(res => {
                    this.customerInfo = res.data.data;
                    this.newCustomerInfo = this.customerInfo.filter(
                        item => item.id == this.id
                    );
                    console.log(this.newCustomerInfo);
                })
                .catch(err => {
                    console.log(err);
                });
            // axios
            // // .post('http://139.162.107.53/api/customer')
            // .post("http://127.0.0.1:8000/api/customer")
            // .then(res => {
            //     this.customerInfo = res.data.data;
            //     this.newCustomerInfo = this.customerInfo.filter(item => item.id == this.id);
            //     console.log(this.newCustomerInfo)
            // })
            // .catch(err => {
            //     console.log(err);
            // });
        }
    }
};
</script>
