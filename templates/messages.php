
<?php
include_once("libs/maLibUtils.php");
include_once("libs/modele.php");
$idreceiver=valider("idreceiver"); // ID of the message receiver
$idbook=valider("idbook"); // ID of the book related to the message
$messages=get_messages($_SESSION['idUser'],$idreceiver,$idbook); // fetching messages from the database

?>
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
            <h1>Message the Book Owner</h1>
            <div class="chat-box">

                <?php
                // Display messages
                if (empty($messages)) {
                    echo '<p class="no-messages">No messages found.</p>';
                } else {
                    foreach ($messages as $message) {
                        // Determine if the message is sent or received
                        $isSender = ($message['ID_SENDER'] == $_SESSION['idUser']);
                        $messageClass = $isSender ? 'sender' : 'recipient';
                        $messageText = htmlspecialchars($message['CONTENT']);
                        $timestamp = htmlspecialchars($message['DATE_ENVOI']);
                        echo "<div class='message $messageClass'>";
                        echo "<p>$messageText</p>";
                        echo "<span class='timestamp'>$timestamp</span>";
                        echo "</div>";
                    }
                }
                ?>
            <?php// add message to data base when send button is clicked   
            // This part should be handled by a form submission, which is not shown here.
            ?>
            <!-- the send button should be handled by a form submission -->
            <form method="GET" action="controleur.php">
                <div classe="message-input">
                    <input type="text" name="content" placeholder="Type your message here..." >
                    <input type="hidden" name="idreceiver" value="<?php echo $idreceiver; ?>">
                    <input type="hidden" name="idbook" value="<?php echo $idbook; ?>">
                    
                    <button type="submit" name="action" value="Send" class="send-btn">Send</button>
                </div>
            </form>
            
            </div>
            <!-- Message input area 
            <div class="message-input">
                <input type="text" placeholder="Type your message here...">
                <button class="send-btn">Send</button>
            </div>
                -->
        </div>
    </div>
</body>
</html>
