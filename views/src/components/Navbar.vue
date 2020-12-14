<template>
    <div>
        <nav
            class="navbar-box w-48 bg-white fixed h-full p-5 shadow-sm lg:block" v-if="open"
        >
            <router-link :to="{ name: 'CustomerList' }" class="block mb-2"
                >客戶列表</router-link
            >
            <router-link :to="{ name: 'ProductList' }" class="block mb-2"
                >產品列表</router-link
            >
            <router-link :to="{ name: 'ToolList' }" class="block mb-2"
                >掛具列表</router-link
            >
            <!-- <router-link :to="{ name: 'LimitManage' }" class="block mb-2"
                >權限管理</router-link
            > -->
            <router-link :to="{ name: 'AddLevel' }" class="block mb-2"
                >新增電鍍等級</router-link
            >
            <router-link :to="{ name: 'IncomeGoods' }" class="block mb-2"
                >進貨入庫</router-link
            >
            <!-- <router-link :to="{ name: 'Report' }" class="block mb-2">報表</router-link> -->
        </nav>
        <div class="overlary block lg:hidden" v-if="open"></div>
    </div>
</template>
<script>
export default {
    props: [
        'open'
    ]
}
</script>
<style lang="scss" scoped>
    .navbar-box{
        z-index: 30;
    }
    .overlary{
        position:absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(#000, .6);
    }
</style>
