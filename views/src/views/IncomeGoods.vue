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
                <li class="inline-block text-gray-600">進貨入庫</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div class="card-header p-4 md:py-3 border-b bg-gray-800 text-white">
                <h1 class="text-xl">進貨入庫</h1>
            </div>
            <div class="card-body p-4">
                <form class="form-box w-full md:w-2/3 lg:w-1/2">
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            客戶
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            入庫編號
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            品名
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            產品編號
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            規格
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            電鍍等級
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            射出廠
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
                            進貨數量
                        </label>
                        <div class="flex">
                            <input
                                class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1 mr-2"
                                type="text"
                                placeholder=""
                            />
                            <select
                                class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                                placeholder=""
                            >
                                <option value="">單位</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            交期
                        </label>
                        <input
                            class="form-control border rounded w-full text-gray-700 focus:outline-none focus:shadow-outline flex-1"
                            type="text"
                            placeholder=""
                        />
                    </div>
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            掛具
                        </label>
                        <div class="">
                            <div class="text">
                                content
                            </div>
                            <ul class="flex">
                                <li class="img mr-2">
                                    <img
                                        src="https://via.placeholder.com/100x100"
                                        alt=""
                                    />
                                </li>
                                <li class="img mr-2">
                                    <img
                                        src="https://via.placeholder.com/100x100"
                                        alt=""
                                    />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label
                            class="block text-gray-700 font-bold w-full sm:w-32 mb-2 sm:mb-0"
                        >
                            備註
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
    name: "IncomeGoods",
};
</script>
