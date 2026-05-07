<head>
	<title>Dashboard - {{ $username }}</title>
</head>

<div class="dashboard-layout">
    <section class="booking-list">
        <div class="list-header">
            <h1>Ciao {{ $username }}!</h1>
            <p>Gestisci le prenotazioni attive:</p>
        </div>

        <form method="POST" action="/rimuovi-prenotazione" id="main-booking-form">
            @csrf
            <ul class="scrollable-list">
                @foreach($prenotazioni as $prenotazione)    
                    <li>
                        <input type="checkbox" name="prenotazioni[]" value="{{ $prenotazione->id_prenotazione }}">
                        <div class="booking-info">
                            <span class="badge">{{ $prenotazione->posti_prenotati }} Persone</span>
                            <strong>{{ $prenotazione->nome }} {{ $prenotazione->cognome }}</strong>
                            <small>{{ $prenotazione->data }} alle {{ $prenotazione->orario }}</small>
                            <span class="contact-info">{{ $prenotazione->numero }} - {{ $prenotazione->email }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="actions-footer">
                <button class="csv-button large-btn" type="submit" formaction="/esporta-csv">
                    📥 Esporta Selezionate in CSV
                </button>
                
                <div class="danger-zone-inline">
                    <button class="delete-btn-sm" type="submit" onclick="return confirm('Sicuro di voler cancellare le prenotazioni selezionate?')">Elimina Selezionate</button>
                    <button class="delete-btn-sm" type="submit" formaction="/rimuovi-tutte-prenotazioni" onclick="return confirm('Sicuro di voler cancellare TUTTO?')">Svuota Lista</button>
                </div>
            </div>
        </form>
    </section>

    <aside class="booking-form-card">
        <div class="admin-section">
            <h3>📅 Gestione Date</h3>
            
            <details>
                <summary>Aggiungi Singola Data</summary>
                <form method="POST" action="/aggiungi-giornate">
                    @csrf
                    <input type="date" name="data" required>
                    <input type="time" name="orario" required>
                    <button type="submit" class="btn-sm">Aggiungi</button>
                </form>
            </details>

            <details open>
                <summary>Aggiungi Range Date</summary>
                <form method="POST" action="/aggiungi-giornate">
                    @csrf
					<label for="datainizio">Data Inizio:</label>
					<input type="date" name="datainizio" required>
					<label for="datafine">Data Fine:</label>
					<input type="date" name="datafine" required>
                    
					<label for="orari">Orari (aggiungi almeno uno):</label>
                    <div id="orari-wrapper">
                        <div class="orario-item">
                            <input type="time" name="orari[]" required>
                        </div>
                    </div>
                    <button type="button" id="btn-add-orario" class="btn-ghost">+ Orario</button>
                    <button type="submit">Genera Range</button>
                </form>
            </details>

            <details>
                <summary class="text-danger">Elimina Date</summary>
                <form method="POST" action="/rimuovi-giornate">
                    @csrf
                    <input type="date" name="data" required>
                    <input type="time" name="orario">
                    <button type="submit" class="logout-button" style="margin-top:0" onclick="return confirm('Sicuro di voler cancellare la data selezionata?')">Rimuovi</button>
                </form>
            </details>
        </div>

        <div class="admin-footer">
            <button class="logout-button" type="button" onclick="window.location.href='/logout'">Esci dalla Dashboard</button>
            <form id="reset-all-form" action="/rimuovi-tutto" method="POST">
				@csrf
			 <button type="submit" class="text-btn-danger" onclick="return confirm('Sicuro di voler cancellare TUTTO? Questa azione è irreversibile!')">HARD RESET (TUTTO)</button>
			</form>
        </div>
    </aside>
</div>
<script>
	document.getElementById('btn-add-orario').addEventListener('click', function() {
    const wrapper = document.getElementById('orari-wrapper');
    
    // Crea un nuovo contenitore per l'orario
    const div = document.createElement('div');
    div.className = 'orario-item';
    div.style.display = 'flex';
    div.style.gap = '5px';
    div.style.marginBottom = '8px';

    // Crea l'input
    const input = document.createElement('input');
    input.type = 'time';
    input.name = 'orari[]';
    input.required = true;

    // Crea il tasto per rimuovere quel singolo orario
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
	font-family: Inter, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
	background: var(--bg);
	color: #111;
	min-height: 100vh
}

.dashboard-layout {
	max-width: 1200px;
	margin: 0 auto;
	padding: 24px;
	display: flex;
	gap: 24px;
	align-items: flex-start
}

.booking-list {
	flex: 1;
	background: var(--card);
	padding: 28px;
	border-radius: var(--radius);
	box-shadow: var(--shadow)
}

.booking-form-card {
	width: 360px;
	background: var(--card);
	padding: 28px;
	border-radius: var(--radius);
	box-shadow: var(--shadow);
	position: sticky;
	top: 24px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}

h1 {
	margin: 0 0 8px;
	font-size: 28px;
	color: var(--accent)
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
    border: 2px solid #7e7e7e;
    border-radius: 8px;
    margin-bottom: 10px;
    background: #fff;
}

li input[type="checkbox"] {
    width: auto;
    margin: 0;
    cursor: pointer;
	-ms-transform: scale(1.4); /* IE */
	-moz-transform: scale(1.4); /* FF */
	-webkit-transform: scale(1.4); /* Safari and Chrome */
	-o-transform: scale(1.4); /* Opera */
	transform: scale(1.4);
	margin-right: 32px;
}

form {
	display: flex;
	flex-direction: column;
	gap: 12px
}

input {
	width: 100%;
	padding: 10px 12px;
	border: 1px solid #dbe3ee;
	border-radius: 8px;
	font: inherit
}

button {
	border: 0;
	padding: 12px 16px;
	background: var(--accent);
	color: #fff;
	border-radius: 8px;
	cursor: pointer;
	font-weight: 600
}

.logout-button {
	background: #e53e3e;
	margin-top: 30px;
	width: 100%;
}

.csv-button {
	background: #38a169;
	margin-top: 10px;
	width: 100%;
}

/* Layout Migliorato per la lista */
.booking-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
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

/* Footer Azioni */
.actions-footer {
    margin-top: 25px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.large-btn {
    padding: 18px !important;
    font-size: 18px !important;
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

.delete-btn-sm:hover {
    background: #fc8181;
}

/* Sidebar Amministrazione */
.admin-section h3 {
    font-size: 18px;
    margin-bottom: 20px;
    color: var(--accent);
}

details {
    background: #f8fafc;
    border-radius: 6px;
    margin-bottom: 10px;
    padding: 10px;
}

summary {
    font-weight: 600;
    cursor: pointer;
    margin-bottom: 5px;
}


.btn-ghost {
    background: #edf2f7;
    color: #4a5568;
    font-size: 12px;
    padding: 5px;
}

.text-btn-danger {
    background: transparent;
    color: #e53e3e;
    font-size: 11px;
    margin-top: 15px;
    text-decoration: underline;
}

.admin-footer {
    margin-top: 20px;
    border-top: 1px solid #eee;
    padding-top: 10px;
    display: flex;
    flex-direction: column;
}

.text-danger { color: #e53e3e; }

@media (max-width: 600px) {
	.dashboard-layout {
		padding: 12px;
		flex-direction: column-reverse;
		gap: 20px;
		width: 100%;
        box-sizing: border-box;
	}

	.alerts-container {
		padding: 0 12px;
	}

	.booking-form-card {
		width: 100%;
		position: static;
		padding: 20px;
		order: 1;
	}

	.booking-list {
		order: 2;
	}

	input,
	button {
		font-size: 16px;
	}

	h1 {
		font-size: 24px;
		text-align: center;
	}
}

</style>