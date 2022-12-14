import axios from "axios";

const options = {
  method: "GET",
  url: "https://famous-quotes4.p.rapidapi.com/random",
  params: { category: "all", count: "2" },
  headers: {
    "X-RapidAPI-Key": "c4915f615emshd6f4761193b6f3dp17bd68jsnbbcb2b9c38bc",
    "X-RapidAPI-Host": "famous-quotes4.p.rapidapi.com",
  },
};

export default {
  getQuote() {
    return axios.request(options);
  },
};
