import axios from "axios";
// import qs from "qs";
const baseURL = axios.create({
    // baseURL: "http://127.0.0.1:8000/api/"
    // baseURL: "http://139.162.107.53/api/"
    baseURL: "http://172.104.125.38/api/"
});

//login
export const apiLogin = data => baseURL.post("user", data);

//customer
export const apiCustomerList = () => baseURL.post("customer");
export const apiCustomerAdd = data => baseURL.post("customer/create", data);
export const apiCustomerEdit = data => baseURL.post("customer/update", data);
export const apiCustomerDel = (id, data) =>
    baseURL.post(`customer/del/${id}`, data);
