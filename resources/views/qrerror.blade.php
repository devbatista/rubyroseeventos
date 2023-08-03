<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RubyRose</title>
    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('https://fonts.googleapis.com/css?family=Montserrat');
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: "Montserrat";
        }

        .table-container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .msg {
            margin: 5px 0;
            height: 40px;
            font-size: 18px;
            background-color: #891515;
            border-radius: 40px;
            color: #fff;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <table cellspacing="10">
            <tr>
                <td class="msg">
                    <p style="margin: 10px 5px">{{ $data['error'] }}</p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
