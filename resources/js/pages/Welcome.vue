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

        <p id="intro">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.<br>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.<br>
            La leggenda narra che chi riuscirà a superare le difficoltà della torre<br>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.<br>
        </p>

        <!-- Form di selezione -->
        <form @submit.prevent="submitForm">
            <table class="table-responsive">
                <tbody>
                    <tr v-for="(chunk, index) in chunkedGiornate" :key="index">
                        <td v-for="giorno in chunk" :key="giorno.raw">
                            <!-- Aggiungiamo una classe 'disabled' per lo stile -->
                            <label :class="{ 'text-muted': giorno.is_past, 'disabled-label': giorno.is_past }">
                                <input type="radio" name="date" v-model="selectedDate" :value="giorno.raw"
                                    :disabled="giorno.is_past" required>
                                {{ giorno.formatted }}
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>

            <input type="submit" value="Continua" :disabled="!selectedDate">
        </form>

    </div>
</template>

<script>
import { router } from '@inertiajs/vue3'

export default {
    props: {
        giornateIniziali: Array
    },
    data() {
        return {
            selectedDate: null,
        }
    },
    computed: {
        chunkedGiornate() {
            const chunks = [];
            for (let i = 0; i < this.giornateIniziali.length; i += 3) {
                chunks.push(this.giornateIniziali.slice(i, i + 3));
            }
            return chunks;
        }
    },
    methods: {
        submitForm() {
            if (this.selectedDate) {
                router.get('/selezione', {
                    date: this.selectedDate
                });
            }
        }
    }
}
</script>