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
    <table style='max-width: 800px; width: 100%; font-family: "Montserrat"; margin: 0 auto;'>
        <tr>
            <td width="350px" style="background-color: #fb5373; color: #fff; padding: 15px;">
                <table>
                    <tr>
                        <td>
                            <div>
                                CREDENCIAMENTO STAND RUBY ROSE<br />
                                BEAUTY FAIR 2021
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
                                                        <img style="height: 24px;margin-right: 10px;"
                                                            src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/hora.png"
                                                            alt="data" />
                                                    </td>
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
                                                        <img style="height: 24px;margin-right: 10px;"
                                                            src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/data.png"
                                                            alt="hora" />
                                                    </td>
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
                style='font-family: "Montserrat"; color: #fb5373;font-size: 50px;font-weight: 700;text-align: center;'>
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
    <table style='max-width: 800px; width: 100%; font-family: "Montserrat"; margin: 0 auto;' cellspacing="10">
        <tr>
            <td
                style='margin: 5px 0;border: 2px solid #fb5373;height: 40px;font-size: 18px;padding-left: 10px;color: #fb5373;'>
                <p style="margin: 10px 0">Nome: <strong style="font-family: Helvetica">{{ $agendamento->nome }}</strong></p>
            </td>
        </tr>
        <tr style="margin-top: 10px">
            <td
                style='margin: 5px 0;border: 2px solid #fb5373;height: 40px;font-size: 18px;padding-left: 10px;color: #fb5373;'>
                <p style="margin: 10px 0">CPF: <strong style="font-family: Helvetica">{{ $agendamento->cpf }}</strong></p>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table style='max-width: 800px; width: 100%; font-family: "Montserrat"; margin: 0 auto;'>
        <tr>
            <td style="text-align: center">
                <table style="margin: auto">
                    <tr>
                        <td>
                            <div style='font-size: 16px;color: #fb5373;margin: 15px;text-align: justify;'>
                                <strong style="font-family: Helvetica">Ol??</strong><br />
                                Recebemos sua inscri????o com sucesso para entrada no showroom Ruby<br />
                                Rose. O convite ?? nominal e intransfer??vel. Para sua seguran??a,
                                <br />
                                informamos que poder?? ser solicitada a apresenta????o de documento com
                                <br />
                                foto no momento do acesso junto ao e-mail de con???rma????o de
                                inscri????o. <br />
                                O ingresso ?? v??lido somente para o dia e hor??rio escolhido no ato da
                                <br />
                                inscri????o, sem toler??ncia de atraso.<br />
                                ?? obrigat??ria utiliza????o de m??scaras de prote????o em todo espa??o e o
                                <br />
                                distanciamento social de 1m. <br />
                                <span
                                    style='font-family: Helvetica; font-size: 16px;text-align: center;display: block;margin-top: 10px; font-weight: bold'>Aproveite
                                    a experi??ncia Ruby Rose.</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style='background-color: #ffaeb5;height: 100px;color: #fff;max-width: 600px;margin: 0 auto;'
                            align="center">
                            <p style="padding: 8px">
                                Quer aparecer nas redes sociais da Ruby?<br />
                                Compartilhe nas redes sociais nos marcando<br />
                                @rubyrosebrasil e utilizando a hashtag<br />
                                #rubyrosebeautyfair
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <br />
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
    </table>
</body>

</html>
