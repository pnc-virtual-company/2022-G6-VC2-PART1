import axios from "../axios-http";

// const setAuthHeader = (token) =>{
// if(token){
//   axios.defaults.headers = {
//     Authorization: 'Bearer ' + token,
//   }
// }else{
//   delete axios.defaults.headers.Authorization
// }
// };

axiosApi.interceptors.request.use(function (config) {
  const token = localStorage.getItem("token");
  config.headers.Authorization = token ? `Bearer ${token}` : "";
  return config;
});

export default setAuthHeader;