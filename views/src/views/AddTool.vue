<template>
    <div class="about">
        <ul class="breadcrumbs mb-4">
            <router-link
                router-link
                :to="{ name: 'Home' }"
                tag="li"
                class="inline-block cursor-pointer mr-2"
                >首頁</router-link
            >
            <li class="inline-block">/ 新增掛具</li>
        </ul>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div class="card-header px-6 py-4 border-b">
                <h1 class="text-2xl">新增掛具</h1>
            </div>
            <div class="card-body px-6 py-4">
                <form class="form-box w-full md:w-2/3 lg:w-1/2">
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            掛具
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-btn flex w-full sm:pl-32">
                        <button
                            class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                            type="button"
                        >
                            儲存
                        </button>
                        <button
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                            type="button"
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
export default {
    name: "addTool",
};
</script>
