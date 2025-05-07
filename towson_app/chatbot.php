<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towson University Computer Science Chatbot</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">
    <div class="chat-container bg-white rounded-lg shadow-xl p-6 w-full max-w-2xl">
        <h1 class="chat-title text-2xl font-semibold text-gray-800 mb-4 text-center">Towson University CS Chatbot</h1>
        <div id="chat-box" class="message-container space-y-4">
        </div>
        <div class="message-input-container flex items-center mt-4">
            <input type="text" id="message-input" class="input-box" placeholder="Ask about Towson CS courses & majors...">
            <button id="send-button" class="send-button">Send</button>
        </div>
    </div>


    <script>
        const chatBox = document.getElementById('chat-box');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');

        const initialMessage = document.createElement('div');
        initialMessage.classList.add('message-box', 'bot-message');
        initialMessage.textContent = "Hello! Ask me anything about Towson University Computer Science courses and majors.";
        chatBox.appendChild(initialMessage);

        sendButton.addEventListener('click', () => {
            const userMessageText = messageInput.value;
            if (userMessageText.trim() === '') return;

 
            const userMessage = document.createElement('div');
            userMessage.classList.add('message-box', 'user-message');
            userMessage.textContent = userMessageText;
            chatBox.appendChild(userMessage);

            messageInput.value = ''; 

            simulateBotResponse(userMessageText);
        });

        messageInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                sendButton.click();
            }
        });

        function simulateBotResponse(userMessage) {
            setTimeout(() => {
                const botResponseText = getBotResponse(userMessage);
                const botMessage = document.createElement('div');
                botMessage.classList.add('message-box', 'bot-message');
                botMessage.textContent = botResponseText;
                chatBox.appendChild(botMessage);
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 1000);
        }

        function getBotResponse(userMessage) {
            const lowerCaseMessage = userMessage.toLowerCase();
            if (lowerCaseMessage.includes("computer science") || lowerCaseMessage.includes("compsci") || lowerCaseMessage.includes("cs")) {
                return "The Computer Science program at Towson University is designed to provide students with a strong foundation in both theoretical and applied aspects of computing.";
            } else if (lowerCaseMessage.includes("course")) {
                return "Towson University's Computer Science department offers a variety of courses, including introductory programming, data structures, algorithms, and software engineering. For detailed information about a specific course, please visit the Towson University website course search tool.";
            } else if (lowerCaseMessage.includes("major")) {
                return "The Computer Science major at Towson University provides a comprehensive education in software development, algorithms, and computer systems.";
            } else {
                return "I can provide information about Towson University Computer Science courses and majors. Please ask a specific question.";
            }
        }
    </script>
</body>
<button onclick="history.back()" class="go-back-button">← Go Back</button>

</html>

