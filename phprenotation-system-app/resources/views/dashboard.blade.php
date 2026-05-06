<head>
	<title>Dashboard - Prenotazioni</title>
</head>
<div class="alerts-container" style="max-width:1200px; margin: 0 auto; padding: 0 24px;">
    @if(session('success'))
    <div style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-top: 20px;">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; margin-top: 20px; border-radius: 5px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="dashboard-layout">
    <section class="booking-list">
        <h1>Dashboard</h1>
        <p>Qui ci sono tutte le prenotazioni:</p>
        <ul>
            @foreach($prenotazioni as $prenotazione)
                <li>{{ $prenotazione->nome }} {{ $prenotazione->cognome }} - {{ $prenotazione->email }} - {{ $prenotazione->data }} {{ $prenotazione->orario }}</li>
            @endforeach
        </ul>
		<br><br>
		<form class="prenotazione-form" method="POST" action="/rimuovi-tutte-prenotazioni">
			@csrf
			<button class="logout-button" type="submit">Rimuovi tutte le prenotazioni</button>
		</form>
		<form class="prenotazione-form" method="POST" action="/esporta-csv">
			@csrf
			<button class="csv-button" type="submit">Esporta in CSV</button>
		</form>
    </section>

    <aside class="booking-form-card">
        <div class="form-sections">
            <p><strong>Aggiungi una nuova data:</strong></p>
            <form class="prenotazione-form" method="POST" action="/aggiungi-giornate">
                @csrf
                <input type="date" name="data" required>
                <input type="time" name="orario" required>
                <button type="submit">Aggiungi Data</button>
            </form>

            <hr style="border: 0; border-top: 1px solid #eee; margin: 24px 0;">

            <p><strong>Aggiungi range di date:</strong></p>
			<form class="prenotazione-form" method="POST" action="/aggiungi-giornate">
				@csrf
				<label>Data Inizio:</label>
				<input type="date" name="datainizio" required>
				
				<label>Data Fine:</label>
				<input type="date" name="datafine" required>

				<label>Orari:</label>
				<div id="orari-wrapper">
					<div class="orario-item" style="display: flex; gap: 5px; margin-bottom: 8px;">
						<input type="time" name="orari[]" required>
					</div>
				</div>
				
				<button type="button" id="btn-add-orario" style="background: #4a5568; margin-bottom: 15px; font-size: 13px; padding: 5px 10px;">
					+ Aggiungi altro orario
				</button>

				<button type="submit">Aggiungi Range</button>
			</form>
			<p><strong>Rimuovi una nuova data:</strong></p>
			<form class="prenotazione-form" method="POST" action="/rimuovi-giornate">
				@csrf
				<input type="date" name="data" required>
				<input type="time" name="orario">
				<button type="submit">Rimuovi Data</button>
			</form>
			<br><br>
			<form class="prenotazione-form" method="POST" action="/rimuovi-tutte-giornate">
				@csrf
				<button class="logout-button" type="submit">Rimuovi tutte le date</button>
			</form>
			<form class="prenotazione-form" method="POST" action="/rimuovi-tutto">
				@csrf
				<button class="logout-button" type="submit">RIMUOVI TUTTO</button>
			</form>

        </div>

        <!-- Tasto Logout -->
        <button class="logout-button" type="button" onclick="window.location.href='/logout'">Logout</button>
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
	padding: 12px 14px;
	border: 1px solid #eef2f6;
	border-radius: 8px;
	margin-bottom: 10px;
	background: #fff
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

@media (max-width: 600px) {
	.dashboard-layout {
		padding: 12px;
		flex-direction: column-reverse;
		/* I moduli (aside) vanno sopra la lista (section) */
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
		/* Forza la posizione in alto */
	}

	.booking-list {
		order: 2;
		/* Forza la posizione in basso */
	}

	input,
	button {
		font-size: 16px;
		/* Ottimo per il touch e evita zoom su iOS */
	}

	h1 {
		font-size: 24px;
		text-align: center;
	}
}

</style>