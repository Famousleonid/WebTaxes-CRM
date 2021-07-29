<html>
<head>

</head>
<body>
<div style="
        border: 1px solid grey;
        width: 70%;
    ">
    <div style="
         display: table;
         width: 100%;
         text-align: center;
         height: 40px;
         background: #27A9DF;
         color: #fff;
         font-family: 'Open Sans', Arial, sans-serif;
         font-size: 14px;
         font-weight: bold;">

        <div style="
            display: table-cell; vertical-align: middle; font-size: 16px;">Mail from Administrator WebTaxes
        </div>

    </div>

    <div>
        <div style="width: 50%; padding: 40px 25%; text-align: center; font-size: 1.5rem">{{ $sender->message }}</div>&nbsp;
    </div>

    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #27A9DF; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">E-mail for communication:&nbsp;&nbsp;&nbsp; {{ config('setting.mail_admin') }}</div>
    </div>
</div>

</body>
</html>
