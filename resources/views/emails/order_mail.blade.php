<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaravelDemoSite 訂單通知信</title>
    </head>
    <body>
    <p>您好：</p>
    <p>您的訂單編號：{{ $order_no }}，我們將會在最短時間內為您處理訂單！</p>
    <p>【訂單資訊】</p>
    <ul style="list-style-type:none">
        <li>訂單編號&#xFF1A;{{ $order_no }}</li>
        <li>訂單日期&#xFF1A;{{ $created_at }}</li>
        <li>訂單配送方式&#xFF1A;{{ $deliver }}</li>
        <li>訂單付款方式&#xFF1A;{{ $payment_methond }}</li>
        <li>訂單金額&#xFF1A;NT&#36;&nbsp;{{ $amount }}&nbsp;元</li>
    </ul>
    <p>＊ 備註：因應個人資料保護，即日起，「訂單通知信」只告知【訂購者資訊】，如您欲查詢詳細訂單資訊，請利用「訂單查詢系統」查詢，不便之處，敬請見諒！ ＊</p>
    <p>＊ 此信件為系統發出信件，請勿直接回覆，感謝您的配合。 ＊</p>
    <br>
    <p>如有任何疑問歡迎再次來電或來信洽詢，</p>
    <p>祝閱讀愉快！</p>
    <p>謝謝！</p>
    </body>
</html>