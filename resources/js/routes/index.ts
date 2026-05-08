import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../wayfinder'
/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
export const aggiungiGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: aggiungiGiornate.url(options),
    method: 'post',
})

aggiungiGiornate.definition = {
    methods: ["post"],
    url: '/aggiungi-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
aggiungiGiornate.url = (options?: RouteQueryOptions) => {
    return aggiungiGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
aggiungiGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: aggiungiGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
const aggiungiGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: aggiungiGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
aggiungiGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: aggiungiGiornate.url(options),
    method: 'post',
})

aggiungiGiornate.form = aggiungiGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
export const rimuoviGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviGiornate.url(options),
    method: 'post',
})

rimuoviGiornate.definition = {
    methods: ["post"],
    url: '/rimuovi-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
rimuoviGiornate.url = (options?: RouteQueryOptions) => {
    return rimuoviGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
rimuoviGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
const rimuoviGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
rimuoviGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviGiornate.url(options),
    method: 'post',
})

rimuoviGiornate.form = rimuoviGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
export const rimuoviTutteGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutteGiornate.url(options),
    method: 'post',
})

rimuoviTutteGiornate.definition = {
    methods: ["post"],
    url: '/rimuovi-tutte-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
rimuoviTutteGiornate.url = (options?: RouteQueryOptions) => {
    return rimuoviTutteGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
rimuoviTutteGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutteGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
const rimuoviTutteGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutteGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
rimuoviTutteGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutteGiornate.url(options),
    method: 'post',
})

rimuoviTutteGiornate.form = rimuoviTutteGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
export const rimuoviTuttePrenotazioni = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

rimuoviTuttePrenotazioni.definition = {
    methods: ["post"],
    url: '/rimuovi-tutte-prenotazioni',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
rimuoviTuttePrenotazioni.url = (options?: RouteQueryOptions) => {
    return rimuoviTuttePrenotazioni.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
rimuoviTuttePrenotazioni.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
const rimuoviTuttePrenotazioniForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
rimuoviTuttePrenotazioniForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

rimuoviTuttePrenotazioni.form = rimuoviTuttePrenotazioniForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
export const rimuoviTutto = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutto.url(options),
    method: 'post',
})

rimuoviTutto.definition = {
    methods: ["post"],
    url: '/rimuovi-tutto',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
rimuoviTutto.url = (options?: RouteQueryOptions) => {
    return rimuoviTutto.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
rimuoviTutto.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutto.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
const rimuoviTuttoForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutto.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
rimuoviTuttoForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutto.url(options),
    method: 'post',
})

rimuoviTutto.form = rimuoviTuttoForm

/**
* @see \App\Http\Controllers\Dashboard::esportaCsv
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
export const esportaCsv = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: esportaCsv.url(options),
    method: 'post',
})

esportaCsv.definition = {
    methods: ["post"],
    url: '/esporta-csv',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::esportaCsv
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
esportaCsv.url = (options?: RouteQueryOptions) => {
    return esportaCsv.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::esportaCsv
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
esportaCsv.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: esportaCsv.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::esportaCsv
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
const esportaCsvForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: esportaCsv.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::esportaCsv
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
esportaCsvForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: esportaCsv.url(options),
    method: 'post',
})

esportaCsv.form = esportaCsvForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
export const rimuoviPrenotazione = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviPrenotazione.url(options),
    method: 'post',
})

rimuoviPrenotazione.definition = {
    methods: ["post"],
    url: '/rimuovi-prenotazione',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
rimuoviPrenotazione.url = (options?: RouteQueryOptions) => {
    return rimuoviPrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
rimuoviPrenotazione.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviPrenotazione.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
const rimuoviPrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviPrenotazione.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
rimuoviPrenotazioneForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviPrenotazione.url(options),
    method: 'post',
})

rimuoviPrenotazione.form = rimuoviPrenotazioneForm
