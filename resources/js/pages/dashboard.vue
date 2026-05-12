<template>
    <div class="top-bar">
        <button class="nav-button" @click="$inertia.visit('/database')">Visualizza Database</button>
        <button class="logout-button" @click="$inertia.post('/logout')">Esci dalla Dashboard</button>
    </div>

    <div class="alerts-container" style="max-width:1200px; margin: 0 auto; padding: 0 24px;">
        <div class="list-header">
            <h1>Ciao {{ username }}!</h1>
            <p>Gestisci le prenotazioni e le giornate operative.</p>
        </div>

        <!-- Feedback Alerts -->
        <div v-if="$page.props.flash.success" class="alert-success">{{ $page.props.flash.success }}</div>
        <div v-if="$page.props.flash.error" class="alert-error">{{ $page.props.flash.error }}</div>
        <div v-if="Object.keys($page.props.errors).length > 0" class="alert-error">
            <ul>
                <li v-for="(error, index) in $page.props.errors" :key="index">{{ error }}</li>
            </ul>
        </div>
    </div>

    <div class="dashboard-layout">
        <!-- ASIDE: GESTIONE DATE -->
        <aside class="booking-form-card">
            <div class="admin-section-horizontal">
                <div class="section-title">
                    <h3>📅 Configurazione Date</h3>
                    <button @click="hardReset" class="text-btn-danger">HARD RESET</button>
                </div>

                <div class="forms-row">
                    <!-- Aggiungi Singola -->
                    <details open>
                        <summary>Aggiungi Singola</summary>
                        <form @submit.prevent="submitAggiungiSingola">
                            <input type="date" v-model="formSingola.date" required>
                            <input type="time" v-model="formSingola.orario" required>
                            <button type="submit" class="btn-sm" :disabled="formSingola.processing">Aggiungi</button>
                        </form>
                    </details>

                    <!-- Aggiungi Range -->
                    <details open>
                        <summary>Aggiungi Range</summary>
                        <form @submit.prevent="submitAggiungiRange">
                            <div class="input-group-row">
                                <input type="date" v-model="formRange.datainizio" required>
                                <input type="date" v-model="formRange.datafine" required>
                            </div>
                            <div class="orari-wrapper">
                                <div v-for="(ora, idx) in formRange.orari" :key="idx" class="orario-item">
                                    <input type="time" v-model="formRange.orari[idx]" required>
                                    <button v-if="formRange.orari.length > 1" type="button"
                                        @click="removeOrarioField(idx)" class="remove-ora">×</button>
                                </div>
                            </div>
                            <div class="input-group-row">
                                <button type="button" @click="addOrarioField" class="btn-ghost">+ Orario</button>
                                <button type="submit" class="btn-sm" :disabled="formRange.processing">Genera</button>
                            </div>
                        </form>
                    </details>

                    <!-- Elimina per Data -->
                    <details>
                        <summary class="text-danger">Rimuovi per Data</summary>
                        <form @submit.prevent="eliminaGiornata">
                            <input type="date" v-model="formElimina.date" required>
                            <input type="time" v-model="formElimina.orario" placeholder="Tutti gli orari">
                            <button type="submit" class="delete-btn-sm">Rimuovi</button>
                        </form>
                    </details>
                </div>
            </div>
        </aside>

        <!-- SECTION: LISTA PRENOTAZIONI -->
        <section class="booking-list">
            <div class="section-header">
                <h3>👥 Prenotazioni Attive</h3>
                <span class="count-badge">{{ prenotazioni.length }} totali</span>
            </div>

            <form @submit.prevent="eliminaPrenotazioniSelezionate">
                <div class="scrollable-list">
                    <ul>
                        <li v-for="p in prenotazioni" :key="p.id_prenotazione">
                            <input type="checkbox" v-model="selectedPrenotazioni" :value="p.id_prenotazione">
                            <div class="booking-info">
                                <strong>{{ p.nome }} {{ p.cognome }}</strong>
                                <small>{{ p.data }} alle {{ p.orario }} — {{ p.posti_prenotati }} pers.</small>
                                <span class="contact-info">{{ p.telefono }} | {{ p.email }}</span>
                            </div>
                            <div class="status-info">
                                <span class="badge"
                                    :style="{ background: p.conferma ? '#38a169' : '#e53e3e', color: 'white' }">
                                    {{ p.conferma ? 'Confermato' : 'In attesa' }}
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="actions-footer">
                    <button class="csv-button large-btn" type="button" @click="esportaPDF">
                        📥 Scarica Lista PDF
                    </button>
                    <div class="danger-zone-inline">
                        <button class="delete-btn-sm" type="submit" :disabled="!selectedPrenotazioni.length">Elimina
                            selezionate</button>
                        <button class="delete-btn-sm" type="button" @click="eliminaTuttePrenotazioni">Svuota
                            lista</button>
                    </div>
                </div>
            </form>
        </section>

        <!-- SECTION: VISUALIZZAZIONE CALENDARIO -->
        <section class="booking-list">
            <h3>📅 Stato Disponibilità</h3>
            <div class="date-management-container">
                <details>
                    <summary>


                        <p class="summary-text">{{ freeOrari }} slot liberi su {{ totalOrari }} totali</p>
                    </summary>
                    <details v-for="(orari, data) in giornateRaggruppate" :key="data" class="date-group">
                        <summary class="summary-flex">
                            <div class="summary-content">
                                <strong>{{ data }}</strong>
                                <small>({{orari.filter(o => o.libera).length}} disponibili)</small>
                            </div>
                            <input type="checkbox" @change="toggleGroup(orari, $event)" @click.stop
                                title="Seleziona tutto il giorno">
                        </summary>

                        <div class="details-content">
                            <ul class="grid-list">
                                <li v-for="g in orari" :key="g.id_giornata" :class="{ 'is-booked': !g.libera }">
                                    <input type="checkbox" v-model="formElimina.giornate" :value="g.id_giornata">
                                    <div class="slot-info">
                                        <strong>{{ g.orario }}</strong>
                                        <span class="status-dot" :title="g.libera ? 'Libero' : 'Occupato'"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </details>
                </details>
            </div>

            <div class="actions-footer">
                <div class="danger-zone-inline">
                    <button @click="eliminaGiornateSelezionate" class="delete-btn-sm"
                        :disabled="!formElimina.giornate.length">Elimina Selezionate</button>
                    <button @click="eliminaTutteGiornate" class="delete-btn-sm">Elimina tutte le date</button>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import '../../css/dashboard.css';

const props = defineProps({
    username: String,
    prenotazioni: Array,
    giornate: Array
});

// --- FORMS ---
const formSingola = useForm({ date: '', orario: '' });
const formRange = useForm({ datainizio: '', datafine: '', orari: [''] });
const formElimina = useForm({ date: '', orario: '', giornate: [] });

// --- STATE ---
const selectedPrenotazioni = ref([]);

// --- COMPUTED ---
const giornateRaggruppate = computed(() => {
    return props.giornate.reduce((acc, item) => {
        if (!acc[item.data]) acc[item.data] = [];
        acc[item.data].push(item);
        return acc;
    }, {});
});

const totalOrari = computed(() => props.giornate.length);
const freeOrari = computed(() => props.giornate.filter(g => g.libera).length);

// --- METHODS ---
const addOrarioField = () => formRange.orari.push('');
const removeOrarioField = (idx) => formRange.orari.splice(idx, 1);

const submitAggiungiSingola = () => {
    formSingola.post('/aggiungi-giornate', { onSuccess: () => formSingola.reset() });
};

const submitAggiungiRange = () => {
    formRange.post('/aggiungi-giornate', { onSuccess: () => formRange.reset() });
};

const hardReset = () => {
    if (confirm('ATTENZIONE: Questo cancellerà ogni dato nel database. Continuare?')) {
        router.post('/rimuovi-tutto');
    }
};

const esportaPDF = () => window.open('/esporta-pdf');

const eliminaGiornata = () => {
    if (confirm('Vuoi rimuovere gli slot per questa data?')) {
        formElimina.post('/rimuovi-giornate');
    }
};

const eliminaPrenotazioniSelezionate = () => {
    if (confirm('Eliminare le prenotazioni selezionate?')) {
        router.post('/rimuovi-prenotazione', { prenotazioni: selectedPrenotazioni.value }, {
            onSuccess: () => selectedPrenotazioni.value = []
        });
    }
};

const eliminaTuttePrenotazioni = () => {
    if (confirm('Vuoi svuotare interamente la lista prenotazioni?')) {
        router.post('/rimuovi-tutte-prenotazioni');
    }
};

const eliminaGiornateSelezionate = () => {
    if (confirm('Rimuovere gli slot orari selezionati?')) {
        formElimina.post('/rimuovi-giornate', { onSuccess: () => formElimina.giornate = [] });
    }
};

const eliminaTutteGiornate = () => {
    if (confirm('Rimuovere tutte le date configurate?')) {
        router.post('/rimuovi-tutto');
    }
};

const toggleGroup = (orari, event) => {
    const isChecked = event.target.checked;
    const current = [...formElimina.giornate];
    orari.forEach(g => {
        const idx = current.indexOf(g.id_giornata);
        if (isChecked && idx === -1) current.push(g.id_giornata);
        else if (!isChecked && idx !== -1) current.splice(idx, 1);
    });
    formElimina.giornate = current;
};
</script>