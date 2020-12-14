<template>
    <div class="">
        <div class="flex justify-between items-center mb-3 md:mt-2 md:mb-6">
            <a href="javascript:history.back()" class="btn btn-back border border-gray-500 bg-white-300 hover:bg-gray-500 text-gray-800 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-chevron-left mr-2"></i>返回</a>
            <ul class="breadcrumbs ml-auto">
                <router-link
                    :to="{ name: 'Home' }"
                    tag="li"
                    class="inline-block cursor-pointer"
                    >首頁</router-link
                >
                <li class="inline-block">產品列表</li>
                <li class="inline-block text-gray-600">新增</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div class="card-header p-4 md:py-3 border-b bg-gray-800 text-white">
                <h1 class="text-xl">新增</h1>
            </div>
            <div class="card-body p-4">
                <form class="form-box w-full">
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            客戶編號
                        </label>
                        <div class="form-text">ABC</div>
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            產品編號
                        </label>
                        <div class="form-text flex items-center">
                            <span class="mr-2">ABC-</span>
                            <input
                                class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                                type="text"
                                placeholder=""
                            />
                        </div>
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            產品品名
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            產品規格
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            電鍍等級
                        </label>
                        <select
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            placeholder=""
                        >
                            <option value="">請選擇</option>
                        </select>
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            電鍍金額
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            單位
                        </label>
                        <select
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            placeholder=""
                        >
                            <option value="">請選擇</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            掛具
                        </label>
                        <div class="flex items-start">
                            <div>
                                <div class="item mb-2">
                                    <select
                                        class="form-control w-24 border rounded text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                                        placeholder=""
                                    >
                                        <option value="">請選擇</option>
                                    </select>
                                    <input type="text" class="form-control w-24 border rounded text-gray-700 focus:outline-none focus:shadow-outline flex-1">
                                    <span class="mx-2">支</span>
                                    <span class="mr-2">+</span>
                                    <select
                                        class="form-control w-24 border rounded text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                                        placeholder=""
                                    >
                                        <option value="">請選擇</option>
                                    </select>
                                    <span class="mx-2">X</span>
                                    <select
                                        class="form-control w-24 border rounded text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                                        placeholder=""
                                    >
                                        <option value="">請選擇</option>
                                    </select>
                                    <span class="mx-2">支</span>
                                    <span class="mr-2">=</span>
                                    <span class="mr-2">銅馬掛數</span>
                                    <input
                                        class="form-control w-24 border rounded text-gray-700 focus:outline-none focus:shadow-outline "
                                        type="text"
                                    />
                                    <span class="mx-2">個</span>
                                </div>
                            </div>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                                新增
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            電壓
                        </label>
                        <div>
                            <label class="mr-2">
                                銅
                                <input
                                    class="form-control w-8 border rounded text-gray-700 focus:outline-none focus:shadow-outline "
                                    type="text"
                                />
                                <span class="text-sm">
                                    V
                                </span>
                            </label>
                            <label class="mr-2">
                                半光鎳
                                <input
                                    class="form-control w-8 border rounded text-gray-700 focus:outline-none focus:shadow-outline "
                                    type="text"
                                />
                                <span class="text-sm">
                                    V
                                </span>
                            </label>
                            <label class="mr-2">
                                全光鎳
                                <input
                                    class="form-control w-8 border rounded text-gray-700 focus:outline-none focus:shadow-outline "
                                    type="text"
                                />
                                <span class="text-sm">
                                    V
                                </span>
                            </label>
                            <label class="mr-2">
                                微孔鎳
                                <input
                                    class="form-control w-8 border rounded text-gray-700 focus:outline-none focus:shadow-outline "
                                    type="text"
                                />
                                <span class="text-sm">
                                    V
                                </span>
                            </label>
                            <label class="mr-2">
                                鉻
                                <input
                                    class="form-control w-8 border rounded text-gray-700 focus:outline-none focus:shadow-outline "
                                    type="text"
                                />
                                <span class="text-sm">
                                    V
                                </span>
                            </label>
                        </div>
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            圖片上傳
                        </label>
                        <div>
                            <button
                                class="mr-2 bg-gray-300 hover:bg-gray-600 text-gray-600 hover:text-gray-100 font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                                圖片上傳
                            </button>
                            <button
                                class="mr-2 bg-gray-300 hover:bg-gray-600 text-gray-600 hover:text-gray-100 font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                                圖片上傳
                            </button>
                        </div>
                    </div>
                    <div
                        class="form-group mb-4 flex items-center flex-wrap md:w-2/3 lg:w-1/2"
                    >
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            注意事項
                        </label>
                        <textarea
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        ></textarea>
                    </div>
                    <div class="form-btn flex w-full sm:pl-32">
                        <!-- <button
                            class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                            type="button"
                        >
                            儲存
                        </button> -->
                        <router-link
                            :to="{ name: 'ProductList' }"
                            class="btn mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold ounded focus:outline-none focus:shadow-outline"
                            >儲存</router-link>
                        <button
                            class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold rounded focus:outline-none focus:shadow-outline"
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
