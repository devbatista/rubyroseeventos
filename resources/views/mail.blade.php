<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>RubyRose</title>
</head>

<body>
    <table style='max-width: 800px; width: 100%; font-family: "Montserrat"; margin: 0 auto;'>
        <tr>
            <td width="400px" style="background-color: #fb5373; color: #fff; padding: 15px;">
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
                                                        {{ date('d/m/Y', strtotime($data['data_hora'])) }} -
                                                        {{ $data['dia_semana'] }}
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
                                                        {{ date('H:i', strtotime($data['data_hora'])) }}
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
                        <td>
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
                <p style="margin: 10px 0">Nome: {{ $data['nome'] }}</p>
            </td>
        </tr>
        <tr style="margin-top: 10px">
            <td
                style='margin: 5px 0;border: 2px solid #fb5373;height: 40px;font-size: 18px;padding-left: 10px;color: #fb5373;'>
                <p style="margin: 10px 0">CPF: {{ $data['cpf'] }}</p>
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
                                <span
                                    style='font-size: 16px;text-align: center;display: block;margin-top: 10px; font-weight: bold'>Aproveite
                                    a experiência Ruby Rose.</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style='background-color: #ffaeb5;height: 100px;color: #fff;max-width: 600px;margin: 0 auto;'>
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
        <tr>
            <td style="height: 60px;max-width: 600px;margin: 0 auto;background-color: #fb5373; display: flex">
                <a href="https://api.rubyroseeventos.com.br/pdf?agendamento={{ $data['agendamento'] }}"
                    style="color: #fff;text-decoration: none; margin: auto; display: flex;">
                    <table>
                        <tr>
                            <td>
                                <p>DOWNLOAD AGENDAMENTO</p>
                            </td>
                            <td>
                                <img style="margin-left: 15px;"
                                    src="https://rubyroseeventos.com.br/wp-content/uploads/2021/11/pdf.png" alt="pdf" />
                            </td>
                        </tr>
                    </table>
                </a>
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
