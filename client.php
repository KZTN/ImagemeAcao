<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="center">
        <form method="POST">
            <table>
                <tr>
                    <td>
                        <label>Entre com a resposta</label>
                        <input type="text" name="txtMessage" placeholder="start para começar">
                        <input type="submit" name="btnSend" value="Send">
                    </td>
                </tr>
                <?php
                $host = "127.0.0.1";
                $port = 20205;
                if(isset($_POST['btnSend'])) {
                    $msg = $_REQUEST['txtMessage'];
                    $socket = socket_create(AF_INET, SOCK_STREAM, 0);
                    socket_connect($socket, $host, $port);
                    socket_write($socket, $msg, strlen($msg));
                    $reply = socket_read($socket, 1924);
                    $reply = trim($reply);
                    $reply = "Server says:\t".$reply;
                }
                ?>
                <tr>
                    <td>
                        <textarea rows="10" cols="30"><?php echo @$reply;?></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>