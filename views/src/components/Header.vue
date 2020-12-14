<template>
    <header
        class="header-box bg-blue-700 px-5 py-2 text-white flex justify-between items-center fixed left-0 top-0 w-full z-10"
    >
        <span class="menu" @click="$emit('toggleNav')">
            <i class="fas fa-bars text-xl"></i>
        </span>
        <a href="" class="logo flex items-center">
            <img src="../assets/logo.png" alt="" style="height:45px">
            <span class="text-xl">名冠宏系統</span>
        </a>
        <!-- <ul class="inline-flex">
            <li class="ml-3"><i class="fas fa-user mr-1"></i>admin</li>
            <li class="ml-3 ursor-pointer" @click="logoutHandler"><i class="fas fa-sign-out-alt mr-1"></i>登出</li>
        </ul> -->
        <div class="inline-flex user-dropdown" :class="{open: dropdownOpen}">
            <a href="#" @click.prevent="toggleOpen">
                <i class="fas fa-user mr-1"></i>admin 
                <span class="caret-down">&blacktriangledown;</span>
            </a>
            <ul class="dropdown-menu">
                 <li class="cursor-pointer" @click="logoutHandler"><i class="fas fa-sign-out-alt mr-1"></i>登出</li>
            </ul>
        </div>
    </header>
</template>
<script>
export default {
    data() {
        return {
            dropdownOpen: false,
        }
    },
    methods: {
        logoutHandler() {
            if (confirm(`是否要登出？`)) {
                localStorage.removeItem("token");
                this.$router.push("/login");
            }
        },
        toggleOpen(){
            this.dropdownOpen = !this.dropdownOpen;
        }
    },
};
</script>
<style lang="scss">
    .menu{
        display: none;
        @media(max-width: 991px){
            display: flex;
        }
    }
    .user-dropdown{
        position: relative;
        &.open{
            .dropdown-menu{
                display: block;
            }
        }
        .dropdown-menu{
            width: 100px;
            border-radius: 8px;
            display: none;
            position: absolute;
            right: 0;           
            top: calc(100% + 10px);
            z-index: 99;
            padding: 8px;
            background: #fff;
            color: #000;
            text-align: center;
        }
    }
    
</style>
