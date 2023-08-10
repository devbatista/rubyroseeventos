<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RubyRose</title>
</head>

<body>
    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('https://fonts.googleapis.com/css?family=Montserrat');
        }

    </style>
    <table style='max-width: 600px; width: 100%; font-family: "Montserrat"; margin: 0 auto;'>
        <tr>
            <td width="350px" style="background-color: #e54583; color: #fff; padding: 15px;">
                <table>
                    <tr>
                        <td>
                            <div>
                                CREDENCIAMENTO STAND RUBY ROSE<br />
                                BEAUTY FAIR {{ date('Y') }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <div style='margin-top: 10px;height: 24px;display: flex;align-items: center;'>
                                            <table cellspacing="5">
                                                <tr>
                                                    <td>
                                                        {{ $agendamento->data . ' - ' . $agendamento->dia_semana }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='margin-top: 10px;height: 24px;display: flex;align-items: center;'>
                                            <table cellspacing='5'>
                                                <tr>
                                                    <td>
                                                        {{ $agendamento->hora }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="400px"
                style='font-family: "Montserrat"; color: #e54583;font-size: 50px;font-weight: 700;text-align: center;'>
                <table style='font-family: "Montserrat' cellpadding="4" align="center">
                    <tr>
                        <td style="font-family: Helvetica">
                            RubyRose
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table style='max-width: 600px; width: 100%; font-family: "Montserrat"; margin: 0 auto;' cellspacing="10">
        <tr>
            <td
                style='margin: 5px 0;border: 2px solid #e54583;height: 40px;font-size: 18px;padding-left: 10px;color: #e54583;'>
                <p style="margin: 10px 0">Nome: <strong style="font-family: Helvetica">{{ $agendamento->nome }}</strong></p>
            </td>
        </tr>
        <tr style="margin-top: 10px">
            <td
                style='margin: 5px 0;border: 2px solid #e54583;height: 40px;font-size: 18px;padding-left: 10px;color: #e54583;'>
                <p style="margin: 10px 0">CPF: <strong style="font-family: Helvetica">{{ $agendamento->cpf }}</strong></p>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table style='max-width: 600px; width: 100%; font-family: "Montserrat"; margin: 0 auto;'>
        <tr>
            <td style="text-align: center">
                <table style="margin: auto">
                    <tr>
                        <td>
                            <div style='text-align: center;'>
                                {{-- <img 
                                    src="https://rubyroseeventos.com.br/wp-content/uploads/2023/08/AtencaoQRRR.png" 
                                    alt="atencao"
                                    style="width: 500px"
                                > --}}
                                <p style="color: #e64583;font-size: 24px;">ATENÇÃO, NÃO FAÇA A LEITURA DO QRCODE</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style='font-size: 14px;color: #e54583;margin: 12px;text-align: justify;'>
                                <p style="text-align: center"> 
                                    <img src="qrcodes/{{ $agendamento->hash }}.png" alt="">
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style='background-color: #ffaeb5;height: 100px;color: #fff;max-width: 600px;margin: 0 auto;'
                            align="center">
                            <p style="padding: 8px">
                                Quer aparecer nas redes sociais da Ruby?<br>
                                Compartilhe nos marcando <br>
                                @rubyrosebrasil e utilizando a hashtag <br>
                                #rubyrosebeautyfair
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    {{-- <br />
    <br />
    <table style='max-width: 800px; width: 100%; font-family: "Montserrat"; margin: 0 auto;'>
        <tr style="margin-top: 5px;">
            <td style="width: 33.3%;">
                <table>
                    <tr>
                        <td><img style="margin-right: 10px;"
                                src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/instagram.png"
                                alt="instagram" /></td>
                        <td>@rubyrosebrasil</td>
                    </tr>
                </table>
            </td>
            <td style="width: 33.3%">
                <table>
                    <tr>
                        <td>
                            <img style="margin-right: 10px;"
                                src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/facebook.png"
                                alt="facebook" />
                        </td>
                        <td>
                            Ruby Rose Brasil
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 33.3%;">
                <table>
                    <tr>
                        <td>
                            <img style="margin-right: 10px;"
                                src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/sound.png" alt="sound" />
                        </td>
                        <td>
                            rubyrose_brasil
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="margin-top: 5px;">
            <td style="width: 33.3%;">
                <table>
                    <tr>
                        <td>
                            <img style="margin-right: 10px;"
                                src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/twitter.png"
                                alt="twitter" />
                        </td>
                        <td>
                            @rubyrose_oficial
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 33.3%;">
                <table>
                    <tr>
                        <td>
                            <img style="margin-right: 10px;"
                                src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/youtube.png"
                                alt="youtube" />
                        </td>
                        <td>
                            Ruby Rose
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 33.3%;">
                <table>
                    <tr>
                        <td>
                            <img style="margin-right: 10px;"
                                src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/site.png" alt="site" />
                        </td>
                        <td>
                            www.rubyrose.com.br
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table> --}}
</body>

</html>
