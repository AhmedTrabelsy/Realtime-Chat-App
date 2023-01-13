import axios from "axios";

const apiClient = axios.create({
  baseURL: "lkqsddf",
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

export default {
  getMessages(receiver, sender) {
    let data = {
      receiver: receiver,
      sender: sender,
    };
    return apiClient.post("/getMessages.php", data);
  },
  sendMsg(currentUser, currentReceiver, msgValue) {
    let data = {
      currentUser: currentUser,
      currentReceiver: currentReceiver,
      msgValue: msgValue,
    };
    return apiClient.post("sendMessage.php", data);
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
