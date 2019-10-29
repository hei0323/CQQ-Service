<?php /*a:1:{s:56:"D:\site\layui\application\customer\view\index\index.html";i:1572277596;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo htmlentities(app('config')->get('public_path')); ?>/layui/css/layui.css">
    <script src="<?php echo htmlentities(app('config')->get('public_path')); ?>/layui/layui.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>客服大厅</title>
</head>
<body>

<script>
    /**
     * 与GatewayWorker建立websocket连接，域名和端口改为你实际的域名端口，
     * 其中端口为Gateway端口，即start_gateway.php指定的端口。
     * start_gateway.php 中需要指定websocket协议，像这样
     * $gateway = new Gateway(websocket://0.0.0.0:7272);
     */
    ws = new WebSocket("ws://127.0.0.1:7272");
    // 服务端主动推送消息时会触发这里的onmessage
    ws.onmessage = function(e){
        // json数据转换成js对象
        var data = eval("("+e.data+")");
        var type = data.type || '';
        switch(type){
            // Events.php中返回的init类型的消息，将client_id发给后台进行uid绑定
            case 'init':
                // 利用jquery发起ajax请求，将client_id发给后端进行uid绑定
                $.post('http://127.0.0.1:8000/userApi', {client_id: data.client_id}, function(data){}, 'json');
                break;
            // 当mvc框架调用GatewayClient发消息时直接alert出来
            default :
                alert(e.data);
        }
    };
</script>
</body>
</html>