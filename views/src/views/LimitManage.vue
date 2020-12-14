<template>
    <div class="">
        <ul class="breadcrumbs text-right">
            <router-link
                router-link
                :to="{ name: 'Home' }"
                tag="li"
                class="inline-block cursor-pointer mr-2"
                >首頁</router-link
            >
            <li class="inline-block">/ 權限管理</li>
        </ul>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div class="card-header px-6 py-4 border-b">
                <h1 class="text-2xl">權限管理</h1>
            </div>
            <div class="card-body p-4">
                content
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "LimitManage",
};
</script>
