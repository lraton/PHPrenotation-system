<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Report Prenotazioni</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container dell'header con posizionamento relativo */
        .header {
            position: relative;
            height: 80px; /* Altezza fissa per contenere logo e titolo */
            margin-bottom: 30px;
            border-bottom: 2px solid #3498db;
        }

        /* Logo posizionato a sinistra */
        .header .logo {
            position: absolute;
            left: 0;
            top: 0;
            height: 60px; /* Regola in base alle dimensioni del tuo logo */
        }

        /* Titolo e data posizionati a destra */
        .header .title-section {
            position: absolute;
            right: 0;
            top: 0;
            text-align: right;
        }

        .header h1 {
            margin: 0;
            color: #2c3e50;
            text-transform: uppercase;
            font-size: 22px;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 12px;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #34495e;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .badge {
            background: #e1f5fe;
            color: #01579b;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 10px;
            color: #7f8c8d;
            border-top: 1px solid #eee;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>PHPrenotation System</h1>
        
        <div class="title-section">
            <h1>Elenco Prenotazioni</h1>
            <p>Export del: {{ date('d/m/Y H:i') }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Email / Tel</th>
                <th>Data e Ora</th>
                <th>Persone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prenotazioni as $p)
                <tr>
                    <td><strong>{{ $p->nome }} {{ $p->cognome }}</strong></td>
                    <td>{{ $p->email }}<br><small>{{ $p->telefono }}</small></td>
                    <td>{{ \Carbon\Carbon::parse($p->data)->format('d/m/Y') }}<br>{{ $p->orario }}</td>
                    <td><span class="badge">{{ $p->posti_prenotati }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Pagina generata automaticamente dal sistema gestionale PHPrenotation.
    </div>
</body>
</html>