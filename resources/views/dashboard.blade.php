<head>
    <title>Dashboard - {{ $username }}</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>
    <div class="top-bar">
        <button class="logout-button-top" type="button" onclick="window.location.href='/logout'">Esci dalla
            Dashboard</button>
    </div>

    <div class="alerts-container" style="max-width:1200px; margin: 0 auto; padding: 0 24px;">
        <div class="list-header">
            <h1>Ciao {{ $username }}!</h1>
            <p>Gestisci le prenotazioni e le giornate</p>
        </div>
        @if (session('success'))
            <div
                style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger"
                style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="dashboard-layout">
        <aside class="booking-form-card">
            <div class="admin-section-horizontal">
                <div class="section-title">
                    <h3>📅 Gestione Date</h3>
                    <form id="reset-all-form" action="{{ route('rimuovi-tutto') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-btn-danger"
                            onclick="return confirm('Sicuro di voler cancellare TUTTO?')">HARD RESET</button>
                    </form>
                </div>

                <div class="forms-row">
                    <details open>
                        <summary>Aggiungi Singola</summary>
                        <form method="POST" action="{{ route('aggiungi-giornate') }}`">
                            @csrf
                            <input type="date" name="data" required>
                            <input type="time" name="orario" required>
                            <button type="submit" class="btn-sm">Aggiungi</button>
                        </form>
                    </details>

                    <details open>
                        <summary>Aggiungi Range</summary>
                        <form method="POST" action="{{ route('aggiungi-giornate') }}">
                            @csrf
                            <div style="display: flex; gap: 5px;">
                                <input type="date" name="datainizio" required placeholder="Inizio">
                                <input type="date" name="datafine" required placeholder="Fine">
                            </div>
                            <div id="orari-wrapper">
                                <div class="orario-item">
                                    <input type="time" name="orari[]" required>
                                </div>
                            </div>
                            <div style="display: flex; gap: 5px;">
                                <button type="button" id="btn-add-orario" class="btn-ghost">+ Orario</button>
                                <button type="submit" class="btn-sm">Aggiungi</button>
                            </div>
                        </form>
                    </details>

                    <details open>
                        <summary class="text-danger">Elimina Date</summary>
                        <form method="POST" action="{{ route('rimuovi-giornate') }}">
                            @csrf
                            <input type="date" name="data" required>
                            <input type="time" name="orario">
                            <button type="submit" class="delete-btn-sm" style="width:100%"
                                onclick="return confirm('Sicuro?')">Rimuovi</button>
                        </form>
                    </details>
                </div>
            </div>
        </aside>

        <!-- LISTA SOTTO -->
        <section class="booking-list">
            <details open>
                <summary>Lista Prenotazioni</summary>
                <form method="POST" action="{{ route('rimuovi-prenotazione') }}" id="main-booking-form">
                    @csrf
                    <ul class="scrollable-list">
                        @foreach ($prenotazioni as $prenotazione)
                            <li>
                                <input type="checkbox" name="prenotazioni[]"
                                    value="{{ $prenotazione->id_prenotazione }}">
                                <div class="booking-info">
                                    <span class="badge">{{ $prenotazione->posti_prenotati }} Persone</span>
                                    <strong>{{ $prenotazione->nome }} {{ $prenotazione->cognome }}</strong>
                                    <small>{{ $prenotazione->data }} alle {{ $prenotazione->orario }}</small>
                                    <span class="contact-info">{{ $prenotazione->telefono }} -
                                        {{ $prenotazione->email }}</span>
                                </div>
                                <div class="booking-info" style="margin-left:auto;">
                                    <span class="badge" style="background:{{ $prenotazione->conferma ? '#38a169' : '#e53e3e' }};">
                                        {{ $prenotazione->conferma ? 'Confermato' : 'Non confermato' }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="actions-footer">
                        <button class="csv-button large-btn" type="submit" formaction="{{ route('esporta-csv') }}">
                            📥 Esporta in CSV
                        </button>
                        <div class="danger-zone-inline">
                            <button class="delete-btn-sm" type="submit" onclick="return confirm('Sicuro?')">Elimina
                                Selezionate</button>
                            <button class="delete-btn-sm" type="submit"
                                formaction="{{ route('rimuovi-tutte-prenotazioni') }}"
                                onclick="return confirm('Sicuro?')">Svuota Lista</button>
                        </div>
                    </div>
                </form>
            </details>
        </section>
    </div>
</body>
<script>
    document.getElementById('btn-add-orario').addEventListener('click', function() {
        const wrapper = document.getElementById('orari-wrapper');
        const div = document.createElement('div');
        div.className = 'orario-item';
        div.style.display = 'flex';
        div.style.gap = '5px';
        div.style.marginBottom = '8px';
        const input = document.createElement('input');
        input.type = 'time';
        input.name = 'orari[]';
        input.required = true;
        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.innerHTML = '✕';
        removeBtn.style.background = '#e53e3e';
        removeBtn.style.padding = '5px 10px';
        removeBtn.onclick = function() {
            div.remove();
        };
        div.appendChild(input);
        div.appendChild(removeBtn);
        wrapper.appendChild(div);
    });
</script>

<style>
    :root {
        --bg: #f5f7fb;
        --card: #ffffff;
        --accent: #2b6cb0;
        --muted: #6b7280;
        --shadow: 0 4px 12px rgba(32, 33, 36, 0.08);
        --radius: 10px;
    }

    * {
        box-sizing: border-box
    }

    body {
        margin: 0;
        font-family: Inter, sans-serif;
        background: var(--bg);
        color: #111;
        padding-top: 60px;
        /* Spazio per la top-bar */
    }

    /* Top Bar e Logout */
    .top-bar {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        height: 60px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 0 24px;
        z-index: 100;
    }

    .logout-button-top {
        background: #e53e3e;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        margin-right: 10px;
    }

    .darkmode-button-top {
        background: #2b6cb0;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    /* Layout Principale */
    .dashboard-layout {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px 24px 24px;
        display: flex;
        flex-direction: column;
        /* Cambiato da Row a Column */
        gap: 24px;
    }

    /* Aside modificata in Orizzontale */
    .booking-form-card {
        width: 100%;
        background: var(--card);
        padding: 20px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    .admin-section-horizontal {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .section-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }

    .forms-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .forms-row details {
        flex: 1;
        min-width: 250px;
        margin-bottom: 0;
    }

    /* Lista Prenotazioni */
    .booking-list {
        background: var(--card);
        padding: 28px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    /* Elementi comuni */
    h1 {
        margin: 0 0 8px;
        font-size: 28px;
        color: var(--accent)
    }

    h3 {
        margin: 0;
        font-size: 18px;
        color: var(--accent);
    }

    p {
        margin: 0 0 18px;
        color: var(--muted)
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0
    }

    li {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        margin-bottom: 10px;
        background: #fff;
    }

    li input[type="checkbox"] {
        transform: scale(1.4);
        margin-right: 20px;
        width: auto;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 8px
    }

    input {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #dbe3ee;
        border-radius: 6px;
        font-size: 14px;
    }

    button {
        border: 0;
        padding: 10px 14px;
        background: var(--accent);
        color: #fff;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600
    }

    .csv-button {
        background: #38a169;
        width: 100%;
    }

    .booking-info {
        display: flex;
        flex-direction: column;
    }

    .badge {
        background: #edf2f7;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: bold;
        width: fit-content;
    }

    .contact-info {
        font-size: 12px;
        color: var(--muted);
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
        background: #feb2b2;
        color: #9b2c2c;
        padding: 8px;
        font-size: 13px;
    }

    details {
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 6px;
        padding: 10px;
    }

    summary {
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .btn-ghost {
        background: #edf2f7;
        color: #4a5568;
        font-size: 12px;
    }

    .text-btn-danger {
        background: transparent;
        color: #e53e3e;
        font-size: 11px;
        text-decoration: underline;
        padding: 0;
    }

    .text-danger {
        color: #e53e3e;
    }

    /* Sovrascrittura variabili per la Dark Mode */
    body.dark-mode {
        --bg: #1a202c;
        /* Sfondo scuro */
        --card: #2d3748;
        /* Sfondo card */
        --accent: #63b3ed;
        /* Azzurro più chiaro per contrasto */
        --muted: #a0aec0;
        /* Testo secondario chiaro */
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    /* Correzioni specifiche per elementi con colori hardcoded */
    body.dark-mode {
        color: #f7fafc;
    }

    body.dark-mode li {
        background: #2d3748;
        border-color: #4a5568;
    }

    body.dark-mode input {
        background: #1a202c;
        color: white;
        border-color: #4a5568;
    }

    body.dark-mode details {
        background: #2d3748;
        border-color: #4a5568;
    }

    body.dark-mode .btn-ghost {
        background: #4a5568;
        color: #edf2f7;
    }

    body.dark-mode .badge {
        background: #4a5568;
        color: #e2e8f0;
    }

    @media (max-width: 768px) {
        .forms-row {
            flex-direction: column;
        }

        .top-bar {
            position: relative;
            justify-content: center;
            padding: 10px;
        }

        body {
            padding-top: 0;
        }
    }
</style>
