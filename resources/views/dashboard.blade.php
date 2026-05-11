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
                        <form method="POST" action="{{ route('aggiungi-giornate') }}">
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
            <h3>Gestione Prenotazioni</h3>
            <form method="POST" action="{{ route('rimuovi-prenotazione') }}" id="main-booking-form">
                <details open>
                    <summary>{{ count($prenotazioni) }} Prenotazioni Totali</summary>
                    @csrf
                    <ul class="scrollable-list">
                        @foreach ($prenotazioni as $prenotazione)
                            <li>
                                <input type="checkbox" name="prenotazioni[]"
                                    value="{{ $prenotazione->id_prenotazione }}">
                                <div class="booking-info">
                                    <span class="badge-people">{{ $prenotazione->posti_prenotati }} Persone</span>
                                    <strong>{{ $prenotazione->nome }} {{ $prenotazione->cognome }}</strong>
                                    <small>{{ $prenotazione->data }} alle {{ $prenotazione->orario }}</small>
                                    <span class="contact-info">{{ $prenotazione->telefono }} -
                                        {{ $prenotazione->email }}</span>
                                </div>
                                <div class="booking-info" style="margin-left:auto;">
                                    <span class="badge"
                                        style="background:{{ $prenotazione->conferma ? '#38a169' : '#e53e3e' }}; color:white;">
                                        {{ $prenotazione->conferma ? 'Confermato' : 'Non confermato' }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </details>

                <div class="actions-footer">
                    <button class="csv-button large-btn" type="submit" formaction="{{ route('esporta-pdf') }}">
                        📥 Esporta prenotazioni in PDF
                    </button>
                    <div class="danger-zone-inline">
                        <button class="delete-btn-sm" type="submit" onclick="return confirm('Sicuro?')">Elimina
                            prenotazioni
                            selezionate</button>
                        <button class="delete-btn-sm" type="submit"
                            formaction="{{ route('rimuovi-tutte-prenotazioni') }}"
                            onclick="return confirm('Sicuro?')">Elimina tutte le prenotazioni</button>
                    </div>
                </div>
            </form>

        </section>

        <!-- LISTA SOTTO -->
        <section class="booking-list">
            <h3>📅 Gestione date</h3>
            <form method="POST" action="{{ route('rimuovi-giornate') }}" id="main-booking-form">

                <details>
                    <summary>{{ count($giornate) }} Giornate Totali,
                        {{ $giornate->map(fn($g) => $g->where('libera', true)->count())->sum() }} Orari Liberi,
                        {{ $giornate->map(fn($g) => $g->where('libera', false)->count())->sum() }} Orari Prenotati
                        <!-- <span class="badge">{{ count($giornate) }} giornate</span> -->

                    </summary>
                    @csrf

                    @foreach ($giornate as $data => $orari)
                        <details class="date-group"
                            style="margin-bottom: 1rem; border: 1px solid #ddd; padding: 10px; border-radius: 8px;">
                            <summary class="summary-flex"
                                style="cursor: pointer; font-weight: bold; font-size: 1.1rem;">
                                <div div class="summary-content">
                                    Data: {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}
                                    <small>({{ $orari->where('libera', true)->count() }} orari liberi -</small>
                                    <small>{{ $orari->where('libera', false)->count() }} orari prenotati)</small>
                                </div>
                                <input type="checkbox" class="select-all-group" onclick="toggleGroup(this, event)">
                            </summary>

                            <ul class="scrollable-list" style="margin-top: 10px; list-style: none; padding-left: 0;">
                                @foreach ($orari as $giorni)
                                    <li>
                                        <input type="checkbox" name="giornate[]" class="child-checkbox"
                                            value="{{ $giorni->id_giornata }}">

                                        <div class="booking-info" style="margin-left: 10px;">
                                            <strong>{{ $giorni->orario }}</strong>
                                        </div>

                                        <div class="booking-info" style="margin-left:auto;">
                                            <span class="badge"
                                                style="background:{{ $giorni->libera ? '#38a169' : '#e53e3e' }}; color: white; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem;">
                                                {{ $giorni->libera ? 'Disponibile' : 'Prenotata' }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </details>
                    @endforeach
                </details>
                <div class="actions-footer">
                    <div class="danger-zone-inline">
                        <button class="delete-btn-sm" type="submit" onclick="return confirm('Sicuro?')">Elimina
                            giornate
                            Selezionate</button>
                        <button class="delete-btn-sm" type="submit"
                            formaction="{{ route('rimuovi-tutte-giornate') }}"
                            onclick="return confirm('Sicuro?')">Elimina tutte le giornate</button>
                    </div>
                </div>
            </form>

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

    function toggleGroup(source, event) {
        // Evita che il click sulla checkbox apra/chiuda il <details>
        event.stopPropagation();

        // Trova il contenitore <details> più vicino
        const parentDetails = source.closest('details');

        // Seleziona tutte le checkbox con classe 'child-checkbox' dentro questo specifico details
        const checkboxes = parentDetails.querySelectorAll('.child-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }
</script>

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
