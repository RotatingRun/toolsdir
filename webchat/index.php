<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>聊天界面</title>
    <link href="css/global.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body class="chat-bg">
<header class="header-title">标题</header>
<section class="chat-box">
    <span class="chat-trip">此刻对方忙碌，请留言</span>
    <div class="bubbleDiv"></div>
</section>
<footer class="chat-edit clearfix">
    <!--span class="uploadImg fl"><input type="file" name="uploadfile" class="uploadfile"></span-->

    <button id="paopao" class="send-btn fr">表情</button>
    <div class="chat-info" placeholder="想咨询他什么内容..." contenteditable="true"></div>
    <button id='sendmsg' class="send-btn fr">发送</button>
    <button class="send-btn fr">签到</button>
    <button class="send-btn fr">转发</button>
    
</footer>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/chat.js"></script>
<script>
    $(document).ready(function(){
        /*
         左侧 接收别人信息 调用，三个参数：leftBubble，头像路径，内容
         chat(element,imgSrc,doctextContent)
         */
        chat("leftBubble","images/head_portrait.png","您好，欢迎关注博客：http://write.blog.csdn.net/postlist");
        chat("leftBubble","images/head_portrait.png","您好，欢迎关注博客：http://write.blog.csdn.net/postlist");

        $("#sendmsg").click(function(){
            //右侧 自己发 调用，只需填一个参数"rightBubble"
            chat("rightBubble");

            ws.send($('.chat-info').html());
            console.log("给服务端发送一个字符串："+$('.chat-info').html());

            //清空输入框
            $('.chat-info').html('');

        })
    });
    
    function ppbqa() 
    {
        var reg = {
            "1": "草泥马",
            "2": "吃瓜",
            "3": "二哈",
            "4": "dog",
            "5": "dog嗨",
            "6": "dog怒",
            "7": "dog泪",
            "8": "微笑"
                 };
        strFace = '<div id="facebox" style="position:absolute;display:none;z-index:1000;top:-80px;" class="ppbq"><table border="0" cellspacing="0" cellpadding="0"><tr>';
        for (var i = 1; i <= 8; i++) {
            var labFace = i;
            for (var n in reg) {
                if (labFace == n) {
                    labFace2 = (reg[n]);
                }
            }
//          strFace += '<td>< img src="' + i + '.png" width="40" height="40" title="' + labFace2 + '"/></td>';
            strFace += '<td><img src="1.png" width="40" height="40" title="' + labFace2 + '"/></td>';
            if (i % 4 == 0) strFace += '</tr><tr>'; //一行4个表情
        }
        strFace += '</tr></table></div>';
        $("#paopao").after(strFace);
        $("#facebox img").each(function(){$(this).on('click',function(){$(".chat-info").html($(".chat-info").html()+$(this).attr('title'));})});
    };
    ppbqa();
    var kkk=0;
    $("#paopao").click(function() {
        if (kkk==0)
        {
            $("#facebox").show();
            kkk = 1;
        }
        else{
            $("#facebox").hide();
            kkk = 0;
        }
    });

    // 假设服务端ip为127.0.0.1
    ws = new WebSocket("ws://127.0.0.1:2346");
    ws.onopen = function() {
        console.log("连接成功");
    };
    ws.onmessage = function(e) {
        console.log("收到服务端的消息：" + e.data);
        chat("leftBubble", "images/head_portrait.png", e.data);
    };
</script>
</body>
</html>