import axios from "axios";

const apiClient = axios.create({
  baseURL: "http://localhost/Api/",
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

export default {
  getUser(email, password) {
    let data = {
      email: email,
      password: password,
    };
    return apiClient.post("login.php", data);
  },
  getUsers(currentUser) {
    return apiClient.post("users.php", currentUser);
  },
  // addChat(event) {
  //   return apiClient.post("addEvent.php", event);
  // },
  // deleteEvent(id) {
  //   return apiClient.delete("deleteEvent.php?id=" + id);
  // },
  // updateEvent(event) {
  //   return apiClient.post("updateEvent.php", event);
  // },
};
