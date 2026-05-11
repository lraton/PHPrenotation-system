<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Inspector</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">

    <style>
        :root {
            /* Colori Brand & UI */
            --bg: #f5f7fb;
            --card: #ffffff;
            --accent: #2b6cb0;
            --accent-hover: #23568d;
            --text-main: #111827;
            --text-muted: #6b7280;
            --border-color: #e2e8f0;
            --input-border: #dbe3ee;

            /* Colori Semantici */
            --success: #38a169;
            --success-hover: #2f855a;
            --danger: #e53e3e;
            --danger-light: #feb2b2;
            --danger-dark: #9b2c2c;
            --ghost-bg: #edf2f7;
            --ghost-text: #4a5568;
            --ghost-bg-hover: #e2e8f0;
            --ghost-text-hover: #2d3748;

            /* Spaziature (Padding/Gaps) */
            --space-xs: 8px;
            --space-sm: 12px;
            --space-md: 16px;
            --space-lg: 24px;
            --space-xl: 28px;

            /* Bordi e Ombre */
            --radius-sm: 4px;
            --radius-md: 6px;
            --radius-lg: 10px;
            --shadow: 0 4px 12px rgba(32, 33, 36, 0.08);

            /* Layout */
            --top-bar-height: 60px;
            --max-width: 1200px;
        }

        /* Reset & Base */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-main);
            padding-top: var(--top-bar-height);
            line-height: 1.5;
        }

        /* Top Bar */
        .top-bar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: var(--top-bar-height);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 var(--space-lg);
            z-index: 100;
        }

        .logout-button-top {
            background: var(--danger);
        }

        .logout-button-top {
            color: white;
            border: none;
            padding: var(--space-xs) var(--space-md);
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            margin-left: 10px;
            transition: opacity 0.2s;
        }

        .logout-button-top:hover {
            background: var(--danger-dark);
            opacity: 0.9;
        }


        /* Layout Principale */
        .dashboard-layout {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 var(--space-lg) var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* Cards */
        .booking-form-card,
        .booking-list {
            background: var(--card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
        }

        .booking-form-card {
            padding: 20px;
        }

        .booking-list {
            padding: var(--space-xl);
        }

        /* Forms & Admin Section */
        .admin-section-horizontal {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: var(--space-xs);
            margin-bottom: var(--space-md);
        }

        .forms-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .forms-row details {
            flex: 1;
            min-width: 250px;
        }

        /* Tipografia */
        h1 {
            margin: 0 0 var(--space-xs);
            font-size: 28px;
            color: var(--accent);
        }

        h3 {
            margin: 0;
            font-size: 18px;
            color: var(--accent);
        }

        p {
            margin: 0 0 18px;
            color: var(--text-muted);
        }

        /* Liste Prenotazioni */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) 14px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            margin-bottom: 10px;
            background: var(--card);
            transition: border-color 0.2s;
        }

        li:hover {
            border-color: var(--accent);
        }

        li input[type="checkbox"] {
            transform: scale(1.4);
            margin-right: 20px;
            width: auto;
        }

        /* Elementi Form */
        form {
            display: flex;
            flex-direction: column;
            gap: var(--space-xs);
        }

        input {
            width: 100%;
            padding: var(--space-xs) 10px;
            border: 1px solid var(--input-border);
            border-radius: var(--radius-md);
            font-size: 14px;
            outline-color: var(--accent);
        }

        button {
            border: 0;
            padding: 10px 14px;
            background: var(--accent);
            color: #fff;
            border-radius: var(--radius-md);
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }

        button:hover {
            background: var(--accent-hover);
        }

        .csv-button {
            background: var(--success);
            width: 100%;
        }

        .csv-button:hover {
            background: var(--success-hover);
            opacity: 0.9;
        }

        /* Componenti UI */
        .badge {
            background: var(--ghost-bg);
            padding: 2px var(--space-xs);
            border-radius: var(--radius-sm);
            font-size: 11px;
            font-weight: bold;
            width: fit-content;
            margin-left: auto;
        }

        .badge-people {
            background: var(--ghost-bg);
            padding: 2px var(--space-xs);
            border-radius: var(--radius-sm);
            font-size: 11px;
            font-weight: bold;
            width: fit-content;
        }

        .contact-info {
            font-size: 12px;
            color: var(--text-muted);
        }

        .actions-footer {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .danger-zone-inline {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .delete-btn-sm {
            background: var(--danger);
            padding: var(--space-xs);
            font-size: 13px;
        }

        .delete-btn-sm:hover {
            background: var(--danger-dark);
        }

        details {
            background: #f8fafc;
            border: 1px solid var(--ghost-bg);
            border-radius: var(--radius-md);
            padding: 10px;
        }

        summary {
            font-weight: 600;
            cursor: pointer;
            margin-bottom: var(--space-xs);
            font-size: 14px;
        }

        .btn-ghost {
            background: var(--ghost-bg);
            color: var(--ghost-text);
            font-size: 12px;
        }

        .btn-ghost:hover {
            background: var(--ghost-bg-hover);
            color: var(--ghost-text-hover);
        }

        .text-btn-danger {
            background: transparent;
            color: var(--danger);
            font-size: 11px;
            text-decoration: underline;
            padding: 0;
        }

        .text-btn-danger:hover {
            color: var(--danger-dark);
            background: transparent;
        }

        .text-danger {
            color: var(--danger);
        }

        /* Flex Helpers */
        .summary-flex {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding-right: 10px;
        }

        .summary-flex::before {
            content: "▶";
            display: inline-block;
            margin-right: 8px;
            transition: transform 0.2s ease;
        }

        .date-group[open] .summary-flex::before {
            transform: rotate(90deg);
        }

        .summary-flex .select-all-group {
            margin-left: auto;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .summary-flex span {
            margin-right: 10px;
        }

        .summary-flex small {
            color: var(--text-muted);
            font-weight: normal;
        }

        .booking-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .forms-row {
                flex-direction: column;
            }

            .top-bar {
                position: relative;
                justify-content: center;
                padding: 10px;
                height: auto;
            }

            body {
                padding-top: 0;
            }

            .dashboard-layout {
                padding: var(--space-md);
            }

            .danger-zone-inline {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <style>
        /* Estensioni specifiche per le tabelle mantenendo lo stile coerente */
        .db-table-container {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: var(--bg);
            color: var(--text-muted);
            padding: var(--space-sm);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--border-color);
        }

        td {
            padding: var(--space-sm);
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
        }

        tr:hover td {
            background: var(--ghost-bg);
        }

        .fk-badge {
            background: var(--accent);
            color: white;
            padding: 2px 6px;
            border-radius: var(--radius-sm);
            font-family: monospace;
            font-size: 12px;
        }

        .pk-text {
            color: var(--accent);
            font-weight: bold;
            font-family: monospace;
        }

        .status-pill {
            padding: 2px 8px;
            border-radius: var(--radius-lg);
            font-size: 11px;
            font-weight: bold;
        }

        .status-on {
            background: #c6f6d5;
            color: var(--success-hover);
        }

        .status-off {
            background: #fed7d7;
            color: var(--danger);
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <button class="logout-button-top" onclick="window.location.href='/logout'">Logout</button>
    </div>

    <main class="dashboard-layout">

        <header>
            <h1>Database Inspector</h1>
            <p>Visualizzazione completa dello schema e delle relazioni tra le tabelle.</p>
        </header>

        <!-- TABELLA PRENOTAZIONE -->
        <section class="booking-list">
            <div class="section-title">
                <h3>Tabella: Prenotazione</h3>
                <span class="badge">Relazione: BelongsTo(Giornata)</span>
            </div>

            <div class="db-table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID (PK)</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>QR Token</th>
                            <th>Cancel Token</th>
                            <th>Posti</th>
                            <th>Conf.</th>
                            <th>id_giornata (FK)</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prenotazioni as $p)
                            <tr>
                                <td class="pk-text">#{{ $p->id_prenotazione }}</td>
                                <td>
                                    <div class="booking-info">
                                        <strong>{{ $p->nome }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="booking-info">
                                        <strong>{{ $p->cognome }}</strong>
                                    </div>
                                </td>
                                <td class="contact-info">{{ $p->telefono }}</td>
                                <td class="contact-info">{{ $p->email }}</td>
                                <td class="contact-info">{{ $p->qr_token }}</td>
                                <td class="contact-info">{{ $p->cancel_token }}</td>
                                <td><span class="badge-people">{{ $p->posti_prenotati }}</span></td>
                                <td>
                                    <span class="status-pill {{ $p->conferma ? 'status-on' : 'status-off' }}">
                                        {{ $p->conferma ? 'SI' : 'NO' }}
                                    </span>
                                </td>
                                <td><span class="fk-badge">{{ $p->id_giornata }}</span></td>
                                <td class="contact-info">{{ $p->data }} {{ $p->orario }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <div class="forms-row">

            <!-- TABELLA GIORNATA -->
            <section class="booking-list" style="flex: 2;">
                <div class="section-title">
                    <h3>Tabella: Giornata</h3>
                </div>
                <div class="db-table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID (PK)</th>
                                <th>Data</th>
                                <th>Orario</th>
                                <th>Stato</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($giornate as $g)
                                <tr>
                                    <td class="pk-text">{{ $g->id_giornata }}</td>
                                    <td>{{ $g->data }}</td>
                                    <td>{{ $g->orario }}</td>
                                    <td>
                                        <span class="status-pill {{ $g->libera ? 'status-on' : 'status-off' }}">
                                            {{ $g->libera ? 'Libera' : 'Occupata' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- TABELLA ADMIN -->
            <section class="booking-list" style="flex: 1;">
                <div class="section-title">
                    <h3>Tabella: Admin</h3>
                </div>
                <div class="db-table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Token</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $a)
                                <tr>
                                    <td><strong>{{ $a->username }}</strong></td>
                                    <td class="contact-info">{{ $a->token ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

        </div>

        <footer class="actions-footer">
            <button class="btn-ghost" onclick="window.location.href='/dashboard'">Torna alla Dashboard</button>
        </footer>

    </main>

</body>

</html>
