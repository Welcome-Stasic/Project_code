let selectedUserId = null;

function getUsers() {
  fetch("getUsers.php")
    .then((response) => response.json())
    .then((users) => {
      const userList = document.getElementById("all-users");
      userList.innerHTML = "";

      users.forEach((user) => {
        const listItem = document.createElement("li");
        listItem.textContent = user.username;
        listItem.onclick = () => {
          selectedUserId = user.id;
          loadMessages(selectedUserId);
          document.querySelectorAll("#all-users li").forEach((item) => {
            item.classList.remove("selected");
          });

          listItem.classList.add("selected");
        };
        userList.appendChild(listItem);
      });
    });
}

document.addEventListener("DOMContentLoaded", () => {
  getUsers();
});

function loadMessages(receiverUserId) {
  const chatMessages = document.getElementById("chat-messages");
  chatMessages.innerHTML = "";

  fetch("getMessages.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `receiver_id=${receiverUserId}`,
  })
    .then((response) => response.text())
    .then((messagesText) => {
      const messagesArray = messagesText.split("\n");
      for (const messageText of messagesArray) {
        const messageElement = document.createElement("div");
        messageElement.textContent = messageText;
        chatMessages.appendChild(messageElement);
      }
    })
    .catch((error) => {
      console.error("Error loading messages", error);
    });
}

function sendMessage() {
  const messageInput = document.getElementById("message");

  if (!selectedUserId) {
    alert("Для начала переписки выберите пользователя из списка.");
    return;
  }
  const messageText = messageInput.value;

  fetch("sendMessage.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `receiver_id=${selectedUserId}&message=${encodeURIComponent(
      messageText
    )}`,
  })
    .then((response) => response.text())
    .then((responseText) => {
      console.log("Respone from sendMessage.php: ", responseText);
      loadMessages(selectedUserId);
    })
    .catch((error) => {
      console.error("Error sending message: ", error);
    });
  messageInput.value = "";
}