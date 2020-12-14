<template>
    <div class="login h-screen flex items-center">
        <div class="w-10/12 sm:w-6/12 md:w-5/12 lg:w-3/12 m-auto">
            <h1 class="text-center text-2xl mb-4">名冠宏後台系統</h1>
            <!-- TODO::表單驗證 -->
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                <div class="form-group">
                    <label
                        class="block text-gray-700 font-bold mb-2"
                        for="account"
                    >
                        帳號
                    </label>
                    <input
                        class="form-control shadow border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline"
                        id="account"
                        name="account"
                        type="text"
                        placeholder="請輸入帳號"
                        v-model="loginForm.account"
                        required
                    />
                </div>
                <div class="form-group">
                    <label
                        class="block text-gray-700 font-bold mb-2"
                        for="password"
                    >
                        密碼
                    </label>
                    <input
                        class="form-control shadow border rounded w-full text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                        id="password"
                        name="passowrd"
                        type="password"
                        placeholder="請輸入密碼"
                        v-model="loginForm.password"
                        required
                    />
                </div>
                <div class="form-btn flex items-center justify-between">
                    <button
                        class="btn btn-primary flex-1 mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
                        type="button"
                        @click="loginHandler"
                    >
                        登入
                    </button>
                    <button
                        class="btn btn-cancel flex-1 bg-gray-500 hover:bg-gray-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
                        type="button"
                        @click="cancelHandler"
                    >
                        取消
                    </button>
                    <!-- TODO::忘記密碼 -->
                    <!-- <a
                class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                href="#"
                >
                忘記密碼
                </a> -->
                </div>
                <div class="login-tips text-red-500 mt-3">
                    <div v-if="loginInputTips">
                        帳號或密碼不能為空，請重新登入
                    </div>
                    <div v-if="loginTips">帳號或密碼錯誤，請重新登入</div>
                </div>
            </form>
            <!-- <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
            </p> -->
        </div>
    </div>
</template>
<script>
// import axios from 'axios';
import { apiLogin } from "@/api/api.js";
export default {
    name: "Login",
    data() {
        return {
            info: null,
            loginForm: {
                account: "",
                password: ""
            },
            loginInputTips: false,
            loginTips: false
        };
    },
    methods: {
        //TODO::改使用Async - Await
        async loginHandler() {
            const data = {
                account: this.loginForm.account,
                password: this.loginForm.password
            };
            // axios.post('http://127.0.0.1:8000/api/user',data)
            await apiLogin(data)
                .then(res => {
                    console.log(res.data);
                    let account = res.data.account;
                    let password = res.data.password;
                    if (
                        this.loginForm.account.match(account) &&
                        this.loginForm.password.match(password)
                    ) {
                        console.log("登入成功");
                        localStorage.setItem("token", "ImLogin");
                        this.$router.push({ name: "Home" });
                    } else if (
                        this.loginForm.account == "" ||
                        this.loginForm.password == ""
                    ) {
                        console.log("帳號密碼不能空");
                        this.loginInputTips = true;
                        this.loginTips = false;
                    } else {
                        this.loginTips = true;
                        this.loginInputTips = false;
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        },
        cancelHandler() {
            this.loginForm.username = "";
            this.loginForm.password = "";
        }
    }
};
</script>
<style lang="scss" scoped>
.form {
    &-group {
        flex-direction: column;
        margin-bottom: 1rem;
    }
}
</style>
