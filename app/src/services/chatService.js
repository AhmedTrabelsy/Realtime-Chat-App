import axios from "axios";

const apiClient = axios.create({
  baseURL: "/Api/",
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
};
