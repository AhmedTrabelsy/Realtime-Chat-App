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
  getMessages() {
    return apiClient.get("/messages.php");
  },
  // getUser(id) {
  //   return apiClient.get("event.php?id=" + id);
  // },
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
