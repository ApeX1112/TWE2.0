<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Chat</title>
    <link rel="stylesheet" href="css/messages.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="index.php?view=accueil">Home</a></li>
            <li><a href="index.php?view=profile">Profile</a></li>
            <li><a href="index.php?view=addbook">Add Book</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="chat-container">
            <h1>Message Alice Johnson (Book Owner)</h1>
            <div class="chat-box">
                <div class="message sender">
                    <p>Hi! I saw you are interested in "The Midnight Library". Are you still looking to borrow it?</p>
                    <span class="timestamp">2024-07-28 10:30 AM</span>
                </div>
                <div class="message recipient">
                    <p>Yes, I am! Is it still available?</p>
                    <span class="timestamp">2024-07-28 10:35 AM</span>
                </div>
                <div class="message sender">
                    <p>Absolutely! I can meet anytime tomorrow morning near the campus library if that works for you.</p>
                    <span class="timestamp">2024-07-28 10:40 AM</span>
                </div>
                <div class="message recipient">
                    <p>Tomorrow morning works great! Say, around 10 AM?</p>
                    <span class="timestamp">2024-07-28 10:45 AM</span>
                </div>
            </div>
            <div class="message-input">
                <input type="text" placeholder="Type your message here...">
                <button class="send-btn">Send</button>
            </div>
        </div>
    </div>
</body>
</html>
