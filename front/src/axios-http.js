import axios from "axios";

export default axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  routeURL: process.env.VUE_APP_ROUTE_URL,
  headers: {
    "Content-type": "application/json"
  }
});

