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
            <td width="400px" style="background-color: #EA5472; color: #fff; padding: 15px; border-radius: 45px">
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
                style='font-family: "Montserrat"; color: #EA5472;font-size: 50px;font-weight: 700;text-align: center;'>
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
                style='margin: 5px 0;border: 2px solid #EA5472;height: 40px;font-size: 18px;padding-left: 10px;color: #EA5472; border-radius: 20px;'>
                <p style="margin: 10px 0">Nome: {{ $data['nome'] }}</p>
            </td>
        </tr>
        <tr style="margin-top: 10px">
            <td
                style='margin: 5px 0;border: 2px solid #EA5472;height: 40px;font-size: 18px;padding-left: 10px;color: #EA5472; border-radius: 20px;'>
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
                            <div style='font-size: 16px;color: #575756;margin: 15px;text-align: justify;'>
                                <strong>PARABÉNS</strong><br /><br />

                                Agendamento concluído com sucesso.<br /><br />

                                Recebemos sua inscrição com sucesso para entrada no showroom Ruby Rose. O convite é nominal e <br />
                                intransferível. Para sua segurança, informamos que poderá ser solicitada a apresentação de <br />
                                documento com foto no momento do acesso junto ao QR code de para confirmação. <br /><br />
                                
                                O QR code é válido somente para o dia e horário escolhido no ato da inscrição, sem tolerância <br />
                                de atraso.<br /><br />

                                Indicamos que se possível, tire um print do seu comprovante de agendamento para facilitar <br />
                                sua entrada.<br /><br />
                                <span
                                    style='font-size: 16px;text-align: center;display: block;margin-top: 10px; font-weight: bold'>Aproveite
                                    a experiência Ruby Rose.</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style='text-align: center;'>
                                <img 
                                    src="https://rubyroseeventos.com.br/wp-content/uploads/2023/08/AtencaoQRRR.png" 
                                    alt="atencao"
                                    style="width: 500px"
                                >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style='font-size: 16px;color: #985EA3;margin: 15px;text-align: center;'>
                                <p>
                                    {{-- <img src="https://rubyroseeventos.devbatista.com/qrcodes/{{ $data['hash'] }}.png" alt="Qrcode"> --}}
                                    <img src="https://api.rubyroseeventos.com.br/qrcodes/{{ $data['hash'] }}.png" alt="Qrcode">
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style='background-color: #985EA3;height: 100px;color: #fff;max-width: 600px;margin: 0 auto; border-radius: 30px;'>
                            <p style="padding: 10px">
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
</body>

</html>
