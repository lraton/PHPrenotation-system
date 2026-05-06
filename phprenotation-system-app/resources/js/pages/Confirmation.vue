<template>
    <div class="main-wrapper">
        <h1>Conferma Prenotazione</h1>
        <p>Grazie, {{ booking.name }} </p>
        <p>per aver scelto il nostro servizio di prenotazione. La tua prenotazione è stata confermata con successo!</p>
        <p>Ti abbiamo inviato una email di conferma con i dettagli della tua prenotazione. Se hai bisogno di modificare o cancellare la tua prenotazione, ti pre
ghiamo di contattarci il prima possibile. Siamo a tua disposizione per qualsiasi domanda o richiesta speciale.</p>
        <button @click="$inertia.get('/')">Torna alla Home</button>
        </div>
</template>
<script setup>
const props = defineProps({
    booking: Object
});
</script>
