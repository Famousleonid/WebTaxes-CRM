<html>
<head></head>
<body>
    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;"> New message about section Contact from guest:&nbsp;&nbsp;&nbsp;  {{ $sender->name }}!</div>
    </div>

    <div>
        <div style="width: 50%; padding: 40px 25%; text-align: center; font-size: 1.5rem">{!! $sender->message !!}</div>&nbsp;
    </div>

    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">E-mail for communication:&nbsp;&nbsp;&nbsp;  {{ $sender->email }}</div>
    </div>

</body>
</html>
