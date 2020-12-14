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
                <li class="inline-block text-gray-600">掛具列表</li>
            </ul>
        </div>
        <div class="card rounded overflow-hidden shadow-sm bg-white">
            <div class="card-header p-4 md:py-3 border-b bg-gray-800 text-white">
                <h1 class="text-xl">掛具列表</h1>
            </div>
            <div class="card-body p-4">
                <div
                    class="control-box mb-4 flex justify-between flex-col sm:flex-row"
                >
                    <div class="mb-2 sm:mb-0">
                        <router-link
                            :to="{ name: 'AddTool' }"
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
                                placeholder="輸入掛具名稱"
                            />
                        </div>
                        <button
                            class="btn btn-search w-full sm:w-16 bg-orange-500 hover:bg-orange-700 text-white rounded"
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
                                    掛具名稱
                                </th>
                                <th class="control-md"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-index">1</td>
                                <td></td>
                                <td class="control-box control-md">
                                    <router-link
                                        :to="{ name: 'EditTool' }"
                                        class="btn btn-edit bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                        >修改</router-link
                                    >
                                    <a
                                        class="btn btn-delete bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded inline-block cursor-pointer"
                                        >刪除</a
                                    >
                                </td>
                            </tr>
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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "ToolList",
};
</script>
