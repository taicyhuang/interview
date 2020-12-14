<template>
    <div class="">
        <div class="flex justify-between items-center mb-3 md:mt-2 md:mb-6">
            <ul class="breadcrumbs ml-auto">
                <router-link
                    :to="{ name: 'Home' }"
                    tag="li"
                    class="inline-block cursor-pointer"
                    >首頁</router-link
                >
                <li class="inline-block text-gray-600">新增電鍍等級</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div class="card-header p-4 md:py-3 border-b bg-gray-800 text-white">
                <h1 class="text-xl">新增電鍍等級</h1>
            </div>
            <div class="card-body p-4">
                <form class="form-box w-full md:w-2/3 lg:w-1/2">
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            新增電鍍等級
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
                            class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
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
    name: "AddLevel",
};
</script>
