<template>
    <div class="">
        <div class="flex justify-between items-center mb-3 md:mt-2 md:mb-6">
            <!-- TODO:麵包屑 -->
            <ul class="breadcrumbs ml-auto">
                <li
                    :to="{ name: 'Home' }"
                    tag="li"
                    class="inline-block cursor-pointer"
                >
                    首頁
                </li>
                <li class="inline-block text-gray-600">客戶列表</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div
                class="card-header p-4 md:py-3 border-b bg-gray-800 text-white"
            >
                <h1 class="text-xl">客戶列表</h1>
            </div>
            <div class="card-body p-4">
                <div
                    class="control-box mb-4 flex justify-between flex-col sm:flex-row"
                >
                    <div class="mb-2 sm:mb-0">
                        <router-link
                            :to="{ name: 'CustomerAdd' }"
                            class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white rounded inline-block cursor-pointer"
                            >新增</router-link
                        >
                    </div>
                    <div class="search-box flex flex-col sm:flex-row">
                        <div
                            class="form-group mr-0 sm:mr-2 mb-2 sm:mb-0 w-full sm:w-40"
                        >
                            <input
                                class="form-control border rounded text-gray-700 w-full focus:outline-none focus:shadow-outline"
                                id="username"
                                type="text"
                                placeholder="輸入客戶編碼/客戶名稱"
                                v-model.trim="search.input"
                            />
                        </div>
                        <button
                            class="btn btn-search w-full sm:w-16 bg-orange-500 hover:bg-orange-700 text-white rounded"
                            @click.prevent="searchHandler"
                        >
                            搜尋
                        </button>
                    </div>
                </div>
                <div class="table-box">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="table-index">#</th>
                                <th class="sticky text-gray-700">
                                    客戶編碼
                                </th>
                                <th class="sticky text-gray-700">客戶名稱</th>
                                <th class="sticky text-gray-700">電話</th>
                                <th class="sticky text-gray-700">傳真</th>
                                <th class="sticky text-gray-700">聯絡窗口</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="customerList.length > 0">
                                <tr
                                    v-for="(customerItem, index) in resultList"
                                    :key="index"
                                >
                                    <td class="table-index">{{ index + 1 }}</td>
                                    <td>{{ customerItem.code }}</td>
                                    <td>{{ customerItem.name }}</td>
                                    <td>{{ customerItem.mobile }}</td>
                                    <td>{{ customerItem.fax }}</td>
                                    <td>{{ customerItem.contact }}</td>
                                    <td class="control-box control-xl">
                                        <button
                                            class="btn btn-detail bg-teal-500 hover:bg-teal-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                            @click.prevent="
                                                detailHandler(customerItem.id)
                                            "
                                        >
                                            明細
                                        </button>
                                        <button
                                            class="btn btn-edit bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                            @click.prevent="
                                                editHandler(customerItem.id)
                                            "
                                        >
                                            修改
                                        </button>
                                        <!-- <router-link
                                            :to="{ name: 'CustomerEdit' }"
                                            class="btn btn-edit bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                            >修改</router-link
                                        > -->
                                        <router-link
                                            :to="{ name: 'ProductList' }"
                                            class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                            >產品</router-link
                                        >
                                        <button
                                            class="btn btn-delete bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                            @click.prevent="
                                                deleteHandler(customerItem.id)
                                            "
                                        >
                                            刪除
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="7">目前無資料</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <ul class="page-box flex mt-4">
                        <li class="page-item border rounded mr-2">
                            <a class="page-link py-1 px-3 block" href="#"
                                >&laquo;</a
                            >
                        </li>
                        <li
                            class="page-item border rounded mr-2 bg-blue-500 text-white"
                        >
                            <a class="page-link py-1 px-3 block" href="#">1</a>
                        </li>
                        <li class="page-item border rounded mr-2">
                            <a class="page-link py-1 px-3 block" href="#">2</a>
                        </li>
                        <li class="page-item border rounded mr-2">
                            <a class="page-link py-1 px-3 block" href="#">3</a>
                        </li>
                        <li class="page-item border rounded mr-2">
                            <a class="page-link py-1 px-3 block" href="#"
                                >&raquo;</a
                            >
                        </li>
                    </ul>
                    <!-- <input type="text" name="total" hidden> -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
// import axios from "axios";
import { apiCustomerList, apiCustomerDel } from "@/api/api.js";
export default {
    name: "CustomerList",
    data() {
        return {
            customerList: [],
            resultList: [],
            search: {
                input: ""
            }
        };
    },
    async mounted() {
        await apiCustomerList()
            .then(res => {
                this.customerList = res.data.data;
                this.resultList = [...this.customerList];
                // this.customerList.push(item)
                // console.log(this.customerList);
            })
            .catch(err => {
                console.log(err);
            });
        // axios
        //     .post("http://127.0.0.1:8000/api/customer")
        //     // .post('http://139.162.107.53/api/customer')
        //     .then(res => {
        //         this.customerList = res.data.data;
        //         this.resultList = [...this.customerList];
        //         // this.customerList.push(item)
        //         // console.log(this.customerList);
        //     })
        //     .catch(err => {
        //         console.log(err);
        //     });
    },
    methods: {
        detailHandler(id) {
            this.$router.push({
                path: "/customerDetail",
                query: {
                    id: id
                }
            });
            // console.log(id)
        },
        searchHandler() {
            console.log(this.search.input);
            this.resultList = this.customerList.filter(item => {
                // console.log(item)
                if (
                    item.code.indexOf(this.search.input) != -1 ||
                    item.name.indexOf(this.search.input) != -1
                ) {
                    return item;
                } else if (!this.search.input) {
                    return item;
                }
            });
            console.log(this.resultList);
        },
        editHandler(id) {
            this.$router.push({
                path: "/customerEdit",
                query: {
                    id: id
                }
            });
            // console.log(id)
        },
        async deleteHandler(id) {
            console.log(id);
            if (confirm("确定要删除吗?") == true) {
                await apiCustomerDel(id)
                    .then(() => {
                        this.customerList = this.customerList.filter(
                            item => item.id !== id
                        );
                        this.resultList = [...this.customerList];
                        console.log(this.customerList);
                    })
                    .catch(err => {
                        console.log(err);
                    });
                // axios
                //     .post("http://127.0.0.1:8000/api/customer/del/" + id, id)
                //     // .post('http://139.162.107.53/api/customer')
                //     .then(() => {
                //         this.customerList = this.customerList.filter(
                //             item => item.id !== id
                //         );
                //         this.resultList = [...this.customerList];
                //         console.log(this.customerList);
                //     })
                //     .catch(err => {
                //         console.log(err);
                //     });
            }
        }
    }
};
</script>
