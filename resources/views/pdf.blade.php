<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>RubyRose</title>
</head>

<body>
    <style>

        table {
            max-width: 800px;
            width: 100%;
            font-family: "Montserrat";
            margin: 0 auto;
        }

        .bg {
            background-color: #fb5373;
            color: #fff;
            padding: 15px;
        }

        .logonome {
            color: #fb5373;
            font-size: 50px;
            font-weight: 700;
            text-align: center;
        }

        .data {
            margin-top: 10px;
            font-family: "Montserrat";
            height: 24px;
            display: flex;
            align-items: center;
        }

        .data img {
            height: 24px;
            margin-right: 10px;
        }

        .hora {
            margin-top: 10px;
            height: 24px;
            font-family: "Montserrat";
            display: flex;
            align-items: center;
        }

        .hora img {
            height: 24px;
            margin-right: 10px;
        }

        .input {
            font-family: "Montserrat";
            margin: 5px 0;
            border: 2px solid #fb5373;
            height: 40px;
            font-size: 18px;
            padding-left: 10px;
            color: #fb5373;
        }

        input::placeholder {
            color: #fb5373;
            font-size: 18px;
            font-family: "Montserrat";
        }

        .inputswidth {
            max-width: 800px;
            width: 100%;
        }

        .texto {
            font-family: "Montserrat";
            font-size: 16px;
            color: #fb5373;
            margin: 15px;
            text-align: justify;
        }

        .boldmini {
            font-family: "Montserrat";
            font-size: 16px;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .cardsobrepor {
            background-color: #ffaeb5;
            height: 100px;
            color: #fff;
            max-width: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;

            -webkit-box-shadow: -6px -6px #fb5373;
            -moz-box-shadow: -6px -6px #fb5373;
            box-shadow: -6px -6px #fb5373;
        }

        .linkdownload {
            height: 60px;
            max-width: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            background-color: #fb5373;
        }

        .linkdownload a {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            font-family: "Montserrat";
        }

        .linkdownload a img {
            margin-left: 15px;
        }

        .midias {
            align-items: center;
        }

        .midiastr {
            margin-top: 5px;
        }

        .midias img {
            margin-right: 10px;
        }

    </style>
    <table>
        <tr>
            <td width="400px">
                <div class="bg">
                    <div>
                        CREDENCIAMENTO STAND RUBY ROSE<br />
                        BEAUTY FAIR 2021
                    </div>
                    <div class="data">
                        <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/hora.png" alt="data" />00/00/21 - Sábado
                    </div>
                    <div class="hora">
                        <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/data.png" alt="hora" />00:00
                    </div>
                </div>
            </td>
            <td width="400px" class="logonome">RubyRose</td>
        </tr>
    </table>
    <br />
    <br />
    <table>
        <tr>
            <td class="inputswidth" style="display: flex; flex-direction: column">
                <div class="input">
                    <p style="margin: 10px 0">Nome: {{ $salve }}</p>
                </div>
                <div class="input">
                    <p style="margin: 10px 0">CPF: </p>
                </div>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table>
        <tr>
            <td style="text-align: center">
                <div class="texto">
                    <strong>Olá</strong><br />
                    Recebemos sua inscrição com sucesso para entrada no showroom Ruby<br />
                    Rose. O convite é nominal e intransferível. Para sua segurança,
                    <br />
                    informamos que poderá ser solicitada a apresentação de documento com
                    <br />
                    foto no momento do acesso junto ao e-mail de conﬁrmação de
                    inscrição. <br />
                    O ingresso é válido somente para o dia e horário escolhido no ato da
                    <br />
                    inscrição, sem tolerância de atraso.<br />
                    É obrigatória utilização de máscaras de proteção em todo espaço e o
                    <br />
                    distanciamento social de 1m. <br />
                    <span class="boldmini">Aproveite a experiência Ruby Rose.</span>
                </div>
                <div class="cardsobrepor">
                    Quer aparecer nas redes sociais da Ruby?<br />
                    Compartilhe nas redes sociais nos marcando<br />
                    @rubyrosebrasil e utilizando a hashtag<br />
                    #rubyrosebeautyfair
                </div>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table>
        <tr class="midiastr">
            <td class="midias" style="width: 33.3%">
                <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/instagram.png" alt="instagram" />@rubyrosebrasil
            </td>
            <td class="midias" style="width: 33.3%">
                <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/facebook.png" alt="facebook" />Ruby Rose
                Brasil
            </td>
            <td class="midias" style="width: 33.3%">
                <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/sound.png" alt="sound" />rubyrose_brasil
            </td>
        </tr>
        <tr class="midiastr">
            <td class="midias" style="width: 33.3%">
                <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/twitter.png" alt="twitter" />@rubyrose_oficial
            </td>
            <td class="midias" style="width: 33.3%">
                <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/youtube.png" alt="youtube" />Ruby Rose
            </td>
            <td class="midias" style="width: 33.3%">
                <img src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/site.png" alt="site" />www.rubyrose.com.br
            </td>
        </tr>
    </table>
</body>

</html>
