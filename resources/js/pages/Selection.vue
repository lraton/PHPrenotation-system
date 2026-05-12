<template>
    <div v-if="$page.props.flash.success" class="alert-success">
        {{ $page.props.flash.success }}
    </div>

    <div v-if="$page.props.flash.error" class="alert-error">
        {{ $page.props.flash.error }}
    </div>
    
    <div v-if="Object.keys($page.props.errors).length > 0" class="alert-error">
        <ul>
            <li v-for="(error, index) in $page.props.errors" :key="index">
                {{ error[0] }}
            </li>
        </ul>
    </div>
    <div class="main-wrapper">

        <form @submit.prevent="submit">
            <fieldset>
                <legend>{{ dataScelta }}</legend>

                <label for="nome">Nome:</label>
                <input type="text" v-model="form.nome" id="nome" placeholder="Mario" required>

                <label for="cognome">Cognome:</label>
                <input type="text" v-model="form.cognome" id="cognome" placeholder="Rossi" required>

                <label for="email">Email:</label>
                <input type="email" v-model="form.email" id="email" placeholder="mario.rossi@example.com" required>

                <label for="telefono">Telefono:</label>
                <input type="tel" v-model="form.telefono" id="telefono" 
                       pattern="[0-9]{10}" placeholder="3331234567" required>

                <label for="orario">Scegli un orario:</label>
                <select v-model="form.orario" id="orario" required>
                    <option value="" disabled>Scegli un orario</option>
                    <option v-for="o in orari" :key="o.id_giornata" :value="o.orario">
                        {{ o.orario }}
                    </option>
                </select>
                
                <label for="posti">Numero di posti:</label>
                <select v-model="form.posti" id="posti" required>
                    <option value="" disabled>Numero di posti</option>
                    <option v-for="n in 20" :key="n" :value="n">{{ n }}</option>
                </select>

                <input type="submit" value="Continua" :disabled="form.processing">
            </fieldset>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import '../../css/app.css';

const props = defineProps({
    dataScelta: String,
    orari: Array
});

const form = useForm({
    nome: '',
    cognome: '',
    email: '',
    telefono: '',
    posti: '',
    orario: props.orari.length > 0 ? props.orari[0].orario : ''
});

const submit = () => {
    form.post('/prenotazione');
};
</script>