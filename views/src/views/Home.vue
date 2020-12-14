<template>
    <div class="home">
        <Header @toggleNav="navOpen = !navOpen"></Header>
        <main class="main-box" style="padding-top: 61px;">
            <Navbar :open="navOpen"></Navbar>
            <div class="content-box lg:ml-48 p-5 flex flex-col">
                <div>
                    <!-- <Breadcrumbs></Breadcrumbs> -->
                    <router-view></router-view>
                </div>
                <!-- <footer class="footer-box mt-3">
                    Copyright © 2020 company. All rights reserved.
                </footer> -->
            </div>
        </main>
    </div>
</template>

<script>
import Header from "@/components/Header";
import Navbar from "@/components/Navbar";
// import Breadcrumbs from "@/components/Breadcrumbs";
export default {
    name: "Home",
    data(){
        return{
            navOpen: true
        }
    },
    components: {
        Header,
        Navbar,
        // Breadcrumbs,
    },
    methods: {
        handleView(){
            this.navOpen = window.innerWidth >= 991;
        }
    },
    created() {
        this.handleView();
    },
};
</script>
