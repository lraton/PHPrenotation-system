<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f8fafc;
            padding-bottom: 60px;
            padding-top: 60px;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            color: #334155;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .content {
            padding: 40px 50px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        h1 {
            color: #1e293b;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.025em;
            margin: 0 0 20px 0;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 0 0 20px 0;
            color: #475569;
        }
        .footer {
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
            margin-top: 30px;
        }
        .signature {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0;
        }
        .brand {
            font-size: 14px;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="main">
            <tr>
                <td class="content">
                    <h1>Prenotazione Confermata</h1>
                    <p> Gentile {{ $booking->get('name') }}</p>
                    <p>Grazie per averci scelto. Siamo lieti di confermare la tua prenotazione. Di seguito trovi i dettagli della tua prenotazione:</p>
                    <p><strong>Data:</strong> {{ $booking->get('date') }}</p>
                    <p><strong>Orario:</strong> {{ $booking->get('time') }}</p>
                    <p><strong>Numero di persone:</strong> {{ $booking->get('guests') }}</p>
                    <p>Se hai bisogno di modificare o cancellare la tua prenotazione, ti preghiamo di contattarci il prima possibile. Siamo a tua disposizione per qualsiasi domanda o richiesta speciale.</p>

                    <div class="footer">
                        <p class="signature">Un caloroso saluto,</p>
                        <p class="brand">Il Team di Brand Name</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>